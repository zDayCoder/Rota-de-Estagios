<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Console\Application;

Route::get('/application/intern',[ApplicationController::class,'indexIntern'])->name('application.intern'); 
Route::delete('/application/intern/{id}/delete',[ApplicationController::class,'destroy'])->name('application.destroy'); 