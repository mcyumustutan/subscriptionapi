<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MockApiController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

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

Route::post('/device/register', [DeviceController::class, 'register']);
Route::post('/mock/check/{receipt}', [MockApiController::class, 'check']);

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::controller(SubscriptionController::class)
            ->prefix('subscribe')
            ->group(function () {
                Route::get('/purchase', 'purchase');
                Route::get('/check', 'check');
            });
    });
