<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoordinatorController;

Route::group(['middleware' => ['auth', 'check.coordinator']], function () {

Route::get('coordinators/create', [CoordinatorController::class, 'create'])->name('coordinators.create');
Route::post('coordinators', [CoordinatorController::class, 'store'])->name('coordinators.store');
Route::get('coordinators/{coordinator}', [CoordinatorController::class, 'show'])->name('coordinators.show');
Route::get('coordinators/{coordinator}/edit', [CoordinatorController::class, 'edit'])->name('coordinators.edit');
Route::put('coordinators/{coordinator}', [CoordinatorController::class, 'update'])->name('coordinators.update');
});
Route::get('/coordinator', [CoordinatorController::class, 'index'])->name('coordinator.index');
