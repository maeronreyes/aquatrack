<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/devices', [DeviceController::class, 'index']);
