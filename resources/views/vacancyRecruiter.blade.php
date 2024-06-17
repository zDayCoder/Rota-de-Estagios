<x-app-layout>
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

        .container {
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .mt-3 {
            margin-top: 1rem;
        }
    </style>

    <div class="container">
        <h1 class="text-center">Vacancies List</h1>
        <div class="text-right mb-4">
            <a href="{{ route('vacancy.create') }}" class="btn btn-primary">Create New Vacancy</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Company ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Model</th>
                    <th>Status</th>
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
                        <td>{{ $vacancy->status }}</td>

                        <td>
                            <a href="{{ url("/vacancy/recruiter/$vacancy->id/edit") }}"
                                class="btn btn-warning btn-sm">Editar Vaga</a>
                            <a href="{{ url("/vacancy/recruiter/$vacancy->id/finish") }}"
                                class="btn btn-warning btn-sm">Fechar Vaga</a>
                            <span class="btn-toggle" onclick="toggleSkills({{ $vacancy->id }})">Ver Skills</span>
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
                                    @foreach ($vacancy->vacancy_id as $skill)
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
</x-app-layout>
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
