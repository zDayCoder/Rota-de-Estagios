<?php
use Illuminate\Support\Facades\Route;
// Rota para exibir o formulário a Empresa
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AddressController;


Route::group(['middleware' => ['auth', 'check.enterprise']], function () {
Route::resource('company', CompanyController::class);
Route::resource('address', AddressController::class);
Route::post('/address/get-address-by-cep', [AddressController::class, 'getAddressByCep'])->name('address.get-address-by-cep');

Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/{company}', [CompanyController::class, 'show'])->name('company.show');
Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');

});

Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

