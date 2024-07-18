<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\LapanganFutsalController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\PasswordAdminController;
use App\Http\Controllers\Admin\PengaturanAdminController;
use App\Http\Controllers\Admin\RegisterAdminController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\ListBookingLapanganController;
use App\Http\Controllers\User\ListLapanganController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\PasswordUserController;
use App\Http\Controllers\User\PengaturanUserController;
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
Route::delete('apps-admin/delete/{id}',[RegisterAdminController::class,'delete']);
Route::post('apps-admin/update-role/{id}',[RegisterAdminController::class,'update']);
Route::post('apps-admin/register',[RegisterAdminController::class,'proses_register_admin'])->name('proses-register-admin');

Route::get('apps-admin/lapangan-futsal/list',[LapanganFutsalController::class,'index']);
Route::get('apps-admin/tambah-lapangan-futsal',[LapanganFutsalController::class,'create']);
Route::post('apps-admin/upload-lapangan-futsal',[LapanganFutsalController::class,'store']);
Route::delete('apps-admin/hapus-lapangan-futsal/{id}',[LapanganFutsalController::class,'destroy']);
Route::get('apps-admin/ubah-data-lapangan-futsal/{id}',[LapanganFutsalController::class,'edit']);
Route::post('apps-admin/proses-ubah-data-lapangan-futsal/{id}',[LapanganFutsalController::class,'update']);

Route::get('apps-admin/my-profile',[PengaturanAdminController::class,'index']);
Route::post('apps-admin/ubah-pengaturan/{id}',[PengaturanAdminController::class,'update']);

Route::get('apps-user/my-profile',[PengaturanUserController::class,'index']);
Route::post('apps-user/update-user-account/{id}',[PengaturanUserController::class,'update']);

Route::get('apps-admin/password',[PasswordAdminController::class,'password']);
Route::post('apps-admin/password',[PasswordAdminController::class,'update'])->name('update-pw-admin');

Route::get('apps-user/ubah-password',[PasswordUserController::class,'password']);
Route::post('apps-user/ubah-password',[PasswordUserController::class,'update'])->name('update-pw-user');

Route::get('apps-user/list-lapangan',[ListLapanganController::class,'list_lapangan']);
Route::get('apps-user/booking-lapangan-futsal/{id}',[ListLapanganController::class,'booking']);
Route::post('apps-user/proses-daftar/{id}',[ListLapanganController::class,'proses_booking']);

Route::get('apps-user/list-booking-lapangan',[ListBookingLapanganController::class,'index']);
Route::delete('apps-user/delete/{id}',[ListBookingLapanganController::class,'destroy']);