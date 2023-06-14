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
        $positions = $jobPositionService->getAllPositionsPaginated ($perPage);
        return response()->json($positions);
    }

    public function show($id, JobPositionService $jobPositionService): JsonResponse
    {
        $position = $jobPositionService->getPositionById($id);
        return response()->json($position);
    }

}
