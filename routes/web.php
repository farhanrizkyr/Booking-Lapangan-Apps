<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\RegisterAdminController;
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

Route::get('apps-admin/dashboard',[DashboardAdminController::class,'index']);

Route::get('apps-user/auth',[LoginUserController::class,'index'])->name('login');
Route::get('apps-user/logout',[LoginUserController::class,'logout'])->name('logout');
Route::post('apps-user/auth',[LoginUserController::class,'proses'])->name('proses-login-user');

Route::get('apps-admin/auth',[LoginAdminController::class,'loginadmin'])->name('admin.login');
Route::get('apps-admin/logout',[LoginAdminController::class,'logout_admin'])->name('logout-admin');
Route::post('apps-admin/auth',[LoginAdminController::class,'proses_login_admin'])->name('proses-login-admin');


Route::get('apps-user/register',[RegisterUserController::class,'register']);
Route::post('apps-user/register',[RegisterUserController::class,'proses_register'])->name('proses-register-user');

Route::get('apps-admin/register',[RegisterAdminController::class,'register_admin']);
Route::get('apps-admin/list-account',[RegisterAdminController::class,'list']);
Route::post('apps-admin/update-role/{id}',[RegisterAdminController::class,'update']);
Route::post('apps-admin/register',[RegisterAdminController::class,'proses_register_admin'])->name('proses-register-admin');