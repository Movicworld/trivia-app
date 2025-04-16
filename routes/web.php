<?php

use App\Http\Controllers\SocialController;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Auth\ChangePassword;
use App\Livewire\Auth\ForgetPassword;
use App\Livewire\Auth\Register;
use App\Livewire\User\Dashboard as UserDashboard;


Route::view('/', 'home')->name('dashboard');

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('forgot-password', ForgetPassword::class)->name('password.request');
Route::get('reset-password/{token}', ChangePassword::class)
    ->name('password.reset');

Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);


// Admin dashboard route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});

// User dashboard route
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
