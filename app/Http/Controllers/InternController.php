<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Models\Intern;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
    public function index()
    {
        // Retornar a view 'empresa.index'
        Session::put('tipo_user', 'Intern');
        return view('intern.index');
    }

    public function create()
    {
        return view('intern.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:interns,cpf',
            'phone' => 'required|string|max:255',
            'educational_institution' => 'required|string|max:255',
            'current_course' => 'required|string|max:255',
            'current_period' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'street_address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'number' => 'required|string|max:10',
        ]);

        // Criar endereço
        $address = Address::create([
            'zip_code' => $request->zip_code,
            'street_address' => $request->street_address,
            'complement' => $request->complement,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'number' => $request->number,
            'user_id' => Auth::id(), // ID do usuário logado
        ]);

        // Criar estagiário
        Intern::create([
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'educational_institution' => $request->educational_institution,
            'current_course' => $request->current_course,
            'current_period' => $request->current_period,
            'user_id' => Auth::id(),
            'address_id' => $address->id,
            'work_contract' => 'a_procura',
        ]);

        return redirect()->route('dashboard')->with('success', 'Intern created successfully.');
    }

    public function show($id)
    {
        $intern = Intern::findOrFail($id);
        return view('intern.show', compact('intern'));
    }

    public function edit($id)
    {
        $intern = Intern::findOrFail($id);
        return view('intern.form', compact('intern'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:interns,cpf,' . $id,
            'phone' => 'required|string|max:255',
            'educational_institution' => 'required|string|max:255',
            'current_course' => 'required|string|max:255',
            'current_period' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'street_address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'number' => 'required|string|max:10',
        ]);

        $intern = Intern::findOrFail($id);
        $address = $intern->address;

        // Atualizar endereço
        $address->update([
            'zip_code' => $request->zip_code,
            'street_address' => $request->street_address,
            'complement' => $request->complement,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'number' => $request->number,
            'user_id' => Auth::id(), // ID do usuário logado
        ]);

        // Atualizar estagiário
        $intern->update([
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'educational_institution' => $request->educational_institution,
            'current_course' => $request->current_course,
            'current_period' => $request->current_period,
            'user_id' => Auth::id(),
            'address_id' => $address->id,
        ]);

        return redirect()->route('intern.index')->with('success', 'Intern updated successfully.');
    }

    
}
