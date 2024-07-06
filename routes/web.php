<?php

use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegisterUserController;
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

Route::get('/apps-user/dashboard',[DashboardUserController::class,'index']);

Route::get('apps-user/auth',[LoginUserController::class,'index'])->name('login');
Route::get('apps-user/logout',[LoginUserController::class,'logout'])->name('logout');
Route::post('apps-user/auth',[LoginUserController::class,'proses'])->name('proses-login-user');

Route::get('apps-user/register',[RegisterUserController::class,'register']);
Route::post('apps-user/register',[RegisterUserController::class,'proses_register'])->name('proses-register-user');