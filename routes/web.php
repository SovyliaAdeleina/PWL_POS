<?php

use App\Http\Controller\KategoriController;
use App\Http\Controllers\KategoriController as ControllersKategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [ControllersKategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'index'])->name('/user');
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
Route::get('/kategori/create', [ControllersKategoriController::class, 'create']);
Route::get('/kategori/ubah{id}', [ControllersKategoriController::class, 'ubah']);
Route::post('/kategori', [ControllersKategoriController::class, 'store']);
Route::resource('m_user', POSController::class);

// Praktikum 2, Jobsheet 7 //
Route::get('/', [WelcomeController::class, 'index']);