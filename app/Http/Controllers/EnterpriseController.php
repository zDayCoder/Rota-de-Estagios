<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {
        // Retornar a view 'empresa.index'
        return view('enterprise.index');
    }
}