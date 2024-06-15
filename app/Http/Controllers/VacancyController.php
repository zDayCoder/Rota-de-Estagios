<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\VacancySkill;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies = Vacancy::all();
        $skills = VacancySkill::all();

        return view(view: 'vacancy', data: compact('vacancies','skills'));
        //return response()->json($vacancy);
    }

    public function create()
    {
        return view('vacancyCreate');
    }


    public function store(Request $request)
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


        $validatedData['addreess_id'] = $validatedData['addreess_id'] ?? 1;

        $vacancy = Vacancy::create([
            'company_id' => $validatedData['company_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'salary' => $validatedData['salary'],
            'model' => $validatedData['model'],
            'address_id' => $validatedData['addreess_id'],
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
        
        $vacancy = DB::table('Vacancy')->where('$vacancy.vaga_id', '=', $vacancy_id);
        $skills = DB::table('VacancySkill')->where('$VacancySkill.vacancy_id', '=', $vacancy_id);

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
        $vacancy->addreess_id = $validatedData['addreess_id'] ?? 1; 
        $vacancy->save();

 
        if (!empty($validatedData['skills'])) {
       
            $vacancy->skills()->detach();

            foreach ($validatedData['skills'] as $skillData) {
                $skill = VacancySkill::updateOrCreate(
                    ['vacancy_id' => $vacancy->id, 'name' => $skillData['name']],
                    ['level' => $skillData['level'], 'curriculum_id' => $skillData['curriculum_id']]
                );
                $vacancy->skills()->attach($skill->id);
            }
        }

        return redirect('vacancy')->with('success', 'Vacancy editaded successfully.');
    
    }


    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 204);
    }
}
