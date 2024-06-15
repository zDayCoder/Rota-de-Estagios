<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Address;
use App\Models\Company;

class AddressController extends Controller
{

    public function getAddressByCep(Request $request)
    {
        $cep = $request->input('cep');

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        $data = $response->json();

        return response()->json($data);
    }

    public function create()
    {
        $company = new Company();
        return view('address.create', ['company' => $company, 'address' => null]);
    }

    public function store(Request $request)
{
    $user = auth()->user();
    $request->validate([
        'zip_code' => 'required|string|max:255',
        'street_address' => 'required|string|max:255',
        'complement' => 'nullable|string|max:255',
        'neighborhood' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'number' => 'required|string|max:255',
    ]);

    // $address = $user->address()->create($request->all());
    //$user->address()->create($request->all());

    return redirect()->route('login')
        ->with('success', 'Address created successfully.');
}

public function edit($id)
{
    $address = Address::findOrFail($id);
    $company = $address->company; // Supondo que há uma relação company() no modelo Address
    return view('company.create', compact('company', 'address'));
}

public function update(Request $request, $id)
    {
        $request->validate([
            'zip_code' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $address = Address::findOrFail($id);
        $address->update($request->all());

        return redirect()->route('company.index')
            ->with('success', 'Address updated successfully.');
    }

}
