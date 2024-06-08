<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'registerIntern'])->name('register');
Route::get('/register', [RegisterController::class, 'index'])->name('register');


Route::post('/update-user-type', function (Illuminate\Http\Request $request) {
    Session::put('tipo_user', $request->tipo_user);
    return response()->json(['status' => 'success']);
})->name('update-user-type');
