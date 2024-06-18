<div class="container mt-5">
    <h1 class="text-center">Lista de Vagas</h1>

    @if ($vacancies->isEmpty())
        <h2 class="text-center">Nenhuma Vaga Encontrada</h2>
    @else
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
                            <a href="{{ url("/vacancy/intern/$vacancy->id/apply") }}" class="btn btn-success btn-sm">Aplicar</a>
                            <span class="btn-toggle" onclick="toggleSkills({{ $vacancy->id }})">Ver Habilidades</span>
                        </td>
                    </tr>
                    <tr id="skills-{{ $vacancy->id }}" class="skills-row" style="display:none;">
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
