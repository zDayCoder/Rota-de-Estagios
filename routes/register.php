<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'registerIntern'])->name('register.intern');
Route::post('/register', [RegisterController::class, 'registerEnterprise'])->name('register.enterprise');
Route::post('/register', [RegisterController::class, 'registerCoordinator'])->name('register.coordinator');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
