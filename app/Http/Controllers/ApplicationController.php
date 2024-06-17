<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\VacancySkill;
use App\Models\Address;
use App\Models\Company;
use App\Models\applications;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ApplicationController extends Controller
{
    public function indexIntern() 
    {
        $user = Auth::user();
        $intern = DB::table('interns')->where('user_id', $user->id)->first();
        $applications = DB::table('applications')
        ->where('intern_id', $intern->id)
        ->get();

        $vacancies = [];
        $companies = []; 

        foreach ($applications as $application) {
            $vacancy = Vacancy::findOrFail($application->vacancy_id);
            $company = Company::findOrFail($vacancy->company_id); 
            $vacancies[] = $vacancy;
            $companies[] = $company;
        }

        return view( 'Application', compact('vacancies','applications','companies'));
        
    }

    public function destroy($id)
    {
        $applcation = Applications::findOrFail($id);
        $applcation->delete();

        return redirect()->route('application.index')->with('success', 'Vacancy deleted successfully');
        

    }

    

}
