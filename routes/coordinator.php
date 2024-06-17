<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoordinatorController;

//Route::group(['middleware' => ['auth', 'check.coordinator']], function () {


Route::get('/coordinator', [CoordinatorController::class, 'store'])->name('coordinators.store');
Route::get('/coordinator/{coordinator}', [CoordinatorController::class, 'show'])->name('coordinators.show');
Route::get('/coordinator/{coordinator}/edit', [CoordinatorController::class, 'edit'])->name('coordinators.edit');
Route::put('/coordinator/{coordinator}', [CoordinatorController::class, 'update'])->name('coordinators.update');

//});
Route::get('/coordinator', [CoordinatorController::class, 'index'])->name('coordinator.index');

Route::get('/cordenador/intern',[CoordinatorController::class,'internResourceView'])->name('coordinators.internView');
Route::get('/coordinator/create', [CoordinatorController::class, 'create'])->name('coordinators.create');