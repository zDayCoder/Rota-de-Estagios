<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterpriseController;

Route::get('/enterprise', [EnterpriseController::class, 'index'])->name('enterprise.index');
