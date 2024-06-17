<x-app-layout>
    <x-authentication-card>
        <div class="container">
            <x-label>
                <h1>{{ isset($coordinator) ? 'Editar cadastro' : 'Cadastrar Coordenador' }}</h1>
            </x-label>
            <form
                action="{{ isset($coordinator) ? route('coordinators.update', $coordinator->id) : route('coordinators.store') }}"
                method="POST">
                @csrf
                @if(isset($coordinator))
                @method('PUT')
                @endif

                <div>
                    <x-label>
                        <p>Nome Completo: <u> {{ Auth::user()->name }}</u></p>
                    </x-label>
                </div>
                <div>
                    <x-label>
                        <p>Email: <u>{{ Auth::user()->email }}</u></p>
                    </x-label>
                </div>

                <div>
                    <div class="form-group">
                        <x-label for="coordinator_registration">Registro do Coordenador</x-label>
                        <input type="text" class="form-control" id="coordinator_registration"
                            name="coordinator_registration"
                            value="{{ isset($coordinator) ? $coordinator->coordinator_registration : '' }}">
                    </div>

                    <div class="form-group">
                        <x-label for="contact">Contato</x-label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ isset($coordinator) ? $coordinator->contact : '' }}">
                    </div>

                    <x-button type="submit" class="btn btn-primary">
                        {{ isset($coordinator) ? 'Atualizar' : 'Cadastrar' }}
                    </x-button>
            </form>
        </div>
</x-app-layout>
</x-authentication-card>