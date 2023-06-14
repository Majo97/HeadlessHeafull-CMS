<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ApplicationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::get('index', [PositionController::class, 'index']);*/
Route::get('index/{perPage}', [PositionController::class, 'index']);
Route::get('job-positions/{id}', [PositionController::class, 'show']);
Route::post('aplication', [ApplicationController::class, 'apply']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

