<x-app-layout>
    <x-authentication-card>
    <div class="container">
    <x-label>
        <h1 style="font-weight:bold">Detalhes do Estagiário</h1>
    </x-label>

    <x-label>
      <h3 style="font-weight:bolder; text-decoration: underline">Informações Pessoais</h3>
    </x-label>


    <div>
        <x-label>Nome Completo:<a style="font-weight:normal">{{ Auth::user()->name }}</a></x-label>

    </div>
    <div>
        <x-label>Data de Nascimento:<a style="font-weight:normal">{{ $intern->birth_date }}</a></x-label>
    </div>
    <div>
        <x-label>Gênero:<a style="font-weight:normal">{{ $intern->gender }}</a></x-label>
    </div>
    <div>
        <x-label>Data de Nascimento:<a style="font-weight:normal">{{ $intern->birth_date }}</a></x-label>
    </div>
    <div>
        <x-label>Telefone:<a style="font-weight:normal">{{ $intern->phone }}</a></x-label>
    </div>
    <div>
        <x-label>Instituição de Ensino:<a style="font-weight:normal">{{ $intern->educational_institution }}</a></x-label>
    </div>
    <div>
        <x-label>Curso:<a style="font-weight:normal">{{ $intern->course }}</a></x-label>
    </div>
    <div>
        <x-label>Semestre Atual:<a style="font-weight:normal">{{ $intern->current_period }}</a></x-label>
    </div>

    <x-label class="mt-3">
      <h3 style="font-weight:bolder; text-decoration: underline">Endereço</h3>
    </x-label>
    <div>
        <x-label>CEP:<a style="font-weight:normal">{{ $intern->address->zip_code }}</a></x-label>
    </div>
    <div>
        <x-label>Logradouro:<a style="font-weight:normal">{{ $intern->address->street_address }}</a></x-label>
    </div>
    <div>
        <x-label>Complemento:<a style="font-weight:normal">{{ $intern->address->complement }}</a></x-label>
    </div>
    <div>
        <x-label>Bairro:<a style="font-weight:normal">{{ $intern->address->neighborhood }}</a></x-label>
    </div>
    <div>
        <x-label>Cidade:<a style="font-weight:normal">{{ $intern->address->city }}</a></x-label>
    </div>
    <div>
        <x-label>Estado:<a style="font-weight:normal">{{ $intern->address->state }}</a></x-label>
    </div>
    <div>
        <x-label>Número:<a style="font-weight:normal">{{ $intern->address->number }}</a></x-label>
    </div>

    <x-button class="mt-3 mb-4" type="submit">
        <a style="color: white; text-decoration: none" href="{{ route('interns.edit', $intern->id) }}">Atualizar dados</a>
    </x-button>

    </div>
</x-app-layout>
</x-authentication-card>
