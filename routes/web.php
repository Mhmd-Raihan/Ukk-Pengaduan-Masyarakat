<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NikController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

//Route Masyarakat
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('pengaduan', [HomeController::class, 'store'])->name('pengaduan');

Route::group(['middleware'  => 'auth'], function () {
    Route::get('list-pengaduan', [HomeController::class, 'pengaduanByAuth'])->name('pengaduan.byAuth');
    Route::get('list-pengaduan/{id}', [HomeController::class, 'pengaduanById'])->name('pengaduan.byId');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['middleware'  => 'guest'], function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/auth', [LoginController::class, 'store'])->name('login.auth');
});



//Route Admin
Route::group(['middleware'  => 'auth:admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('tanggapan', [TanggapanController::class, 'index'])->name('tanggapan');
    Route::get('tanggapan/show{id}', [TanggapanController::class, 'pengaduanId'])->name('tanggapan.show');
    Route::get('tanggapan/{id}', [TanggapanController::class, 'create'])->name('tanggapan.create');
    Route::get('tanggapan/status/{id}', [TanggapanController::class, 'update'])->name('tanggapan.status');
    Route::post('tanggapan/store/{id}', [TanggapanController::class, 'store'])->name('tanggapan.store');
    Route::get('tanggapan/delete/{id}', [TanggapanController::class, 'destroy'])->name('tanggapan.destroy');

    Route::group(['middleware'  => 'isadmin'], function () {

        Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
        Route::get('petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::put('petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::get('petugas/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

        Route::get('nik', [NikController::class, 'index'])->name('nik');
        Route::get('nik/create', [NikController::class, 'create'])->name('nik.create');
        Route::post('nik/store', [NikController::class, 'store'])->name('nik.store');
        Route::get('nik/edit/{id}', [NikController::class, 'edit'])->name('nik.edit');
        Route::put('nik/update/{id}', [NikController::class, 'update'])->name('nik.update');
        Route::get('nik/delete/{id}', [NikController::class, 'destroy'])->name('nik.destroy');

        Route::get('pengaduan-pdf/{id}', [TanggapanController::class, 'pdf_byId'])->name('pdf.id');
        Route::get('pengaduan-pdf', [TanggapanController::class, 'pdf'])->name('pdf');
        Route::get('tanggapan/filter', [TanggapanController::class, 'filter'])->name('filter');
    });


});

Route::group(['middleware'  => 'guest:admin'], function () {
    Route::get('admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('admin/login/auth', [AuthController::class, 'store'])->name('admin.login.auth');
});












