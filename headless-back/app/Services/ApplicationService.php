<?php

namespace App\Services;

use App\Repositories\ApplicationRepository;
use App\Jobs\SendApplicationEmailJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class ApplicationService
{
    private $applicationRepository;

    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function apply(array $data): void
    {
        /*$position = $data['position'];
        $status = $position->status;*/
        if ($data['privacy_consent'] /*&& $status == 'active'*/) {
            $cvFileName = Str::random(40) . '.' . $data['cv']->getClientOriginalExtension();
            $cvPath = $data['cv']->storeAs('cv', $cvFileName, 'public');
            $data['cv'] = $cvPath;

            $application = $this->applicationRepository->create($data);

            Redis::connection()->rpush('email_queue', json_encode($application));
            SendApplicationEmailJob::dispatch($application)->onQueue('email');
        } else {
            // Si no se cumplen las condiciones, puedes lanzar una excepción o manejar el error de alguna otra forma
            throw new \Exception('Failed to submit application. Privacy consent must be true and the position must be active.');
        }
    }
}
