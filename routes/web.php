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
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WorkoutController;

// Route::get('/', function () {
//     return redirect()->route('home');
// });

Route::get('/home', [HomeController::class, 'index']);
Route::get('/equipments', [EquipmentsController::class, 'index'])->middleware('auth');
Route::get('/equipments/{equipment}', [EquipmentsController::class, 'show']);

Route::get('/bodyparts/{equipment}', [BodypartsController::class,'index'])->name('bodyparts')->middleware('auth');
Route::post('/bodyparts/{equipment}', [BodypartsController::class, 'validate'])->name('bodyparts.submit');

Route::get('/workout', [WorkoutController::class,'index'])->name('workout')->middleware('auth');
// Route::post('/workout', [WorkoutController::class,'index'])->name('workout');
Route::get('/workout/{workoutdetail}', [WorkoutController::class,'show'])->middleware('auth');
// Route::post('/workout/{workout}/rate', [WorkoutController::class, 'rate'])->name('workout.rate');

Route::get('/login', [LoginController::class, 'index'])->name('login') ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



Route::get('/myplaylist', [MyPlaylistController::class,'index']);
Route::get('/ratedlist', [RatingController::class,'index']);

Route::get('/playlists/{playlist}', [MyPlaylistController::class, 'showPlaylist'])->name('playlist.show');
Route::get('/myplaylist/{equipment}', [MyPlaylistController::class, 'index'])->name('playlist');
Route::post('/workout/{workout}/add-to-playlist', [MyPlaylistController::class, 'addToPlaylist'])->name('workout.add-to-playlist');
Route::post('/workout/{workout}/add-playlist', [MyPlaylistController::class, 'addPlaylist'])->name('workout.add-playlist');
Route::post('/playlist/add', [MyPlaylistController::class, 'addPlaylist'])->name('playlist.add');
Route::post('/playlists/{playlist}/upload-image', [MyPlaylistController::class, 'uploadImage'])->name('playlist.upload-image');
Route::delete('/playlists/{id}/workouts/{workout}', [MyPlaylistController::class, 'removeFromPlaylist'])->name('workout.remove-from-playlist');
Route::delete('/playlists/{playlistId}', [MyPlaylistController::class, 'removePlaylist'])->name('playlist.remove');

Route::post('/addrating', [RatingController::class,'add'])->name('workout.rate');
Route::get('/ratedlist', [RatingController::class, 'index'])->name('rated-list');
Route::delete('/rating/{rating}/remove', [RatingController::class, 'removeRating'])->name('rating.remove');




