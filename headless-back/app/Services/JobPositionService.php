<?php

namespace App\Services;

use App\Repositories\JobPositionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JobPositionService
{
    protected $jobPositionRepository;
    public function __construct(JobPositionRepositoryInterface $jobPositionRepository)
    {
        $this->jobPositionRepository = $jobPositionRepository;
    }

    public function getAllPositionsPaginated($perPage): JsonResponse
    {
        if (!$perPage || !is_numeric($perPage) || $perPage <= 0) {
            $perPage = 10; 
        }
        $positions = $this->jobPositionRepository->getAllPositionsPaginated($perPage);
        if ($positions) {
            return response()->json($positions, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'No job positions found.'], Response::HTTP_NOT_FOUND);
        }
    }    

    public function getPositionById($id): JsonResponse
    {
        $position = $this->jobPositionRepository->getPositionById($id);
    
        if ($position) {
            $data = [
                'id' => $position->position_id,
                'image' => $position->image,
                'company' => [
                    'name' => $position->company->name,
                    'website' => $position->company->website,
                ],
                'title' => $position->title,
                'type' => $position->type->name,
                'address' => $position->address,
                'description' => $position->description,
                'requirements' => $position->requirements,
                'responsibilities' => $position->responsibilities,
            ];
    
            return response()->json($data, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Job position not found.'], Response::HTTP_NOT_FOUND);
        }
    }
    
}
