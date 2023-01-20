<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\LaundryController;

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

// CLOTH
Route::prefix('cloth')->group(function () {
    Route::post('/add-cloth', [ClothController::class, 'addCloth']);
});

//LAUNDRY
Route::prefix('laundry')->group(function () {
    Route::post('/add-laundry', [LaundryController::class, 'addLaundry']);
});
