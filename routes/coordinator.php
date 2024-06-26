<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoordinatorController;

Route::group(['middleware' => ['auth', 'check.coordinator']], function () {

    Route::get('coordinator/create', [CoordinatorController::class, 'create'])->name('coordinator.create');
    Route::post('coordinator', [CoordinatorController::class, 'store'])->name('coordinator.store');
    Route::get('coordinator/{coordinator}/edit', [CoordinatorController::class, 'edit'])->name('coordinator.edit');
    Route::put('coordinator/{coordinator}', [CoordinatorController::class, 'update'])->name('coordinator.update');
    Route::get('coordinator/{coordinator}', [CoordinatorController::class, 'show'])->name('coordinator.show');
    Route::get('/coordinator/list/intern', [CoordinatorController::class, 'internResourceView'])->name('coordinator.internView');

    Route::get('/coordinator/intern/{id}/aprove',[CoordinatorController::class, 'approveIntern'])->name('coordinator.internAprove');

});
Route::get('/coordinator', [CoordinatorController::class, 'index'])->name('coordinator.index');

