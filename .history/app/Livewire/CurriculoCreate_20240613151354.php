<?php

namespace App\Livewire;

use Livewire\Component;
Route::get('/criar-curriculo', CurriculoCreate::class)->name('curriculo.create');

class CurriculoCreate extends Component
{
    public function render()
    {
        
        return view('livewire.curriculo-create');
    }
    
}
