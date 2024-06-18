<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

// Importações necessárias no início do arquivo
use App\Models\User;
use App\Models\Intern;
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
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Acessa todos os dados do usuário autenticado
            $user = Auth::user();

            // Verifica se o usuário é um estagiário (Intern)
            if ($user->user_type == User::TYPE_INTERN) {


                // Recupera o Intern associado ao usuário
                $intern = Intern::where('user_id', $user->id);//->first();

                // Verifica se o Intern foi encontrado
                if ($intern) {
                    // Verifica se o Intern tem um endereço associado
                    if ($user->address) {
                        // Recupera o currículo associado ao Intern
                        
                        $curriculum = Curriculum::where('intern_id', $user->id)->first();
                        

                        if (!$curriculum) {
                            // Se não existir currículo, redirecione para a rota de criação
                            return redirect()->route('curricula.create');
                        }else{
                            
                        }

                        // Se existir currículo, carregue a view de index com os dados necessários
                        return view('curricula.index', compact('user', 'intern', 'curriculum'));
                    } else {
                        // Se o Intern não tiver um endereço, redirecione para criar o endereço
                        return redirect()->route('address.create');
                    }
                } else {
                    // Se o Intern não foi encontrado, lance uma exceção 403
                    //abort(403, 'Estagiário não encontrado.');
                    return redirect()->route('interns.create');
                }





            } else {
                // Se o usuário não for um estagiário, lance uma exceção 403
                abort(403, 'Acesso não autorizado.');
            }
        } else {
            // Se o usuário não estiver autenticado, redirecione para a página de login
            return redirect()->route('login')->withErrors(['message' => 'Faça login para acessar esta página.']);
        }
    }

    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        if (Auth::check()) {
            // Acessa todos os dados do usuário autenticado
            $user = Auth::user();

            // Verifica se o usuário é um estagiário (Intern)
            if ($user->user_type == User::TYPE_INTERN) {


                // Recupera o Intern associado ao usuário
                $intern = Intern::where('user_id', $user->id);//->first();

                // Verifica se o Intern foi encontrado
                if ($intern->exists()) {
                    // Verifica se o Intern tem um endereço associado
                    if ($user->address) {
                        // Recupera o currículo associado ao Intern
                        $address = $user->address;
                        $curriculum = Curriculum::where('intern_id', $user->id)->first();
                        

                        if (!$curriculum) {
                            // Se não existir currículo, redirecione para a rota de criação
                            return view('curricula.create', [
                                'user' => $user,
                                'address' => $address,
                            ]);
                        }else{
                            return redirect()->route('curricula.index');
                        }

                        // Se existir currículo, carregue a view de index com os dados necessários
                    } else {
                        // Se o Intern não tiver um endereço, redirecione para criar o endereço
                        return redirect()->route('address.create');
                    }
                } else {
                    // Se o Intern não foi encontrado, lance uma exceção 403
                    //abort(403, 'Estagiário não encontrado.');
                    return redirect()->route('interns.create');
                }





            } else {
                // Se o usuário não for um estagiário, lance uma exceção 403
                abort(403, 'Acesso não autorizado.');
            }
        } else {
            // Se o usuário não estiver autenticado, redirecione para a página de login
            return redirect()->route('login')->withErrors(['message' => 'Faça login para acessar esta página.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request)
     {
        
         try {
        
            $request->merge([
                'start_dates' => $request->has('start_dates') ? array_map(function($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('start_dates', [])) : [],
            
                'end_dates' => $request->has('end_dates') ? array_map(function ($date) {
                    return $date ? \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') : null;
                }, $request->input('end_dates', [])) : [],
            
                'certification_end_dates' => $request->has('certification_end_dates') ? array_map(function($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('certification_end_dates', [])) : [],
            
                'education_start_dates' => $request->has('education_start_dates') ? array_map(function($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('education_start_dates', [])) : [],
            
                'education_end_dates' => $request->has('education_end_dates') ? array_map(function($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('education_end_dates', [])) : []
            ]);
            
             // Validação dos dados do formulário
             $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'summary' => 'required|string|max:1000',
                'positions.*' => 'nullable|string|max:255',
                'employers.*' => 'nullable|string|max:255',
                'locations.*' => 'nullable|string|max:255',
                'currently_working_.*' => 'integer',
                'descriptions.*' => 'nullable|string',
                'skills.*' => 'nullable|string|max:255',
                'skill_levels.*' => 'nullable|integer|between:1,5',
                'languages.*' => 'nullable|string|max:255',
                'language_levels.*' => 'nullable|integer|between:1,5',
                'certifications.*' => 'nullable|string|max:255',
                'certification_descriptions.*' => 'nullable|string',
                'educations.*' => 'nullable|string|max:255',
                'profile_photo' => 'nullable|max:2048',
            ];
            
            if ($request->has('start_dates')) {
                $rules['start_dates.*'] = 'nullable|date';
            }
            
            if ($request->has('end_dates')) {
                $rules['end_dates.*'] = 'nullable|date';
            }
            
            if ($request->has('certification_end_dates')) {
                $rules['certification_end_dates.*'] = 'nullable|date';
            }
            
            if ($request->has('education_start_dates')) {
                $rules['education_start_dates.*'] = 'nullable|date';
            }
            
            if ($request->has('education_end_dates')) {
                $rules['education_end_dates.*'] = 'nullable|date';
            }
            
            $validator = Validator::make($request->all(), $rules);
     
             if ($validator->fails()) {
                //  return back()->withErrors($validator)->withInput();
                
                return redirect()->route('register')->withErrors($validator)->withInput();
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

            // Processo de upload da foto de perfil
            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                if ($profilePhoto) {
                    // Verifica se já existe uma foto de perfil e deleta se existir
                    if ($user->profile_photo_path) {
                        Storage::disk('public')->delete($user->profile_photo_path);
                    }

                    // Armazena a nova foto de perfil
                    $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
                    $user->forceFill([
                        'profile_photo_path' => $profilePhotoPath,
                    ])->save();

                } 
            }

            // Atualiza os dados do usuário usando forceFill
            $user->forceFill([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ])->save();
             // Cria um novo currículo com base nos dados recebidos
             $curriculum = new Curriculum();
             $curriculum->intern_id = $user->id;
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
                if (
                    !empty($position) &&
                    !empty($validatedData['employers'][$key]) &&
                    !empty($validatedData['locations'][$key]) &&
                    !empty($validatedData['start_dates'][$key]) 
                ) {

                    $currentlyWorkingKey = "currently_working_" . ($key + 1);
                    $isCurrent = $request->input($currentlyWorkingKey, 0);

                    // Definir endDate como null se isCurrent for verdadeiro, caso contrário, usar o valor de end_dates
                    $endDate = $validatedData['end_dates'][$key];

                    $experiences[] = new Experience([
                        'position' => $position,
                        'employer' => $validatedData['employers'][$key],
                        'location' => $validatedData['locations'][$key],
                        'start_date' => $validatedData['start_dates'][$key],
                        'end_date' => $endDate,
                        'is_current' => $isCurrent,
                        'description' => $validatedData['descriptions'][$key] ?? '',
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
    // Recupera o currículo com suas relações
    $curriculum = Curriculum::with(['experiences', 'skills', 'languages', 'certifications', 'educations'])->findOrFail($id);

    // Verifica se o usuário está logado e é o dono do currículo
    $user = Auth::user();
    // if (!$user || $curriculum->user_id != $user->id) {
    //     return redirect()->route('curricula.index')->withErrors(['message' => 'Você não tem permissão para editar este currículo.']);
    // }

    // Passa o currículo e suas relações para a view
    return view('curricula.edit', [
        'user' => $user,
        'curriculum' => $curriculum,
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->merge([
                'start_dates' => $request->has('start_dates') ? array_map(function ($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('start_dates', [])) : [],

                'end_dates' => $request->has('end_dates') ? array_map(function ($date) {
                    return $date ? \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') : null;
                }, $request->input('end_dates', [])) : [],

                'certification_end_dates' => $request->has('certification_end_dates') ? array_map(function ($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('certification_end_dates', [])) : [],

                'education_start_dates' => $request->has('education_start_dates') ? array_map(function ($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('education_start_dates', [])) : [],

                'education_end_dates' => $request->has('education_end_dates') ? array_map(function ($date) {
                    return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }, $request->input('education_end_dates', [])) : []
            ]);

            // Validação dos dados do formulário
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'summary' => 'required|string|max:1000',
                'positions.*' => 'nullable|string|max:255',
                'employers.*' => 'nullable|string|max:255',
                'locations.*' => 'nullable|string|max:255',
                'currently_working_.*' => 'integer',
                'descriptions.*' => 'nullable|string',
                'skills.*' => 'nullable|string|max:255',
                'skill_levels.*' => 'nullable|integer|between:1,5',
                'languages.*' => 'nullable|string|max:255',
                'language_levels.*' => 'nullable|integer|between:1,5',
                'certifications.*' => 'nullable|string|max:255',
                'certification_descriptions.*' => 'nullable|string',
                'educations.*' => 'nullable|string|max:255',
                'profile_photo' => 'nullable|max:2048',
            ];

            if ($request->has('start_dates')) {
                $rules['start_dates.*'] = 'nullable|date';
            }

            if ($request->has('end_dates')) {
                $rules['end_dates.*'] = 'nullable|date';
            }

            if ($request->has('certification_end_dates')) {
                $rules['certification_end_dates.*'] = 'nullable|date';
            }

            if ($request->has('education_start_dates')) {
                $rules['education_start_dates.*'] = 'nullable|date';
            }

            if ($request->has('education_end_dates')) {
                $rules['education_end_dates.*'] = 'nullable|date';
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('curricula.edit', $id)->withErrors($validator)->withInput();
            }

            $validatedData = $validator->validated();

            // Verifica se o usuário está logado
            $user = Auth::user();
            if (!$user) {
                return back()->withErrors(['message' => 'Usuário não está logado.']);
            }

            // Recupera o currículo existente
            $curriculum = Curriculum::findOrFail($id);
            
            // Processo de upload da foto de perfil
            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                if ($profilePhoto) {
                    // Verifica se já existe uma foto de perfil e deleta se existir
                    if ($user->profile_photo_path) {
                        Storage::disk('public')->delete($user->profile_photo_path);
                    }

                    // Armazena a nova foto de perfil
                    $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
                    $user->forceFill([
                        'profile_photo_path' => $profilePhotoPath,
                    ])->save();

                } 
            }

            // Atualiza os dados do usuário usando forceFill
            $user->forceFill([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ])->save();

            // Atualiza os dados do currículo
            $curriculum->name = $validatedData['name'];
            $curriculum->email = $validatedData['email'];
            $curriculum->phone = $validatedData['phone'];
            $curriculum->summary = $validatedData['summary'];
            $curriculum->save();

            // Atualiza as experiências do currículo
            $curriculum->experiences()->delete(); // Remove as experiências antigas
            $experiences = [];
            foreach ($validatedData['positions'] as $key => $position) {
                if (
                    !empty($position) &&
                    !empty($validatedData['employers'][$key]) &&
                    !empty($validatedData['locations'][$key]) &&
                    !empty($validatedData['start_dates'][$key])
                ) {
                    $currentlyWorkingKey = "currently_working_" . ($key + 1);
                    $isCurrent = $request->input($currentlyWorkingKey, 0);
                    $endDate = $validatedData['end_dates'][$key];

                    $experiences[] = new Experience([
                        'position' => $position,
                        'employer' => $validatedData['employers'][$key],
                        'location' => $validatedData['locations'][$key],
                        'start_date' => $validatedData['start_dates'][$key],
                        'end_date' => $endDate,
                        'is_current' => $isCurrent,
                        'description' => $validatedData['descriptions'][$key] ?? '',
                    ]);
                }
            }
            if (!empty($experiences)) {
                $curriculum->experiences()->saveMany($experiences);
            }

            // Atualiza as habilidades do currículo
            $curriculum->skills()->delete(); // Remove as habilidades antigas
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

            // Atualiza os idiomas do currículo
            $curriculum->languages()->delete(); // Remove os idiomas antigos
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

            // Atualiza as certificações do currículo
            $curriculum->certifications()->delete(); // Remove as certificações antigas
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

            // Atualiza as formações do currículo
            $curriculum->educations()->delete(); // Remove as formações antigas
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








    // DELETAR ITENS DE CADA SESSÃO

    public function deleteExperience(Curriculum $curriculum, Experience $experience)
    {
        try {
            $experience->delete();
            //return back()->with('success', 'Experiência removida com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao remover a experiência: ' . $e->getMessage()]);
        }
    }

    public function deleteSkill(Curriculum $curriculum, Skill $skill)
    {
        try {
            $skill->delete();
            return back()->with('success', 'Habilidade removida com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao remover a habilidade: ' . $e->getMessage()]);
        }
    }

    public function deleteLanguage(Curriculum $curriculum, Language $language)
    {
        try {
            $language->delete();
            return back()->with('success', 'Idioma removido com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao remover o idioma: ' . $e->getMessage()]);
        }
    }

    public function deleteCertification(Curriculum $curriculum, Certification $certification)
    {
        try {
            $certification->delete();
            return back()->with('success', 'Certificação removida com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao remover a certificação: ' . $e->getMessage()]);
        }
    }

    public function deleteEducation(Curriculum $curriculum, Education $education)
    {
        try {
            $education->delete();
            return back()->with('success', 'Formação removida com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Ocorreu um erro ao remover a formação: ' . $e->getMessage()]);
        }
    }

}