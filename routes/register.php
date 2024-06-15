<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'index'])->name('register');


Route::post('/update-user-type', function (Illuminate\Http\Request $request) {
    Session::put('tipo_user', $request->tipo_user);
    return response()->json(['status' => 'success']);
})->name('update-user-type');
