<x-app-layout>
    <x-authentication-card>
        <div class="container">

            <x-label>
                <h1 style="font-weight:bold">Detalhes do Coordenador</h1>
            </x-label>

            <x-label>
                <h3 style="font-weight:bolder; text-decoration: underline">Informações da Empresa</h3>
            </x-label>

            <div>
                <x-label>Nome Social:<a style="font-weight:normal">{{ Auth::user()->name }}</a></x-label>
            </div>

            <div>
                <x-label>Email:<a style="font-weight:normal">{{ Auth::user()->email }}</a></x-label>
            </div>

            <div>
                <x-label>Registro do Coordenador:<a
                        style="font-weight:normal">{{ $coordinator->coordinator_registration }}</a></x-label>
            </div>

            <div>
                <x-label>Contato:<a style="font-weight:normal">{{ $coordinator->contact }}</a></x-label>
            </div>

    <x-button class="mt-3 mb-4" type="submit">
        <a style="color: white; text-decoration: none" href="{{ route('coordinator.edit', $coordinator->id) }}">Atualizar dados</a>
    </x-button>
    </div>
</x-app-layout>
</x-authentication-card>
