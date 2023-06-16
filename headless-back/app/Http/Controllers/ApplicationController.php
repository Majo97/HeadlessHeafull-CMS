<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Services\ApplicationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function apply(ApplicationRequest $request, ApplicationService $applicationService): JsonResponse
    {
        return $applicationService->apply ($request->validated());
    }
}
