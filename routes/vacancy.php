<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::get('/vacancy/intern',[VacancyController::class,'indexIntern'])->name('vacancyIntern'); 
Route::get('/vacancy/recruiter',[VacancyController::class,'indexRecruiter'])->name('vacancyRecruiter'); 
Route::get('/vacancy/recruiter/create',[VacancyController::class,'create'])->name('vacancy.create'); 
Route::post('/vacancy/recruiter/create',[VacancyController::class,'store'])->name('vacancy.store'); 
Route::get('/vacancy/recruiter/{id}/edit',[VacancyController::class,'edit'])->name('vacancy.edit'); 
Route::put('/vacancy/recruiter/{id}',[VacancyController::class,'update'])->name('vacancy.update'); 