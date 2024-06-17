<x-app-layout>
    <x-authentication-card>
        <div class="container">
            <x-label>
                <h1>{{ isset($intern) ? 'Editar cadastro' : 'Cadastrar de Estagiário' }}</h1>
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


            <form action="{{ isset($intern) ? route('interns.update', $intern->id) : route('interns.store') }}" method="POST">
                @csrf
                @if(isset($intern))
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
                    <x-label for="birth_date">Data de Nascimento:</x-label>
                    <x-input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $intern->birth_date ?? '') }}" required />
                </div>
                <div>
                    <x-label for="gender">Gênero:</x-label>
                    <select id="gender" name="gender" required>
                        <option value="">Selecione</option>
                        <option value="Masculino" {{ old('gender', $intern->gender ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Feminino" {{ old('gender', $intern->gender ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                    </select>

                </div>
                <div>
                    <x-label for="cpf">CPF:</x-label>
                    <x-input type="text" id="cpf" name="cpf" value="{{ old('cpf', $intern->cpf ?? '') }}" required />
                </div>
                <div>
                    <x-label for="phone">Telefone:</x-label>
                    <x-input type="text" id="phone" name="phone" value="{{ old('phone', $intern->phone ?? '') }}" required />
                </div>
                <div>
                    <x-label for="educational_institution">Instituição de Ensino:</x-label>
                    <x-input type="text" id="educational_institution" name="educational_institution" value="{{ old('educational_institution', $intern->educational_institution ?? '') }}" required />
                </div>
                <div>
                    <x-label for="current_course">Curso:</x-label>
                    <x-input type="text" id="current_course" name="current_course" value="{{ old('current_course', $intern->current_course ?? '') }}" required />
                </div>
                <div>
                    <x-label for="current_period">Semestre atual:</x-label>
                    <x-input type="text" id="current_period" name="current_period" value="{{ old('current_period', $intern->current_period ?? '') }}" required />
                </div>
                <div>
                    <x-label for="zip_code">CEP:</x-label>
                    <x-input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $intern->address->zip_code ?? '') }}" required />
                </div>
                <div>
                    <x-label for="street_address">Rua:</x-label>
                    <x-input type="text" id="street_address" name="street_address" value="{{ old('street_address', $intern->address->street_address ?? '') }}" required />
                </div>
                <div>
                    <x-label for="complement">Complemento:</x-label>
                    <x-input type="text" id="complement" name="complement" value="{{ old('complement', $intern->address->complement ?? '') }}" />
                </div>
                <div>
                    <x-label for="neighborhood">Bairro:</x-label>
                    <x-input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $intern->address->neighborhood ?? '') }}" required />
                </div>
                <div>
                    <x-label for="city">Cidade:</x-label>
                    <x-input type="text" id="city" name="city" value="{{ old('city', $intern->address->city ?? '') }}" required />
                </div>
                <div>
                    <x-label for="state">Estado:</x-label>
                    <x-input type="text" id="state" name="state" value="{{ old('state', $intern->address->state ?? '') }}" required />
                </div>
                <div>
                    <x-label for="number">Numero:</x-label>
                    <x-input type="text" id="number" name="number" value="{{ old('number', $intern->address->number ?? '') }}" required />
                </div>

                <x-button class="mt-3 mb-4" type="submit">
                    {{ isset($intern) ? 'Atualizar' : 'Cadastrar' }}
                </x-button>

            </form>
        </div>
        <script>
            document.getElementById('zip_code').addEventListener('input', function() {
                const cep = this.value.replace(/\D/g, '');
                if (cep.length !== 8) {
                    return;
                }

                fetch('{{ route('address.get-address-by-cep') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-Token': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                cep: cep
                            })
                        })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('street_address').value = data.logradouro || '';
                        document.getElementById('complement').value = data.complemento || '';
                        document.getElementById('neighborhood').value = data.bairro || '';
                        document.getElementById('city').value = data.localidade || '';
                        document.getElementById('state').value = data.uf || '';
                    })
                    .catch(error => {
                        console.error('Erro ao buscar endereço:', error);
                    });
            });
        </script>
    </x-authentication-card>
</x-app-layout>
