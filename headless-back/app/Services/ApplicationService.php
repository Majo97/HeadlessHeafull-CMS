<?php

namespace App\Services;

use App\Repositories\ApplicationRepository;
use App\Jobs\SendApplicationEmailJob;
use App\Models\JobPosition;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class ApplicationService
{
    private $applicationRepository;

    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function apply( $data): JsonResponse
    {
        if (!$data['privacy_consent']) {
            // El consentimiento de privacidad no se ha dado
            return response()->json([
                'error' => 'Failed to submit application. Privacy consent must be given.'
            ], 400);
        }
    
        $position = JobPosition::find($data['position_id']);
    
        if (!$position || $position->status !== 'active') {
            // La plaza no está activa
            return response()->json([
                'error' => 'Failed to submit application. The position is not active.'
            ], 400);
        }
    
        $cvFileName = Str::random(40) . '.' . $data['cv']->getClientOriginalExtension();
        $cvPath = $data['cv']->storeAs('cv', $cvFileName, 'public');
        $data['cv'] = $cvPath;
        
        $application = $this->applicationRepository->create($data);
        Redis::connection()->rpush('email_queue', json_encode($application));
        SendApplicationEmailJob::dispatch($application)->onQueue('email');
        
        return response()->json([
            'success' => 'Application submitted successfully.'
        ]);
    }
}
