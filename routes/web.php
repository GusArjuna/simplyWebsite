<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriMakananController;
use App\Http\Controllers\MakananController;
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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register', 'registore')->middleware('auth');
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate')->middleware('auth');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(MakananController::class)->group(function () {
    Route::get('/makanan', 'index')->middleware('auth');
    Route::get('/makanan/tambah', 'create')->middleware('auth');
    Route::post('/makanan/tambah', 'store')->middleware('auth');
    Route::get('/makanan/{makanan}/ubah', 'edit')->middleware('auth');
    Route::patch('/makanan/{makanan}', 'update')->middleware('auth');
    Route::post('/makanan/delete', 'destroy')->middleware('auth');
});
Route::controller(KategoriMakananController::class)->group(function () {
    Route::get('/kategori-makanan', 'index')->middleware('auth');
    Route::get('/kategori-makanan/tambah', 'create')->middleware('auth');
    Route::post('/kategori-makanan/tambah', 'store')->middleware('auth');
    Route::get('/kategori-makanan/{kategoriMakanan}/ubah', 'edit')->middleware('auth');
    Route::patch('/kategori-makanan/{kategoriMakanan}', 'update')->middleware('auth');
    Route::post('/kategori-makanan/delete', 'destroy')->middleware('auth');
});
