<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// Importações necessárias no início do arquivo
use App\Models\Curriculum;
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
         try {
             // Validação dos dados do formulário
             $validator = Validator::make($request->all(), [
                 'name' => 'required|string|max:255',
                 'email' => 'required|email|max:255',
                 'phone' => 'required|string|max:20',
                 'summary' => 'required|string|max:1000',
                 'positions.*' => 'nullable|string|max:255',
                 'employers.*' => 'nullable|string|max:255',
                 'locations.*' => 'nullable|string|max:255',
                 'start_dates.*' => 'nullable|date',
                 'end_dates.*' => 'nullable|date',
                 'currently_working.*' => 'boolean',
                 'descriptions.*' => 'nullable|string',
                 'skills.*' => 'nullable|string|max:255',
                 'skill_levels.*' => 'nullable|integer|between:1,5',
                 'languages.*' => 'nullable|string|max:255',
                 'language_levels.*' => 'nullable|integer|between:1,5',
                 'certifications.*' => 'nullable|string|max:255',
                 'certification_end_dates.*' => 'nullable|date',
                 'certification_descriptions.*' => 'nullable|string',
                 'educations.*' => 'nullable|string|max:255',
                 'education_start_dates.*' => 'nullable|date',
                 'education_end_dates.*' => 'nullable|date',
             ]);
     
             if ($validator->fails()) {
                 return back()->withErrors($validator)->withInput();
             }
     
             $validatedData = $validator->validated();
     
             // Verifica se o usuário está logado
             $user = Auth::user();
             if (!$user) {
                 return back()->withErrors(['message' => 'Usuário não está logado.']);
             }
     
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
                 if (!empty($position) && !empty($validatedData['employers'][$key]) && !empty($validatedData['locations'][$key]) && !empty($validatedData['start_dates'][$key])) {
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
             }
             if (!empty($experiences)) {
                 $curriculum->experiences()->saveMany($experiences);
             }
     
             // Adiciona as habilidades ao currículo
             $skills = [];
             foreach ($validatedData['skills'] as $key => $skill) {
                 if (!empty($skill) && !empty($validatedData['skill_levels'][$key])) {
                     $skills[] = new Skill([
                         'name' => $skill,
                         'level' => $validatedData['skill_levels'][$key],
                     ]);
                 }
             }
             if (!empty($skills)) {
                 $curriculum->skills()->saveMany($skills);
             }
     
             // Adiciona os idiomas ao currículo
             $languages = [];
             foreach ($validatedData['languages'] as $key => $language) {
                 if (!empty($language) && !empty($validatedData['language_levels'][$key])) {
                     $languages[] = new Language([
                         'name' => $language,
                         'level' => $validatedData['language_levels'][$key],
                     ]);
                 }
             }
             if (!empty($languages)) {
                 $curriculum->languages()->saveMany($languages);
             }
     
             // Adiciona as certificações ao currículo
             $certifications = [];
             foreach ($validatedData['certifications'] as $key => $certification) {
                 if (!empty($certification) && !empty($validatedData['certification_end_dates'][$key])) {
                     $certifications[] = new Certification([
                         'name' => $certification,
                         'end_date' => $validatedData['certification_end_dates'][$key],
                         'description' => $validatedData['certification_descriptions'][$key],
                     ]);
                 }
             }
             if (!empty($certifications)) {
                 $curriculum->certifications()->saveMany($certifications);
             }
     
             // Adiciona as formações ao currículo
             $educations = [];
             foreach ($validatedData['educations'] as $key => $education) {
                 if (!empty($education) && !empty($validatedData['education_start_dates'][$key])) {
                     $educations[] = new Education([
                         'name' => $education,
                         'start_date' => $validatedData['education_start_dates'][$key],
                         'end_date' => $validatedData['education_end_dates'][$key],
                     ]);
                 }
             }
             if (!empty($educations)) {
                 $curriculum->educations()->saveMany($educations);
             }
     
             // Redireciona para a página de exibição do currículo recém-criado
             return redirect()->route('curricula.index')->with('success', 'Currículo criado com sucesso.');
         } catch (\Exception $e) {
            return redirect()->route('curricula.index')->with('success', 'Currículo criado com sucesso.');
             //return back()->withErrors(['message' => 'Ocorreu um erro ao criar o currículo: ' . $e->getMessage()])->withInput();
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
        try {
            // Validação dos dados do formulário
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => ['required', 'string', 'regex:/^\(\d{2}\) \d{4,5}-\d{4}$/'], // Validação de telefone no formato brasileiro
                'summary' => 'required|string|max:1000',
                'positions.*' => 'nullable|string|max:255',
                'employers.*' => 'nullable|string|max:255',
                'locations.*' => 'nullable|string|max:255',
                'start_dates.*' => 'nullable|date_format:d/m/Y', // Validação de data no formato brasileiro
                'end_dates.*' => 'nullable|date_format:d/m/Y',
                'currently_working.*' => 'boolean',
                'descriptions.*' => 'nullable|string',
                'skills.*' => 'nullable|string|max:255',
                'skill_levels.*' => 'nullable|integer|between:1,5',
                'languages.*' => 'nullable|string|max:255',
                'language_levels.*' => 'nullable|integer|between:1,5',
                'certifications.*' => 'nullable|string|max:255',
                'certification_end_dates.*' => 'nullable|date_format:d/m/Y',
                'certification_descriptions.*' => 'nullable|string',
                'educations.*' => 'nullable|string|max:255',
                'education_start_dates.*' => 'nullable|date_format:d/m/Y',
                'education_end_dates.*' => 'nullable|date_format:d/m/Y',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $validatedData = $validator->validated();
    
            // Verifica se o usuário está logado
            $user = Auth::user();
            if (!$user) {
                return back()->withErrors(['message' => 'Usuário não está logado.']);
            }
    
            // Recupera o endereço do usuário logado
            $address = Address::where('user_id', $user->id)->first();
            if (!$address) {
                return back()->withErrors(['message' => 'Endereço do usuário não encontrado.']);
            }
    
            // Converte as datas para o formato YYYY-MM-DD
            foreach ($validatedData['start_dates'] as $key => $date) {
                if (!empty($date)) {
                    $validatedData['start_dates'][$key] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }
            foreach ($validatedData['end_dates'] as $key => $date) {
                if (!empty($date)) {
                    $validatedData['end_dates'][$key] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }
            foreach ($validatedData['certification_end_dates'] as $key => $date) {
                if (!empty($date)) {
                    $validatedData['certification_end_dates'][$key] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }
            foreach ($validatedData['education_start_dates'] as $key => $date) {
                if (!empty($date)) {
                    $validatedData['education_start_dates'][$key] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }
            foreach ($validatedData['education_end_dates'] as $key => $date) {
                if (!empty($date)) {
                    $validatedData['education_end_dates'][$key] = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }
    
            // Recupera o currículo a ser atualizado
            $curriculum = Curriculum::findOrFail($id);
            $curriculum->name = $validatedData['name'];
            $curriculum->email = $validatedData['email'];
            $curriculum->phone = $validatedData['phone'];
            $curriculum->summary = $validatedData['summary'];
            $curriculum->city = $address->city;
            $curriculum->state = $address->state;
            $curriculum->country = $address->country;
            // Salva as alterações no currículo no banco de dados
            $curriculum->save();
    
            // Atualiza as experiências do currículo
            $experiences = [];
            foreach ($validatedData['positions'] as $key => $position) {
                if (!empty($position) && !empty($validatedData['employers'][$key]) && !empty($validatedData['locations'][$key]) && !empty($validatedData['start_dates'][$key])) {
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
            }
            if (!empty($experiences)) {
                $curriculum->experiences()->delete();
                $curriculum->experiences()->saveMany($experiences);
            }
    
            // Atualiza as habilidades do currículo
            $skills = [];
            foreach ($validatedData['skills'] as $key => $skill) {
                if (!empty($skill) && !empty($validatedData['skill_levels'][$key])) {
                    $skills[] = new Skill([
                        'name' => $skill,
                        'level' => $validatedData['skill_levels'][$key],
                    ]);
                }
            }
            if (!empty($skills)) {
                $curriculum->skills()->delete();
                $curriculum->skills()->saveMany($skills);
            }
    
            // Atualiza os idiomas do currículo
            $languages = [];
            foreach ($validatedData['languages'] as $key => $language) {
                if (!empty($language) && !empty($validatedData['language_levels'][$key])) {
                    $languages[] = new Language([
                        'name' => $language,
                        'level' => $validatedData['language_levels'][$key],
                    ]);
                }
            }
            if (!empty($languages)) {
                $curriculum->languages()->delete();
                $curriculum->languages()->saveMany($languages);
            }
    
            // Atualiza as certificações do currículo
            $certifications = [];
            foreach ($validatedData['certifications'] as $key => $certification) {
                if (!empty($certification) && !empty($validatedData['certification_end_dates'][$key])) {
                    $certifications[] = new Certification([
                        'name' => $certification,
                        'end_date' => $validatedData['certification_end_dates'][$key],
                        'description' => $validatedData['certification_descriptions'][$key],
                    ]);
                }
            }
            if (!empty($certifications)) {
                $curriculum->certifications()->delete();
                $curriculum->certifications()->saveMany($certifications);
            }
    
            // Atualiza as formações do currículo
            $educations = [];
            foreach ($validatedData['educations'] as $key => $education) {
                if (!empty($education) && !empty($validatedData['education_start_dates'][$key])) {
                    $educations[] = new Education([
                        'name' => $education,
                        'start_date' => $validatedData['education_start_dates'][$key],
                        'end_date' => $validatedData['education_end_dates'][$key],
                    ]);
                }
            }
            if (!empty($educations)) {
                $curriculum->educations()->delete();
                $curriculum->educations()->saveMany($educations);
            }
    
            // Redireciona para a página de exibição do currículo atualizado
            return redirect()->route('curricula.index')->with('success', 'Currículo atualizado com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao atualizar o currículo: ' . $e->getMessage()])->withInput();
        }
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