<?php

use App\Http\Controller\KategoriController;
use App\Http\Controllers\KategoriController as ControllersKategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [ControllersKategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
