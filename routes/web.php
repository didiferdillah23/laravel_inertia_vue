<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home', [
    'users' => User::paginate(5)
]);

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard');

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});