<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderCustomerController;
use App\Http\Controllers\ProfileMerchantController;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login-process');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/process', [AuthController::class, 'registerProcess'])->name('register-process');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [MainController::class, 'profileUpdate'])->name('profile-update');

    Route::middleware([role::class . ':merchant'])->group(function () {
        Route::get('/merchant-profile', [ProfileMerchantController::class, 'index'])->name('merchant.profile.index');
        Route::post('/merchant-profile/store', [ProfileMerchantController::class, 'create'])->name('merchant.profile.store');
        Route::put('/merchant-profile/update', [ProfileMerchantController::class, 'update'])->name('merchant.profile.update');

        Route::resources([
            'menu' => MenuController::class,
            'order' => OrderController::class,
        ]);

        Route::get('/order/{id}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');
    });

    Route::middleware([role::class . ':customer'])->group(function () {
        Route::get('/catering-customer', [CateringController::class, 'index'])->name('catering-customer.index');
        Route::get('/catering-customer/menu/{merchant_id}', [CateringController::class, 'menu'])->name('catering-customer.menu');
        Route::get('/catering-customer/order/{menu_id}', [CateringController::class, 'order'])->name('catering-customer.order');
        Route::post('/catering-customer/ordersubmit/{menu_id}', [CateringController::class, 'orderSubmit'])->name('catering-customer.ordersubmit');

        Route::get('/order-customer', [OrderCustomerController::class, 'index'])->name('order-customer.index');
        Route::get('/order-customer/{id}/invoice', [OrderCustomerController::class, 'invoice'])->name('order-customer.invoice');
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
