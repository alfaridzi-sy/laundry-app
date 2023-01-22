<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report/{report}', [LaundryController::class, 'liveReport']);

Route::put('/changeDate/{date}', [LaundryController::class, 'changeDate'])->name('changeDate');
