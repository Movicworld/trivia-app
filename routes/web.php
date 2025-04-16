<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;
Route::view('/', 'home')->name('dashboard');

Route::get('login', Login::class)->name('login');

// Admin dashboard route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});

// User dashboard route
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});
