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

        // $curriculum = Curriculum::latest()->first(); // Obtém o primeiro currículo do banco de dados

        // return view('curricula.index', compact('curriculum'));


        $curriculum = Curriculum::latest()->first();

        if (!$curriculum) {
            // Se não existir currículo, redirecione para a rota de criação
            return redirect()->route('curricula.create');
        }
        
        // Se existir currículo, carregue a view de index com o currículo
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
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'summary' => 'required|string|max:1000',
            'positions.*' => 'required|string|max:255', // Validação para campos múltiplos
            'locations.*' => 'required|string|max:255',
            'skills.*' => 'required|string|max:255',
            'languages.*' => 'required|string|max:255',
            'certifications.*' => 'required|string|max:255',
        ]);

        // Cria um novo currículo com base nos dados recebidos
        $curriculum = new Curriculum();
        $curriculum->name = $validatedData['name'];
        $curriculum->email = $validatedData['email'];
        $curriculum->phone = $validatedData['phone'];
        $curriculum->summary = $validatedData['summary'];

        // Salva o currículo no banco de dados
        $curriculum->save();

        // Adiciona as experiências ao currículo
        $experiences = [];
        foreach ($validatedData['positions'] as $key => $position) {
            $experiences[] = [
                'position' => $position,
                'location' => $validatedData['locations'][$key],
            ];
        }
        $curriculum->experiences()->createMany($experiences);

        // Adiciona as habilidades ao currículo
        $skills = [];
        foreach ($validatedData['skills'] as $skill) {
            $skills[] = ['name' => $skill];
        }
        $curriculum->skills()->createMany($skills);

        // Adiciona os idiomas ao currículo
        $languages = [];
        foreach ($validatedData['languages'] as $language) {
            $languages[] = ['name' => $language];
        }
        $curriculum->languages()->createMany($languages);

        // Adiciona as certificações ao currículo
        $certifications = [];
        foreach ($validatedData['certifications'] as $certification) {
            $certifications[] = ['name' => $certification];
        }
        $curriculum->certifications()->createMany($certifications);
        // Redireciona para a página de exibição do currículo recém-criado
        return redirect()->route('curricula.index', $curriculum->id);
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