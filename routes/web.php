<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\smpController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home', ['title' => 'ViGeo | Manajemen Data SMP Payakumbuh']);
});

Route::get('/crud', function () {
    return view('keloladata', ['title' => 'Kelola Data SMP']);
});

Route::get('/tampil', [smpController::class, 'index'])->name('tampil');

Route::resource('smp', smpController::class)->except(['index']);

Route::get('/api/smp', [smpController::class, 'getSmpData']);

Route::get('/', function () {
    return view('home', ['title' => 'ViGeo | Manajemen Data SMP Payakumbuh']);
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/crud', function () {
        return view('keloladata', ['title' => 'Kelola Data SMP']);
    });
    Route::resource('smp', smpController::class)->except(['index', 'show']);
});

// Public routes
Route::get('/tampil', [smpController::class, 'index'])->name('tampil');
Route::get('/api/smp', [smpController::class, 'getSmpData']);
