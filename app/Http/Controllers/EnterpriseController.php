<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {
        // Retornar a view 'empresa.index'
        Session::put('tipo_user', 'Enterprise');
        return view('enterprise.index');
    }
}