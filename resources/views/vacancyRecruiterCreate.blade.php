<x-app-layout>
    <style>
    .container {
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .skill {
        margin-bottom: 15px;
    }
    </style>

    <div class="container">
        <h2 class="text-center">Criar Uma Nova Vaga</h2>

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

        <form action="{{ route('vacancy.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="35" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="salary">Salário:</label>
                <input type="text" class="form-control" id="salary" name="salary" required>
            </div>

            <div class="form-group">
                <label for="model">Modelo:</label>
                <select class="form-control" id="model" name="model" required>
                    <option value="presencial">Presencial</option>
                    <option value="hibrido">Híbrido</option>
                    <option value="homeoffice">Home Office</option>
                </select>
            </div>            

            <div class="form-group">
                <label for="skills">Habilidades:</label>
                <div id="skills">
                    <div class="skill row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="skills[0][name]"
                                placeholder="Nome da Habilidade" required>
                        </div>
                        <div class="col-md-6">
                            <label for="skill_level">Nível da Habilidade:</label>
                            <input type="range" class="form-range" id="skill_level" name="skills[0][level]"
                                min="0" value="0" max="10" step="1" required>
                        </div>

                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2" onclick="addSkill()">Adicionar Habilidade</button>
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>

    <script>
    let skillIndex = 1;

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
                    <input type="range" class="form-range" id="skill_level" name="skills[${skillIndex}][level]"
                        min="0" value="0" max="10" step="1" required>
                </div>
            `;
        skillsDiv.appendChild(newSkillDiv);
        skillIndex++;
    }
    </script>
</x-app-layout>