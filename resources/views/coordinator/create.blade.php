
        <div class="container">
            <x-label>
                <h1>Cadastrar Coordenador</h1>
            </x-label>
            <form action="{{ route('coordinator.store') }}" method="POST">
            @csrf

                <div class="form-group">
                    <x-label for="coordinator_registration">Registro do Coordenador</x-label>
                    <input type="text" class="form-control" id="coordinator_registration" name="coordinator_registration" required>
                </div>

                <div class="form-group">
                    <x-label for="contact">Contato</x-label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>

                <x-button type="submit" class="btn btn-primary">Cadastrar</x-button>
            </form>
        </div>