<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Wallet;
use App\Livewire\Game;
use App\Livewire\Auth\ChangePassword;
use App\Livewire\Auth\ForgetPassword;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


Route::view('/', 'home')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();

    return redirect()->route('login');
})->name('logout');

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('forgot-password', ForgetPassword::class)->name('password.request');
Route::get('reset-password/{token}', ChangePassword::class)->name('password.reset');

Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});


Route::middleware(['auth'])->group(function () {
    // Wallet Route
    Route::get('/wallet', Wallet::class)->name('wallet');

    // Game Route
    Route::get('/game', Game::class)->name('games');
    Route::get('/user', Game::class)->name('users');
});



Route::get('/role', function () {
    $email = 'morakinyovictor1@gmail.com';

    $user = User::where('email', $email)->first();

    if ($user) {
        return response()->json($user);
    }

    return response()->json(['message' => 'User not found'], 404);
});

Route::get('create-admin', function () {
    $email = 'victorolumorakinyo@gmail.com';

    $user = User::firstOrCreate(
        ['email' => $email],
        [
            'name' => 'Victor Morakinyo',
            'password' => Hash::make('password'), // change this to something more secure
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]
    );

    // Ensure the 'admin' role exists
    $role = Role::firstOrCreate(['name' => 'admin']);

    // Assign the role if not already assigned
    if (!$user->hasRole('admin')) {
        $user->assignRole('admin');
    }

    return response()->json([
        'message' => 'Admin user ensured',
        'user' => $user,
        'roles' => $user->getRoleNames()
    ]);
});
