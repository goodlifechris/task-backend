<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// You can add your API endpoints here, e.g.:
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::apiResource('tasks', TaskController::class);
