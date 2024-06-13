<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoordinatorController;

Route::get('/coordinator', [CoordinatorController::class, 'index'])->name('coordinator.index');
