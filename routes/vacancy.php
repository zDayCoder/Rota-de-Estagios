<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Console\Application;

Route::get('/vacancy/intern',[VacancyController::class,'indexIntern'])->name('vacancyIntern'); 
Route::get('/vacancy/recruiter',[VacancyController::class,'indexRecruiter'])->name('vacancyRecruiter'); 
Route::get('/vacancy/recruiter/create',[VacancyController::class,'create'])->name('vacancy.create'); 
Route::post('/vacancy/recruiter/create',[VacancyController::class,'store'])->name('vacancy.store'); 
Route::get('/vacancy/recruiter/{id}/edit',[VacancyController::class,'edit'])->name('vacancy.edit'); 
Route::put('/vacancy/recruiter/{id}',[VacancyController::class,'update'])->name('vacancy.update'); 

Route::get('/vacancy/intern/{id}/apply',[VacancyController::class,'applyVacancy'])->name('vacancy.apply');
Route::post('/vacancy/intern/apply',[VacancyController::class,'applyVacancyStore'])->name('vacancy.applyStore'); 
Route::get('/application/intern',[ApplicationController::class,'indexIntern'])->name('application.intern'); 
Route::delete('/application/intern/{id}/delete',[ApplicationController::class,'destroy'])->name('application.destroy'); 