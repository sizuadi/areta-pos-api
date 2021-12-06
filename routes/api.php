<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/list', function () {
    Route::apiResource('products', ProductController::class)->only(['index']);
});

Route::group(['as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    Route::apiResource('products', ProductController::class)->only(['index', 'update']);
});
