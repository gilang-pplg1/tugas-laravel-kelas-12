<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies/search', [FilmController::class, 'search'])->name('movies.search');

// 1. SEMUA ROUTE STATIS / KHUSUS HARUS DI ATAS
Route::get('/movies/create', [FilmController::class, 'create'])->name('movies.create');
Route::post('/movies', [FilmController::class, 'store'])->name('movies.store');

// 2. ROUTE UMUM
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');

// 3. ROUTE DINAMIS DENGAN PARAMETER DI PALING BAWAH
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');

Route::get('/movies/{film}/edit', [FilmController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{film}', [FilmController::class, 'update'])->name('movies.update');
Route::delete('/movies/{film}', [FilmController::class, 'destroy'])->name('movies.destroy');

// Route Halaman Admin & User untuk Tugas
Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.index');
})->name('user.dashboard');