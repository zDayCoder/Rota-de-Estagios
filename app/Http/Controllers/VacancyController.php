<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\VacancySkill;
use App\Models\Address;
use App\Models\Intern;
use App\Models\User;
use App\Models\applications;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Company; // Importe o modelo da empresa


class VacancyController extends Controller
{

    public function indexIntern()
    {
        $vacancies = DB::table('vacancy')->where('status', '=', "Aberta")->get();
        $skills = VacancySkill::all();

        return view(view: 'vacancyIntern', data: compact('vacancies','skills'));
    }

    public function indexRecruiter()
    {
        $user = Auth::user(); 
        $company = DB::table('Company')->where('user_id', $user->id)->first('id');
        
        if (!$company) {
            return view(view: 'company.form');
        }
        else{
        
            $company = DB::table('Company')->where('user_id', $user->id)->first('id');
            $vacancies = DB::table('Vacancy')->where('company_id', $company->id)->get();

            foreach ($vacancies as $vacancy) {
                $vacancy->vacancy_id = DB::table('vacancySkill')->where('vacancy_id', $vacancy->id)->get();
            }

            return view(view: 'vacancyRecruiter', data: compact('vacancies'));
        }
    }

    public function create()
{
    // Verifica se o usuário está autenticado
    if (Auth::check()) {
        // Obtém o ID do usuário autenticado
        $userId = Auth::id();

        // Verifica se o usuário tem um registro na tabela de empresas
        if (Company::where('user_id', $userId)->exists()) {
            // Se sim, retorne a view para criar a vaga
            return view('vacancyRecruiterCreate');
        } else {
            // Se não, redirecione para alguma rota de erro ou página inicial
            return redirect()->route('company.create');
        }
    } else {
        // Se o usuário não estiver autenticado, redirecione para a página de login
        return redirect()->route('login');
    }
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|string|in:presencial,hibrido,homeoffice',
            'skills' => 'nullable|array', 
            'status' => 'nullable|string|in:Aberta,Fechada,Cancelada',
        ]);

        $user = Auth::user(); 
        $company = DB::table('Company')->where('user_id', $user->id)->first('id');
        
        if (!$company) {
            return view(view: 'company.form');
        }

        else
        {
            $vacancy = Vacancy::create([
                'company_id' => $company->id,
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'salary' => $validatedData['salary'],
                'model' => $validatedData['model'],
                'status'=> "Aberta",
            ]);
        

            if (!empty($validatedData['skills'])) {
                foreach ($validatedData['skills'] as $skillData) {
            
                    $vacancySkill = VacancySkill::create([
                        'name' => $skillData['name'],
                        'level' => $skillData['level'],
                        'vacancy_id' => $vacancy->id, 
                    ]);

                }
            }
            return redirect('vacancy/recruiter')->with('success', 'Vacancy created successfully.');
        }
    }


    public function show(Vacancy $vacancy)
    {
        return response()->json($vacancy);
    }

    public function edit($vacancy_id)
    {
        
        $vacancy = Vacancy::findOrFail($vacancy_id);
        $skills = DB::table('VacancySkill')->where('vacancy_id', '=', $vacancy_id)->get();


        return view('vacancyRecruiterEdit', data: compact('vacancy', 'skills'));
      
    }

    public function update(Request $request, $id)   
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|string|in:presencial,hibrido,homeoffice',
            'status' => 'required|string|in:Aberta,Fechada,Cancelada',            
        ]);

        $vacancy = Vacancy::findOrFail($id);


        $vacancy->company_id = $validatedData['company_id'];
        $vacancy->name = $validatedData['name'];
        $vacancy->description = $validatedData['description'];
        $vacancy->salary = $validatedData['salary'];
        $vacancy->model = $validatedData['model'];
        $vacancy->save();

 
        if (!empty($validatedData['skills'])) {
       


            foreach ($validatedData['skills'] as $skillData) {
                $skill = VacancySkill::updateOrCreate(
                    ['vacancy_id' => $vacancy->id, 'name' => $skillData['name']],
                    ['level' => $skillData['level'], 'curriculum_id' => $skillData['curriculum_id']]
                );
       
            }
        }

        return redirect('vacancy/recruiter')->with('success', 'Vacancy editaded successfully.');
    
    }

    public function applyVacancy($vacancy_id)
    {
        $user = Auth::user(); 
        $interns = DB::table('Interns')->where('user_id', $user->id)->first('id');
        
        if (!$interns) {

            return view(view: 'intern.form');
        }
        else
        {
            $vacancy = Vacancy::findOrFail($vacancy_id);
            $skills = DB::table('VacancySkill')->where('vacancy_id', '=', $vacancy_id)->get();


            return view(view: 'VacancyApply', data: compact('vacancy', 'skills'));
        }


    }

    public function applyVacancyStore(Request $request)
    {   
        $user = Auth::user(); 
        $intern = DB::table('Interns')->where('user_id', $user->id)->first('id');

        $dataAtual = new Carbon();

        $applications = Applications::create([
            //'id' => $request->id, 
            'vacancy_id'=> $request->vacancy_id, 
            'application_date'=> $dataAtual,
            'intern_id' => $intern-> id, 
            'company_id'=> $request->company_id, 
            'intern_name'=>$request->name,
        ]);

        return redirect('vacancy/intern')->with('success', 'Vacancy editaded successfully.');

    }

    public function finishVacancy($vacancy_id)
    {
        $vacancy = Vacancy::findOrFail($vacancy_id); 
        $applications = DB::table('applications')->where('vacancy_id', $vacancy->id)->get();

        $interns = []; 
        $users = []; 

        foreach ($applications as $application) {
            $intern = Intern::findOrFail($application->intern_id);
            $user = User::findOrFail($intern->user_id);
            $interns[] = $intern;
            $users[] = $user;
            
        }

        return view(view: 'VacancyFinish', data: compact('vacancy','interns', 'users'));
    }

    public function finishVacancyStore(Request $request)
    {
        $intern = Intern::findOrFail($request->intern_id);
        $vacancy = Vacancy::findOrFail($request->vacancy_id);

        $vacancy->status = 'Fechada';
        $intern->work_contract = 'contratado';
        $intern->save();
        $vacancy->save();

        return redirect('vacancy/recruiter')->with('success', 'Vacancy finished successfully.');

    }



    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 204);
    }


}