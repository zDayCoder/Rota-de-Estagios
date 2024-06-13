<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         // Verifica se o usuário está autenticado
//         if (Auth::check()) {
//             $user = Auth::user();

//             // Verifica se o usuário tem um endereço associado
//             if ($user->address) {
//                 // Se sim, redireciona para a dashboard
//                     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//             } else {
//                 // Se não, redireciona para a página de cadastro de endereço
//                 return redirect()->route('address.create');
//             }
//         } else {
//             // Se o usuário não estiver autenticado, redireciona para a página de login
//             return redirect()->route('login');
//         }
//     })->name('dashboard');
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('hasAddress'); // Adicionamos um middleware customizado para verificar se o usuário possui endereço
});


require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/curricula.php';
require_once __DIR__ . '/enterprise.php';
require_once __DIR__ . '/intern.php';
require_once __DIR__ . '/coordinator.php';
require_once __DIR__ . '/address.php';
require_once __DIR__ . '/register.php';
require_once __DIR__ . '/company.php';
