<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Mahasiswacontroller;
use App\Http\Controllers\MahasiswaController as ControllersMahasiswaController;
use App\Http\Controllers\PesantrenTerdekatController;
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    Route::resource('pesantren-terdekat', PesantrenTerdekatController::class);
    Route::resource('mahasiswa', ControllersMahasiswaController::class);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
});

// Route::get('mahasiswa', [Mahasiswacontroller::class, 'index']);
// Route::get('mahasiswa/{id}', [Mahasiswacontroller::class, 'detail']);


