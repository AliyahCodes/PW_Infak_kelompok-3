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


    Route::get('data-siswa', [SiswaController::class, 'index']);
    Route::get('siswa/create', [SiswaController::class, 'create']);
    Route::post('siswa/create', [SiswaController::class, 'store'])->name('create.siswa');

    // Route::get('/perjanjian', [NominalController::class, 'perjanjian']);
    Route::post('/perjanjian', [NominalController::class, 'nominal_form'])->name('nominal_form');

    Route::get('transaksi', [PembayaranController::class, 'index']);

});







