<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\WifiCalculatorController;

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

Route::middleware('api.token')->group(function () {
    
    // auth
    Route::post('login', [AuthApiController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('posts', [PostController ::class, 'index']);
        Route::get('/posts/reaction', [PostController::class, 'likeUnlike']);

        Route::get('/mpt/invoice-amount', [WifiCalculatorController::class, 'calculateInvoiceAmount'])
            ->defaults('provider', 'mpt');

        Route::get('/ooredoo/invoice-amount', [WifiCalculatorController::class, 'calculateInvoiceAmount'])
            ->defaults('provider', 'ooredoo');
    });
});
