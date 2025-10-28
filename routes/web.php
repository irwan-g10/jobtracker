<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\JobResourceController;
use App\Http\Controllers\JobStatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [HomeController::class, 'dashboard']);

Route::resource('jobs', JobController::class);
Route::resource('job-positions', JobPositionController::class);
Route::resource('job-resources', JobResourceController::class);
Route::resource('job-statuses', JobStatusController::class);
