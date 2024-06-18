<x-app-layout>
<x-authentication-card>

<div class="container">
    <x-label>
        <h1>{{ isset($company->id) ? 'Editar dados' : 'Hora de completar seus dados' }}</h1>
    </x-label>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($company->id) ? route('company.update', $company->id) : route('company.store') }}" method="POST">
        @csrf
        @if(isset($company->id))
            @method('PUT')
        @endif
        <div>
            <x-label for="company_name">Razão Social:</x-label>
            <x-input class="block mt-1 w-full input-styles" type="text" id="company_name" name="company_name" value="{{ old('company_name', $company->company_name ?? '') }}" required/>
        </div>
        <div>
            <x-label for="fancy_name">Nome Fantasia:</x-label>
            <x-input class="block mt-1 w-full input-styles" type="text" id="fancy_name" name="fancy_name" value="{{ old('fancy_name', $company->fancy_name ?? '') }}" required/>
        </div>
        <div>
            <x-label for="cnpj">CNPJ:</x-label>
            <x-input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', $company->cnpj ?? '') }}" required/>
        </div>
        <div>
            <x-label for="email">Email:</x-label>
            <x-input type="email" id="email" name="email" value="{{ old('email', $company->email ?? '') }}" required/>
        </div>
        <div>
            <x-label for="contact">Contato:</x-label>
            <x-input type="text" id="contact" name="contact" value="{{ old('contact', $company->contact ?? '') }}" required/>
        </div>
        <div>
            <x-label for="municipal_registration">Registro Municipal:</x-label>
            <x-input type="text" id="municipal_registration" name="municipal_registration" value="{{ old('municipal_registration', $company->municipal_registration ?? '') }}"/>
        </div>
        <div>
            <x-label for="state_registration">Registro Estadual:</x-label>
            <x-input type="text" id="state_registration" name="state_registration" value="{{ old('state_registration', $company->state_registration ?? '') }}"/>
        </div>
        <div>
            <x-label for="legal_nature">Natureza Jurídica:</x-label>
            <x-input type="text" id="legal_nature" name="legal_nature" value="{{ old('legal_nature', $company->legal_nature ?? '') }}" required/>
        </div>
        <div>
            <x-label for="branch">Seguimento:</x-label>
            <x-input type="text" id="branch" name="branch" value="{{ old('branch', $company->branch ?? '') }}" required/>
        </div>

        <x-button class="mt-3 mb-4" type="submit">
            {{ isset($company->id) ? 'Atualizar' : 'Cadastrar' }}
        </x-button>
    </form>
    </div>
    </x-authentication-card>

   </x-app-layout>
