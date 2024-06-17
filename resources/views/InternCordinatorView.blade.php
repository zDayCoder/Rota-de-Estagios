 <x-app-layout>
    <!--ax-dash-coordinator> -->
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

        .table th,
        .table td {
            vertical-align: middle;
        }
        </style>

        <div class="container">
            <h1 class="text-center">Lista de Alunos </h1>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Faculdade</th>
                        <th>Vaga</th>
                        <th>Empresa</th>
                        <th>Data da Candidatura</th>
                        <th>Modelo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interns as $intern)
                    <tr>
                        <td>{{ $intern->id }}</td>
                        <td>{{ $intern->name }}</td>
                        <td>{{ $intern->educational_institution }}</td>
                        <td>{{ $intern->name }}</td>
                        <td>{{ $intern->name }}</td>
                        <td>{{ $intern->application_date }}</td>
                        <td>{{ $intern->model }}</td>
                        <td>{{ $intern->work_contract }}</td>
                        <td>
                            <a href="{{ url("/coordinator/intern/$intern->id/aprove") }}"
                                class="btn btn-success btn-sm">Validar
                                Estágio</a>
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
    <!-- </ax-dash-coordinator-->
</x-app-layout>
