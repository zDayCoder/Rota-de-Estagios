<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AddressController;

// Rota para exibir o formulário de criação de endereço
Route::get('/address/create', [AddressController::class, 'create'])->name('address.create');

// Rota para armazenar o endereço após o envio do formulário
Route::post('/address', [AddressController::class, 'store'])->name('address.store');

// Rota para buscar o endereço a partir do CEP
Route::post('/address/get-address-by-cep', [AddressController::class, 'getAddressByCep'])->name('address.get-address-by-cep');
