<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\MovieService;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');