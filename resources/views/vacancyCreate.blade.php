<!DOCTYPE html>
<html>
<head>
    <title>Create Vacancy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Vacancy</h1>
        
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

        <form action="{{ route('vacancy.store') }}" method="POST">
            @csrf

           
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="35">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100">
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary">
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <select class="form-control" id="model" name="model">
                    <option value="presencial">Presencial</option>
                    <option value="hibrido">Híbrido</option>
                    <option value="homeoffice">Home Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addreess_id">Address ID:</label>
                <input type="text" class="form-control" id="addreess_id" name="addreess_id">
            </div>

            <div class="form-group">
                <label for="skills">Skills:</label>
                <div id="skills">
                    <div class="skill">
                        <input type="text" class="form-control" name="skills[0][name]" placeholder="Skill Name">
                        <input type="text" class="form-control" name="skills[0][level]" placeholder="Skill Level">
                        <input type="text" class="form-control" name="skills[0][curriculum_id]" placeholder="Curriculum ID">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="addSkill()">Add Skill</button>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        let skillIndex = 1;
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
