<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-bottom: 20px;
        }
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .skill {
            margin-bottom: 15px;
        }
        .level-bar {
            height: 100%;
            background-color: #ddd;
            position: relative;
        }
        .level {
            height: 100%;
            background-color: #007bff;
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
    <div class="container">
        <h1 class="text-center">Editar Vaga</h1>
        
        <!-- Exibir Erros de Validação -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vacancy.update', $vacancy->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usar método PUT para envio do formulário de edição -->

            <div class="form-group">
                <label for="company_id">ID da Empresa:</label>
                <input type="text" class="form-control" id="company_id" name="company_id" value="{{ $vacancy->company_id }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="35" value="{{ $vacancy->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100" value="{{ $vacancy->description }}" required>
            </div>

            <div class="form-group">
                <label for="salary">Salário:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $vacancy->salary }}" required>
            </div>

            <div class="form-group">
                <label for="model">Modelo:</label>
                <select class="form-control" id="model" name="model" required>
                    <option value="presencial" {{ $vacancy->model === 'presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="hibrido" {{ $vacancy->model === 'hibrido' ? 'selected' : '' }}>Híbrido</option>
                    <option value="homeoffice" {{ $vacancy->model === 'homeoffice' ? 'selected' : '' }}>Home Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Aberta" {{ $vacancy->status === 'Aberta' ? 'selected' : '' }}>Aberta</option>
                    <option value="Fechada" {{ $vacancy->status === 'Fechada' ? 'selected' : '' }}>Fechada</option>
                    <option value="Cancelada" {{ $vacancy->status === 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="skills">Habilidades:</label>
                <div id="skills">
                    @foreach ($skills as $index => $skill)
                        <div class="skill row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="skills[{{ $index }}][name]" placeholder="Nome da Habilidade" value="{{ $skill->name }}" required>
                            </div>
                            <div class="col-md-6">
                            <label for="skill_level">Nível da Habilidade:</label>
                            <input type="range" class="form-range" id="skill_level" name="skills[{{ $index }}][name]" value="{{ $skill->level }}"
                                min="0" value="0" max="10" step="1" required>
                        </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary mt-2" onclick="addSkill()">Adicionar Habilidade</button>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

    <script>
        let skillIndex = {{ $skills->count() }};
        function addSkill() {
            const skillsDiv = document.getElementById('skills');
            const newSkillDiv = document.createElement('div');
            newSkillDiv.classList.add('skill', 'row');
            newSkillDiv.innerHTML = `
                <div class="col-md-4">
                    <input type="text" class="form-control" name="skills[${skillIndex}][name]" placeholder="Nome da Habilidade" required>
                </div>
                    <div class="col-md-6">
                            <label for="skill_level">Nível da Habilidade:</label>
                            <input type="range" class="form-range" id="skill_level" name="skills[${skillIndex}][name]"
                                min="0" value="0" max="10" step="1" required>
                        </div>
            `;
            skillsDiv.appendChild(newSkillDiv);
            skillIndex++;
        }
    </script>
</x-app-layout>