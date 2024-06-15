<!DOCTYPE html>
<html>
<head>
    <title>Edit Vacancy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Vacancy</h1>
        
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vacancy.update', $vacancy->vaga_id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usar método PUT para envio do formulário de edição -->

            <div class="form-group">
                <label for="company_id">Company ID:</label>
                <input type="text" class="form-control" id="company_id" name="company_id" value="{{ $vacancy->company_id }}">
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="35" value="{{ $vacancy->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100" value="{{ $vacancy->description }}">
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $vacancy->salary }}">
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <select class="form-control" id="model" name="model">
                    <option value="presencial" {{ $vacancy->model === 'presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="hibrido" {{ $vacancy->model === 'hibrido' ? 'selected' : '' }}>Híbrido</option>
                    <option value="homeoffice" {{ $vacancy->model === 'homeoffice' ? 'selected' : '' }}>Home Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addreess_id">Address ID:</label>
                <input type="text" class="form-control" id="addreess_id" name="addreess_id" value="{{ $vacancy->addreess_id }}">
            </div>

            <div class="form-group">
                <label for="skills">Skills:</label>
                <div id="skills">
                    @foreach ($skills as $index => $skill)
                        <div class="skill">
                            <input type="text" class="form-control" name="skills[{{ $index }}][name]" placeholder="Skill Name" value="{{ $skill->name }}">
                            <input type="text" class="form-control" name="skills[{{ $index }}][level]" placeholder="Skill Level" value="{{ $skill->level }}">
                            <input type="text" class="form-control" name="skills[{{ $index }}][curriculum_id]" placeholder="Curriculum ID" value="{{ $skill->curriculum_id }}">
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" onclick="addSkill()">Add Skill</button>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script>
        let skillIndex = {{ $skills->count() }};
        function addSkill() {
            const skillsDiv = document.getElementById('skills');
            const newSkillDiv = document.createElement('div');
            newSkillDiv.classList.add('skill');
            newSkillDiv.innerHTML = `
                <input type="text" class="form-control" name="skills[${skillIndex}][name]" placeholder="Skill Name">
                <input type="text" class="form-control" name="skills[${skillIndex}][level]" placeholder="Skill Level">
                <input type="text" class="form-control" name="skills[${skillIndex}][curriculum_id]" placeholder="Curriculum ID">
            `;
            skillsDiv.appendChild(newSkillDiv);
            skillIndex++;
        }
    </script>
</body>
</html>