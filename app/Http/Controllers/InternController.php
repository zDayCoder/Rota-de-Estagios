<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        // Retornar a view 'empresa.index'
        return view('intern.index');
    }
}
