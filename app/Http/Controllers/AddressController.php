<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Address;

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
        return view('address.create');
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

}
