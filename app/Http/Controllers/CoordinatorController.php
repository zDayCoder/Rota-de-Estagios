<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoordinatorController extends Controller
{
    //
    public function index()
    {
        // Retornar a view 'empresa.index'
        Session::put('tipo_user', 'Coordinator');
        return view('coordinator.index');
    }
    
}
