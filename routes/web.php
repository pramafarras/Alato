<?php

use App\Http\Controllers\BodypartsController;
use App\Http\Controllers\MyPlaylistController;
use App\Http\Controllers\RatedlistController;
use App\Http\Controllers\StoreImage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkoutController;

// Route::get('/', function () {
//     return redirect()->route('home');
// });

Route::get('/home', [HomeController::class, 'index']);
Route::get('/equipments', [EquipmentsController::class, 'index']);
Route::get('/equipments/{equipment}', [EquipmentsController::class, 'show']);

Route::get('/bodyparts', [BodypartsController::class,'index']);

Route::get('/workout', [WorkoutController::class,'index']);
Route::get('/workoutdetail', [WorkoutController::class,'indexdetail']);

Route::get('/login', [LoginController::class, 'index'])->name('login') ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/ratedlist', [RatedlistController::class,'index']);

Route::get('/myplaylist', [MyPlaylistController::class,'index']);

