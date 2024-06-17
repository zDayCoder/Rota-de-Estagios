<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Coordinator;
use App\Models\User;
use App\Models\Intern;
use App\Models\Vacancy;
use App\Models\Company;

class DashCoordinator extends Component
{
    public function render()
    {
        return view('livewire.dash-coordinator');
    }
   
}
