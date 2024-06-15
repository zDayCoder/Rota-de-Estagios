<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::get('/vacancy',[VacancyController::class,'index'])->name('vacancy'); 
Route::get('/vacancy/create',[VacancyController::class,'create'])->name('vacancy.create'); 
Route::post('/vacancy/create',[VacancyController::class,'store'])->name('vacancy.store'); 
Route::get('/vacancy/{id}/edit',[VacancyController::class,'edit'])->name('vacancy.edit'); 
Route::put('/vacancy/{id}',[VacancyController::class,'update'])->name('vacancy.update'); 