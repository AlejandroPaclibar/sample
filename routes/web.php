<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

Route::get('/', [UserController::class, 'users'])->name('users');
Route::post('/admin/user-permission-add', [PermissionController::class, 'create'])->name('userAddPermission');

Route::get('/log', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login.sud');