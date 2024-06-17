<<<<<<< HEAD:resources/views/vacancyCreate.blade.php
<x-guest-layout>
=======
<!DOCTYPE html>
<html>
<head>
    <title>Create Vacancy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
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
    </style>
</head>
<body>
>>>>>>> dcad7e0968f77d9af26dd22b4b83281dda6ab01b:resources/views/vacancyRecruiterCreate.blade.php
    <div class="container">
        <h1 class="text-center">Create Vacancy</h1>
        
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
                <input type="text" class="form-control" id="name" name="name" maxlength="35" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <select class="form-control" id="model" name="model" required>
                    <option value="presencial">Presencial</option>
                    <option value="hibrido">Híbrido</option>
                    <option value="homeoffice">Home Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addreess_id">Address ID:</label>
                <input type="text" class="form-control" id="addreess_id" name="addreess_id" required>
            </div>

            <div class="form-group">
                <label for="skills">Skills:</label>
                <div id="skills">
                    <div class="skill row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="skills[0][name]" placeholder="Skill Name" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="skills[0][level]" placeholder="Skill Level" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="skills[0][curriculum_id]" placeholder="Curriculum ID" required>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2" onclick="addSkill()">Add Skill</button>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
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
                    <input type="text" class="form-control" name="skills[${skillIndex}][name]" placeholder="Skill Name" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="skills[${skillIndex}][level]" placeholder="Skill Level" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="skills[${skillIndex}][curriculum_id]" placeholder="Curriculum ID" required>
                </div>
            `;
            skillsDiv.appendChild(newSkillDiv);
            skillIndex++;
        }
    </script>
</x-guest-layout>
