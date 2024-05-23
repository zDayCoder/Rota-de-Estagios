<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'registerIntern'])->name('register.intern');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
