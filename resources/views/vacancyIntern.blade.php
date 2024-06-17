<!DOCTYPE html>
<html>
<head>
    <title>Vacancies List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .skills-row {
            display: none;
        }
        .btn-toggle {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
        .btn-toggle:hover {
            text-decoration: none;
        }
        .table {
            margin-top: 20px;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Vacancies List</h1>
        
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Company ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Model</th>
                    <th>Address ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                    <tr>
                        <td>{{ $vacancy->id }}</td>
                        <td>{{ $vacancy->company_id }}</td>
                        <td>{{ $vacancy->name }}</td>
                        <td>{{ $vacancy->description }}</td>
                        <td>{{ $vacancy->salary }}</td>
                        <td>{{ $vacancy->model }}</td>
                        <td>{{ $vacancy->address_id }}</td>
                        <td>
                            <a href="{{ url("/vacancy/intern/$vacancy->id/apply")}}" class="btn btn-success btn-sm">Aplicar</a>
                            <span class="btn-toggle" onclick="toggleSkills({{$vacancy->id}})">Ver Skills</span>
                        </td>
                    </tr>
                    <tr id="skills-{{ $vacancy->id }}" class="skills-row">
                        <td colspan="8">
                            <h4>Skills List</h4>
                            <table class="table table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills->where('vacancy_id', $vacancy->id) as $skill)
                                        <tr>
                                            <td>{{ $skill->id }}</td>
                                            <td>{{ $skill->name }}</td>
                                            <td>{{ $skill->level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSkills(vacancyId) {
            var skillsRow = document.getElementById('skills-' + vacancyId);
            if (skillsRow.style.display === 'none' || skillsRow.style.display === '') {
                skillsRow.style.display = 'table-row';
            } else {
                skillsRow.style.display = 'none';
            }
        }
    </script>
</body>
</html>
