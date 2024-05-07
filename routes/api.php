<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\LevelController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// Jobsheet 10 
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

// Jobsheet 10 - Praktikum 4
Route::get('levels', [LevelController::class, 'index']);
Route::post("levels",[LevelController::class,'store']);
Route::get("levels/{level}",[LevelController::class,'show']);
Route::put("levels/{level}",[LevelController::class,'update']);
Route::delete("levels/{level}",[LevelController::class,'destroy']);

// Jobsheet 10 - Tugas
Route::get('users', [UserController::class, 'index']);
Route::post("users",[UserController::class,'store']);
Route::get("users/{user}",[UserController::class,'show']);
Route::put("users/{user}",[UserController::class,'update']);
Route::delete("users/{user}",[UserController::class,'destroy']);

Route::get('kategoris' , [KategoriController::class,'index']);
Route::post('kategoris' , [KategoriController::class,'store']);
Route::get('kategoris/{kategori}', [KategoriController::class,'show']);
Route::put("kategoris/{kategori}",[KategoriController::class,'update']);
Route::delete("kategoris/{kategori}",[KategoriController::class,'destroy']);

Route::get('barangs' , [BarangController::class,'index']);
Route::post('barangs' , [BarangController::class,'store']);
Route::get('barangs/{barang}', [BarangController::class,'show']);
Route::put("barangs/{barang}",[BarangController::class,'update']);
Route::delete("barangs/{barang}",[BarangController::class,'destroy']);

// Jobsheet 12 - Praktikum 1 No 8
Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});