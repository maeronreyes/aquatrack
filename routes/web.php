<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/devices', [DeviceController::class, 'index']);

Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('devices')->name('devices.')->group(function () {
        Route::get('/', [App\Http\Controllers\DeviceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\DeviceController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\DeviceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [App\Http\Controllers\DeviceController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [App\Http\Controllers\DeviceController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\DeviceController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('usagelimits')->name('usagelimits.')->group(function () {
        Route::get('/', [App\Http\Controllers\UsageLimitController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\UsageLimitController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\UsageLimitController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [App\Http\Controllers\UsageLimitController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [App\Http\Controllers\UsageLimitController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\UsageLimitController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('waterconsumption')->name('waterconsumption.')->group(function () {
        Route::get('/', [App\Http\Controllers\WaterConsumptionController::class, 'index'])->name('index');
    });
});


