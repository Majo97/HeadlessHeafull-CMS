<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Services\JobPositionService;
use Doctrine\DBAL\Types\JsonType;
use Illuminate\Http\Request;

class PositionController extends Controller
{
   
    public function index($perPage, JobPositionService $jobPositionService): JsonResponse
    {
        return $jobPositionService->getAllPositionsPaginated ($perPage);
    }

    public function show($id, JobPositionService $jobPositionService): JsonResponse
    {
        return $jobPositionService->getPositionById($id);
    }

}
