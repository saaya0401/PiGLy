<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightController;

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

Route::post('/register/step1', [UserController::class, 'storeUser']);
Route::post('/register/step2', [WeightController::class, 'storeWeight']);
Route::post('/login', [UserController::class, 'loginUser']);
Route::middleware('auth')->group(function(){
    Route::get('/weight_logs', [WeightController::class, 'admin']);
    Route::get('/register/step2', [WeightController::class, 'weight']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('/', [WeightController::class, 'admin']);