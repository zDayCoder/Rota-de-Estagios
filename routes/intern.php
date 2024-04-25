<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\InternController;

Route::get('/intern', [InternController::class, 'index'])->name('intern.index');
Route::get('/', [InternController::class, 'index'])->name('intern.index');