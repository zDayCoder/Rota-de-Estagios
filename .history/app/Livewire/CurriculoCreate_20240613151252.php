<?php

namespace App\Livewire;

use Livewire\Component;

class CurriculoCreate extends Component
{
    public function render()
    {
        return view('livewire.curriculo-create');
    }

    Route::get('/criar-curriculo', CurriculoCreate::class)->name('curriculo.create');

}
