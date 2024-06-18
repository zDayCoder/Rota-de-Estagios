<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordinator;
use App\Models\User;
use App\Models\Intern;
use App\Models\Vacancy;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoordinatorController extends Controller
{
    public function index()
    {
        Session::put('tipo_user', 'Coordinator');
        return view('coordinator.index');
    }

    public function create()
    {
        return view('coordinator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinator_registration' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        Coordinator::create([
            'coordinator_registration' => $request->coordinator_registration,
            'contact' => $request->contact,
            'user_id' => $user->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $coordinator = Coordinator::find($id);
        return view('coordinator.show', compact('coordinator'));
    }

    public function edit($id)
    {
        $coordinator = Coordinator::find($id);
        return view('coordinator.edit', compact('coordinator'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'coordinator_registration' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $coordinator = Coordinator::find($id);
        $coordinator->coordinator_registration = $request->coordinator_registration;
        $coordinator->contact = $request->contact;
        $coordinator->save();

        return redirect()->route('dashboard');
    }

    public function approveIntern($id)
    {
        
        $intern = Intern::findOrFail($id);

        $intern->internship_approval = "aprovado";
        $intern->save();

        return redirect()->route('coordinator.internView');
        //dd($intern);

    }

    public function internResourceView()
    {
        $interns = Intern::all();
        $users = [];
        $applications = [];
        $vacancies = [];
        $companies = [];


            $interns = DB::table('interns')
            ->join('users', 'interns.user_id', '=', 'users.id')
            ->join('applications', 'applications.intern_id', '=', 'interns.id')
            ->join('vacancy', 'vacancy.id', '=', 'applications.vacancy_id')
            ->join('company', 'company.id', '=', 'applications.company_id')
            ->select('applications.*', 'interns.*', 'vacancy.name as vacancy_name', 'vacancy.description', 
            'vacancy.model', 'vacancy.status', 'users.name', 'company.company_name as company_name')->get();
            


        return view('InternCordinatorView', compact('interns'));
    }
}
