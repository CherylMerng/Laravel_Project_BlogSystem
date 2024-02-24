<?php

use App\Http\Controllers\CategoryApiController; // Day 6-1
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Day 6-1
Route::apiResource('/categories', CategoryApiController::class);


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
