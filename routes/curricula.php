<?php
use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;

$authMiddleware = config('jetstream.guard')
    ? 'auth:'.config('jetstream.guard')
    : 'auth';

$authSessionMiddleware = config('jetstream.auth_session', false)
    ? config('jetstream.auth_session')
    : null;

Route::group(['middleware' => array_values(array_filter([$authMiddleware, $authSessionMiddleware]))], function () {
    // Rota para listar todos os currículos
    Route::get('/curricula', [CurriculumController::class, 'index'])->name('curricula.index');

    // Rota para exibir o formulário de criação de currículo
    Route::get('/curricula/create', [CurriculumController::class, 'create'])->name('curricula.create');

    // Rota para salvar um novo currículo no banco de dados
    
    Route::post('/curricula', [CurriculumController::class, 'store'])->name('curricula.store');

    // Rota para exibir detalhes de um currículo específico
    Route::get('/curricula/{curriculum}', [CurriculumController::class, 'show'])->name('curricula.show');

    // Rota para exibir o formulário de edição de currículo
    Route::get('/curricula/{curriculum}/edit', [CurriculumController::class, 'edit'])->name('curricula.edit');

    // Rota para atualizar um currículo no banco de dados
    Route::put('/curricula/{curriculum}', [CurriculumController::class, 'update'])->name('curricula.update');

    // Rota para excluir um currículo do banco de dados
    Route::delete('/curricula/{curriculum}', [CurriculumController::class, 'destroy'])->name('curricula.destroy');
});
