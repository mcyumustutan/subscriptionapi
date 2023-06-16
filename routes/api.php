<?php

use App\Http\Controllers\DeviceController;
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

Route::group([
    'prefix' => 'device',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/purchase', [DeviceController::class, 'purchase']);
    Route::get('/checkSubscription', [DeviceController::class, 'checkSubscription']);
});
