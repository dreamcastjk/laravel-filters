<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::redirect('/', 'users');
Route::get('users', UserController::class)->name('users.index');
