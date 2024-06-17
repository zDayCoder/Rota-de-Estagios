<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\InternController;
use App\Http\Controllers\AddressController;

Route::group(['middleware' => array_values(array_filter([$authMiddleware, $authSessionMiddleware, 'check.intern']))], function () {

Route::post('/address/get-address-by-cep', [AddressController::class, 'getAddressByCep'])->name('address.get-address-by-cep');

// Rota para exibir o formulário de criação de um novo estagiário
Route::get('interns/create', [InternController::class, 'create'])->name('interns.create');

// Rota para armazenar os dados de um novo estagiário
Route::post('interns', [InternController::class, 'store'])->name('interns.store');

// Rota para exibir um estagiário específico
Route::get('interns/{intern}', [InternController::class, 'show'])->name('interns.show');

// Rota para exibir o formulário de edição de um estagiário específico
Route::get('interns/{intern}/edit', [InternController::class, 'edit'])->name('interns.edit');

// Rota para atualizar os dados de um estagiário específico
Route::put('interns/{intern}', [InternController::class, 'update'])->name('interns.update');

});
Route::get('/intern', [InternController::class, 'index'])->name('interns.index');

Route::get('/', [InternController::class, 'index'])->name('intern.index');