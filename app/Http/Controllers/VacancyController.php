<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\VacancySkill;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{

    public function indexIntern()
    {
        $vacancies = Vacancy::all();
        $skills = VacancySkill::all();

        return view(view: 'vacancy', data: compact('vacancies','skills'));
        //return response()->json($vacancy);
    }

    public function indexRecruiter()
    {
    
    $user = Auth::user(); 
    $company = DB::table('Company')->where('user_id', $user->id)->first('id');

    $vacancies = DB::table('Vacancy')->where('company_id', $company->id)->get();


    foreach ($vacancies as $vacancy) {
        $vacancy->vacancy_id = DB::table('vacancySkill')->where('vacancy_id', $vacancy->id)->get();
    }

    return view(view: 'vacancy', data: compact('vacancies'));
}

    public function create()
    {
        return view('vacancyCreate');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|string|in:presencial,hibrido,homeoffice',
            'addreess_id' => 'nullable|integer', 
            'skills' => 'nullable|array', 
            'skills.*.name' => 'required_with:skills|string|max:255',
            'skills.*.level' => 'required_with:skills|string|max:255',
            'skills.*.curriculum_id' => 'required_with:skills|integer',
            'trainee_id' => 'nullable|integer', 
            'status' => 'nullable|string|in:Aberta,Fechada,Cancelada',
        ]);

        $user = Auth::user();

        
        
        $company = DB::table('company')->where('user_id', $user->id)->first('id');

        $validatedData['addreess_id'] = $validatedData['addreess_id'] ?? 1;
        $validatedData['trainee_id'] = $validatedData['trainee_id'] ?? 1;

        $vacancy = Vacancy::create([
            'company_id' => $company->id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'salary' => $validatedData['salary'],
            'model' => $validatedData['model'],
            'address_id' => $validatedData['addreess_id'],
            'status'=> "Aberta"
        ]);
        

        $address = Address::create([
            'zip_code' => $request->zip_code,
            'street_address' => $request->street_address,
            'complement' => $request->complement,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'user_id' => $user->id,
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

        return redirect('vacancy')->with('success', 'Vacancy created successfully.');
    }


    public function show(Vacancy $vacancy)
    {
        return response()->json($vacancy);
    }

    public function edit($vacancy_id)
    {
        
        $vacancy = Vacancy::findOrFail($vacancy_id);
        $skills = DB::table('VacancySkill')->where('vacancy_id', '=', $vacancy_id)->get();


        return view('vacancyEdit', data: compact('vacancy', 'skills'));
      
    }

    public function update(Request $request, $id)   
    {
        $validatedData = $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:35',
            'description' => 'required|string|max:100',
            'salary' => 'required|numeric',
            'model' => 'required|string|in:presencial,hibrido,homeoffice',
            'addreess_id' => 'nullable|integer',
            'skills' => 'nullable|array',
            'skills.*.name' => 'required_with:skills|string|max:255',
            'skills.*.level' => 'required_with:skills|string|max:255',
            'skills.*.curriculum_id' => 'required_with:skills|integer',
        ]);

        $vacancy = Vacancy::findOrFail($id);


        $vacancy->company_id = $validatedData['company_id'];
        $vacancy->name = $validatedData['name'];
        $vacancy->description = $validatedData['description'];
        $vacancy->salary = $validatedData['salary'];
        $vacancy->model = $validatedData['model'];
        $vacancy->address_id = $validatedData['address_id'] ?? 1; 
        $vacancy->save();

 
        if (!empty($validatedData['skills'])) {
       
            //$vacancy->Vacancyskills()->detach();

            foreach ($validatedData['skills'] as $skillData) {
                $skill = VacancySkill::updateOrCreate(
                    ['vacancy_id' => $vacancy->id, 'name' => $skillData['name']],
                    ['level' => $skillData['level'], 'curriculum_id' => $skillData['curriculum_id']]
                );
                //$vacancy->skills()->attach($skill->id);
            }
        }

        return redirect('vacancy')->with('success', 'Vacancy editaded successfully.');
    
    }

    public function applyVacancy(Request $request)
    {


    }


    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 204);
    }


}
