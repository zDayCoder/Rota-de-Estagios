<div class="container mt-5">
    <h1 class="text-center">Lista de Vagas</h1>

    @if ($vacancies->isEmpty())
        <h2 class="text-center">Nenhuma Vaga Encontrada</h2>
    @else
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
                            <a href="{{ url("/vacancy/intern/$vacancy->id/apply") }}" class="btn btn-success btn-sm">Aplicar</a>
                            <span class="btn-toggle" onclick="toggleSkills({{ $vacancy->id }})">Ver Skills</span>
                        </td>
                    </tr>
                    <tr id="skills-{{ $vacancy->id }}" class="skills-row" style="display:none;">
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
    @endif
</div>

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
