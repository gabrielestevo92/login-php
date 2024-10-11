<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'email')->name('login.email');
    Route::post('/store', 'store')->name('login.store');
    Route::post('/password', 'password')->name('login.password');
    Route::post('/register', 'register')->name('login.register');
    Route::get('/logout/{id}', 'destroy')->name('login.destroy');
}); 
