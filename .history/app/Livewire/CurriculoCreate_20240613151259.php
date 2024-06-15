<?php

namespace App\Livewire;

use Livewire\Component;

class CurriculoCreate extends Component
{
    public function render()
    {
        Route::get('/criar-curriculo', CurriculoCreate::class)->name('curriculo.create');

        return view('livewire.curriculo-create');
    }
    
}
