        <div class="container">
            <x-label>
                <h1>Editar cadastro</h1>
            </x-label>
            <form action="{{ route('coordinator.update', $coordinator->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                            name="coordinator_registration" value="{{ $coordinator->coordinator_registration }}">
                    </div>

                    <div class="form-group">
                        <x-label for="contact">Contato</x-label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $coordinator->contact }}">
                    </div>

                    <x-button type="submit" class="btn btn-primary">Atualizar</x-button>
            </form>
        </div>