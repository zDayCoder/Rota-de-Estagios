<x-app-layout>
    <x-authentication-card>
    <div class="container">

    <x-label>
        <h1 style="font-weight:bold">Detalhes da Empresa</h1>
    </x-label>

    <x-label>
      <h3 style="font-weight:bolder; text-decoration: underline">Informações da Empresa</h3>
    </x-label>

    <div>
        <x-label>Nome Social:<a style="font-weight:normal">{{ Auth::user()->name }}</a></x-label>
    </div>

    <div>
        <x-label>Nome Fantasia:<a style="font-weight:normal">{{ $company->fancy_name }}</a></x-label>
    </div>

    <div>
        <x-label>CNPJ:<a style="font-weight:normal">{{ $company->cnpj }}</a></x-label>
    </div>

    <div>
        <x-label>Email:<a style="font-weight:normal">{{ Auth::user()->email }}</a></x-label>
    </div>

    <div>
        <x-label>Contato:<a style="font-weight:normal">{{ $company->contact }}</a></x-label>
    </div>

    <div>
        <x-label>Registro Municipal:<a style="font-weight:normal">{{ $company->municipal_registration }}</a></x-label>
    </div>

    <div>
        <x-label>Registro Estadual:<a style="font-weight:normal">{{ $company->state_registration }}</a></x-label>
    </div>

    <div>
        <x-label>Natureza Juridica:<a style="font-weight:normal">{{ $company->legal_nature }}</a></x-label>
    </div>

    <div>
        <x-label>Seguimento:<a style="font-weight:normal">{{ $company->branch }}</a></x-label>
    </div>

    <x-label class="mt-3">
      <h3 style="font-weight:bolder; text-decoration: underline">Endereço</h3>
    </x-label>
    <div>
        <x-label>CEP:<a style="font-weight:normal">{{ $company->address->zip_code }}</a></x-label>
    </div>
    <div>
        <x-label>Logradouro:<a style="font-weight:normal">{{ $company->address->street_address }}</a></x-label>
    </div>
    <div>
        <x-label>Complemento:<a style="font-weight:normal">{{ $company->address->complement }}</a></x-label>
    </div>
    <div>
        <x-label>Bairro:<a style="font-weight:normal">{{ $company->address->neighborhood }}</a></x-label>
    </div>
    <div>
        <x-label>Cidade:<a style="font-weight:normal">{{ $company->address->city }}</a></x-label>
    </div>
    <div>
        <x-label>Estado:<a style="font-weight:normal">{{ $company->address->state }}</a></x-label>
    </div>
    <div>
        <x-label>Número:<a style="font-weight:normal">{{ $company->address->number }}</a></x-label>
    </div>

    <x-button class="mt-3 mb-4" type="submit">
        <a style="color: white; text-decoration: none" href="{{ route('company.edit', $company->id) }}">Atualizar dados</a>
    </x-button>
    </div>
</x-app-layout>
</x-authentication-card>
