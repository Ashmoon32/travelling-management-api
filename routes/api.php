<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/destinations', [DestinationController::class, 'index']);

Route::post('/destinations', [DestinationController::class, 'store']);

Route::get('/destinations/{id}', [DestinationController::class, 'show']);

