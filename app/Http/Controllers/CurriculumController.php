<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $curricula = Curriculum::orderBy('created_at', 'DESC')->get();

        // return view('curricula.index', compact('curricula'));

        $curriculum = Curriculum::latest()->first(); // Obtém o primeiro currículo do banco de dados

        return view('curricula.index', compact('curriculum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curricula.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $data = $request->validate([
                'full_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'cep' => 'required|string|max:9',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
                'professional_objective' => 'nullable|string',
                'academic_course' => 'nullable|string|max:255',
                'institution' => 'nullable|string|max:255',
                'start_year' => 'nullable|integer|min:1900|max:' . date('Y'),
                'expected_completion_year' => 'nullable|integer|min:' . date('Y') . '|max:' . (date('Y') + 10),
                'skills' => 'nullable|string',
                'languages' => 'nullable|string|max:255',
                'projects' => 'nullable|string',
                'certifications' => 'nullable|string',
                'extracurricular_activities' => 'nullable|string',
            ]);

            Curriculum::create($data);

            return redirect()->route('curricula.index')->with('success', 'Currículo adicionado com sucesso');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao salvar o currículo: ' . $e->getMessage());
        }
    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        return view('curricula.show', compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        return view('curricula.edit', compact('curriculum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $curriculum = Curriculum::findOrFail($id);

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cep' => 'required|string|max:9',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'professional_objective' => 'nullable|string',
            'academic_course' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'start_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'expected_completion_year' => 'nullable|integer|min:' . date('Y') . '|max:' . (date('Y') + 10),
            'skills' => 'nullable|string',
            'languages' => 'nullable|string|max:255',
            'projects' => 'nullable|string',
            'certifications' => 'nullable|string',
            'extracurricular_activities' => 'nullable|string',
        ]);

        $curriculum->update($validatedData);

        return redirect()->route('curricula.index')->with('success', 'Currículo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        $curriculum->delete();

        return redirect()->route('curricula.index')->with('success', 'Currículo deletado com sucesso');
    }
}
