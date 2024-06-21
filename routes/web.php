<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home');

Route::inertia('/register', 'Auth/Register');

Route::post('/register', [AuthController::class, 'register']);