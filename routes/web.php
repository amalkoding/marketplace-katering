<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login-process');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/process', [AuthController::class, 'registerProcess'])->name('register-process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [MainController::class, 'profileUpdate'])->name('profile-update');

    Route::middleware([role::class . ':admin'])->group(function () {
        Route::resources([
            'user' => UserController::class,
        ]);
    });

    Route::middleware([role::class . ':premium'])->group(function () {
        //
    });

    Route::middleware([role::class . ':user'])->group(function () {
        //
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
