<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NominalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;

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
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::post('/auth', [AuthController::class, 'auth']);

Route::get('logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('siswa', [DashboardController::class, 'siswa'])->name('siswa');

    Route::get('data-user', [NominalController::class, 'index']);
    Route::get('/user/create', [AuthController::class, 'user']);
    Route::post('/user/create', [AuthController::class, 'create'])->name('create.user');
    Route::get('/user/{id}/edit', [AuthController::class, 'userEdit'])->name('edit.user');
    Route::put('/user/{id}', [AuthController::class, 'userUpdate'])->name('update.user');
    Route::delete('/user/delete/{id}', [AuthController::class, 'delete'])->name('delete.user');



    Route::get('data-siswa', [SiswaController::class, 'index']);
    Route::get('siswa/create', [SiswaController::class, 'create']);
    Route::post('siswa/create', [SiswaController::class, 'store'])->name('create.siswa');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit.siswa');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('update.siswa');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('delete_siswa');

    
    

    // Route::get('/perjanjian', [NominalController::class, 'perjanjian']);
    Route::post('/perjanjian', [NominalController::class, 'nominal_form'])->name('nominal_form');

    Route::get('transaksi', [PembayaranController::class, 'index'])->name('transaksi');

    Route::get('/admin/transaksi/create/{$id}', [PembayaranController::class, 'create']);
    Route::post('/admin/transaksi/store/{$id}', [PembayaranController::class, 'store'])->name('pembayaran.form');

    // routes/web.php
    Route::get('/export-pdf', 'ExportPdfController@export')->name('export.pdf');


});







