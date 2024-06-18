<!DOCTYPE html>
<html>
<head>
    <title>Lista de Vagas</title>
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
        <h1 class="text-center">Lista de Vagas</h1>
        
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ID da Empresa</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Salário</th>
                    <th>Modelo</th>
                    <th>Ações</th>
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
                        <td>
                            <a href="{{ url("/vacancy/intern/$vacancy->id/apply")}}" class="btn btn-success btn-sm">Aplicar</a>
                            <span class="btn-toggle" onclick="toggleSkills({{$vacancy->id}})">Ver Habilidades</span>
                        </td>
                    </tr>
                    <tr id="skills-{{ $vacancy->id }}" class="skills-row">
                        <td colspan="8">
                            <h4>Lista de Habilidades</h4>
                            <table class="table table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Nível</th>
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
