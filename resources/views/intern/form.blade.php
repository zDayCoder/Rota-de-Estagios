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
                
                <x-button class="mt-3 mb-4" type="submit">
                    {{ isset($intern) ? 'Atualizar' : 'Cadastrar' }}
                </x-button>

            </form>
        </div>
       
    </x-authentication-card>
</x-app-layout>
