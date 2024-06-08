<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;
 // Importações necessárias no início do arquivo
 use App\Models\Experience;
 use App\Models\Skill;
 use App\Models\Language;
 use App\Models\Certification;
 use App\Models\Education;
 use App\Models\Address;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $curriculum = Curriculum::latest()->first();

        if (!$curriculum) {
            // Se não existir currículo, redirecione para a rota de criação
            return redirect()->route('curricula.create');
        }else{

        if (Auth::check()) {
            // Acessa todos os dados do usuário autenticado
            $user = Auth::user();

            // Verifica se o usuário tem um endereço associado
            if ($user->address) {
                // O usuário tem um endereço, você pode acessá-lo assim
                $address = $user->address;

                // Faça o que precisar com o endereço e o usuário
                return view('curricula.index', [
                    'user' => $user,
                    'address' => $address,
                    'curriculum' => $curriculum,
                ]);
            }   

        }
    }
        
        // Se existir currículo, carregue a view de index com o currículo

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::check()) {
            // Acessa todos os dados do usuário autenticado
            $user = Auth::user();

            // Verifica se o usuário tem um endereço associado
            if ($user->address) {
                // O usuário tem um endereço, você pode acessá-lo assim
                $address = $user->address;

                // Faça o que precisar com o endereço e o usuário
                return view('curricula.create', [
                    'user' => $user,
                    'address' => $address,
                ]);
            } else {
                // O usuário não tem um endereço registrado
                $address = null; // Ou qualquer outra ação que você deseja tomar

                // Passa apenas os dados do usuário para a view
                // return view('curricula.create', ['user' => $user]);
                return view('dashboard');
            }
        }
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
        'positions.*' => 'required|string|max:255',
        'employers.*' => 'required|string|max:255',
        'locations.*' => 'required|string|max:255',
        'start_dates.*' => 'required|date',
        'end_dates.*' => 'nullable|date',
        'currently_working.*' => 'boolean',
        'descriptions.*' => 'nullable|string',
        'skills.*' => 'required|string|max:255',
        'skill_levels.*' => 'required|integer|between:1,5',
        'languages.*' => 'required|string|max:255',
        'language_levels.*' => 'required|integer|between:1,5',
        'certifications.*' => 'required|string|max:255',
        'certification_end_dates.*' => 'required|date',
        'certification_descriptions.*' => 'nullable|string',
        'educations.*' => 'required|string|max:255',
        'education_start_dates.*' => 'required|date',
        'education_end_dates.*' => 'nullable|date',
    ]);

    // Verifica se o usuário está logado
    $user = Auth::user();

    // Recupera o endereço do usuário logado
    $address = Address::where('user_id', $user->id)->first();

    if (!$address) {
        return back()->withErrors(['message' => 'Endereço do usuário não encontrado.']);
    }

    // Cria um novo currículo com base nos dados recebidos
    $curriculum = new Curriculum();
    $curriculum->name = $validatedData['name'];
    $curriculum->email = $validatedData['email'];
    $curriculum->phone = $validatedData['phone'];
    $curriculum->summary = $validatedData['summary'];
    $curriculum->city = $address->city;
    $curriculum->state = $address->state;
    // Salva o currículo no banco de dados
    $curriculum->save();

    // Adiciona as experiências ao currículo
    $experiences = [];
    foreach ($validatedData['positions'] as $key => $position) {
        $isCurrent = isset($validatedData['currently_working'][$key]) && $validatedData['currently_working'][$key] == 1;
        $endDate = $isCurrent ? null : $validatedData['end_dates'][$key];
    
        $experiences[] = new Experience([
            'position' => $position,
            'employer' => $validatedData['employers'][$key],
            'location' => $validatedData['locations'][$key],
            'start_date' => $validatedData['start_dates'][$key],
            'end_date' => $endDate,
            'is_current' => $isCurrent,
            'description' => $validatedData['descriptions'][$key],
        ]);
    }
    
    $curriculum->experiences()->saveMany($experiences);

    // Adiciona as habilidades ao currículo
    $skills = [];
    foreach ($validatedData['skills'] as $key => $skill) {
        $skills[] = new Skill([
            'name' => $skill,
            'level' => $validatedData['skill_levels'][$key],
        ]);
    }
    $curriculum->skills()->saveMany($skills);

    // Adiciona os idiomas ao currículo
    $languages = [];
    foreach ($validatedData['languages'] as $key => $language) {
        $languages[] = new Language([
            'name' => $language,
            'level' => $validatedData['language_levels'][$key],
        ]);
    }
    $curriculum->languages()->saveMany($languages);

    // Adiciona as certificações ao currículo
    $certifications = [];
    foreach ($validatedData['certifications'] as $key => $certification) {
        $certifications[] = new Certification([
            'name' => $certification,
            'end_date' => $validatedData['certification_end_dates'][$key],
            'description' => $validatedData['certification_descriptions'][$key],
        ]);
    }
    $curriculum->certifications()->saveMany($certifications);

    // Adiciona as formações ao currículo
    $educations = [];
    foreach ($validatedData['educations'] as $key => $education) {
        $educations[] = new Education([
            'name' => $education,
            'start_date' => $validatedData['education_start_dates'][$key],
            'end_date' => $validatedData['education_end_dates'][$key],
        ]);
    }
    $curriculum->educations()->saveMany($educations);

    // Redireciona para a página de exibição do currículo recém-criado
    return redirect()->route('curricula.index')->with('success', 'Curriculo criado com sucesso.');
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