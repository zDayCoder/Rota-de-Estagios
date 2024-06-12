<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        // Retornar a view 'empresa.index'
        Session::put('tipo_user', 'Intern');
        return view('intern.index');
    }
}
