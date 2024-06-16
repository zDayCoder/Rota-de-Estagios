<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{
    //
    public function index()
    {
        // Retornar a view 'empresa.index'
        Session::put('tipo_user', 'Coordinator');
        return view('dashboard');
    }

    public function create()
    {
        return view('coordinator.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinator_registration' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Criar coordenador
        Coordinator::create([
            'coordinator_registration' => $request->coordinator_registration,
            'contact' => $request->contact,
            'user_id' => $user->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function show($id){
        $coordinator = Coordinator::find($id);
        return view('coordinator.show', compact('coordinator'));
    }

    public function edit($id)
    {
        $coordinator = Coordinator::find($id);
        return view('coordinator.form', compact('coordinator'));
    }

  public function update(Request $request, $id)
    {
        $request->validate([
            'coordinator_registration' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $coordinator = Coordinator::find($id);
        $coordinator->coordinator_registration = $request->coordinator_registration;
        $coordinator->contact = $request->contact;
        $coordinator->user_id = $user->id;
        $coordinator->save();

        return redirect()->route('dashboard');
    }
}
