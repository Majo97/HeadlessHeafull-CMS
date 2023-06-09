<?php
// app/Services/JobPositionService.php

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
            return response()->json($position, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Job position not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
