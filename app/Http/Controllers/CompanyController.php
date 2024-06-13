<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        // Busca todos os registros da tabela companies
        $companies  = Company::all();

        // Retorna a view com os dados
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
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
            'address_id' => 'required|exists:addresses,id',
        ]);

        Company::create($request->all());

        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.create', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'fancy_name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:company,cnpj,' . $id,
            'email' => 'required|string|email|max:255|unique:company,email,' . $id,
            'contact' => 'required|string|max:255',
            'municipal_registration' => 'nullable|string|max:255',
            'state_registration' => 'nullable|string|max:255',
            'legal_nature' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'address_id' => 'required|exists:addresses,id',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }
}
