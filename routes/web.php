<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
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

Route::get('/',[FrontController::class,'index'])->name('welcome');
Route::get('/pengajuan',[FrontController::class,'pengajuan'])->name('pengajuan');
Route::get('/informasi',[FrontController::class,'informasi'])->name('informasi');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/permohonan/tambah', [PermohonanController::class, 'tambah'])->name('tambahpermohonan');

Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin_')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan');
    Route::get('/permohonan/{id}/detail', [PermohonanController::class, 'detail'])->name('permohonandetail');


    Route::get('user',[UserController::class,'index'])->name('user');
    Route::post('user/tambah',[UserController::class,'tambah'])->name('usertambah');
    Route::delete('user/{id}/delete',[UserController::class,'delete'])->name('userdelete');
});
