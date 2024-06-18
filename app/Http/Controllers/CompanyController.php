<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Busca todos os registros da tabela company
        $companies  = Company::all();

        // Retorna a view com os dados
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.form', ['company' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'fancy_name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:company,cnpj',
            'email' => 'required|string|email|max:255|unique:company,email',
            'contact' => 'required|string|max:255',
            'municipal_registration' => 'nullable|string|max:255',
            'state_registration' => 'nullable|string|max:255',
            'legal_nature' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        //dd($user -> id);


        Company::create([
            'company_name' => $request->company_name,
            'fancy_name' => $request->fancy_name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'contact' => $request->contact,
            'municipal_registration' => $request->municipal_registration,
            'state_registration' => $request->state_registration,
            'legal_nature' => $request->legal_nature,
            'branch' => $request->branch,
            'user_id' => $user->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $address = $company->address; // Supondo que há uma relação address() no modelo Company
        return view('company.form', compact('company', 'address'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'company_name' => 'required|string|max:255',
            'fancy_name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:company,cnpj,' . $company->id,
            'email' => 'required|string|email|max:255|unique:company,email,' . $company->id,
            'contact' => 'required|string|max:255',
            'municipal_registration' => 'nullable|string|max:255',
            'state_registration' => 'nullable|string|max:255',
            'legal_nature' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $company->update([
            'company_name' => $request->company_name,
            'fancy_name' => $request->fancy_name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'contact' => $request->contact,
            'municipal_registration' => $request->municipal_registration,
            'state_registration' => $request->state_registration,
            'legal_nature' => $request->legal_nature,
            'branch' => $request->branch,
            'user_id' => $user->id,
        ]);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }
}
