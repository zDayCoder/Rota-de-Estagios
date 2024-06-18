<x-app-layout>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Vaga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-bottom: 20px;
        }
        .vacancy {
            margin-bottom: 20px;
        }
        .vacancy h2 {
            margin-top: 0;
        }
        .form-container {
            margin-top: 30px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"], .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .hidden {
            display: none;
        }
        .interns-table tr {
            cursor: pointer;
        }
        .selected {
            background-color: #cce5ff !important; /* Cor de fundo para a linha selecionada */
        }
    </style>
</head>
    <div class="container">
        <!-- Detalhes da Vaga -->
        <div class="vacancy">
            <h2>{{ $vacancy->id }} - {{ $vacancy->name }}</h2>
            <p><strong>Descrição:</strong> {{ $vacancy->description }}</p>
            <p><strong>Salário:</strong> {{ $vacancy->salary }}</p>
            <p><strong>Modelo:</strong> {{ $vacancy->model }}</p>
            <p><strong>Endereço:</strong> Rua Exemplo, 123, Cidade, Estado</p>
        </div>

        <!-- Formulário para Aplicação -->
        <div class="form-container">
            <h3>Candidato a vaga</h3>
            <form action="{{ route('vacancy.finishStore') }}" method="POST">
                @csrf
                <div class="form-group hidden">
                    <label for="company_id">Empresa:</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" value="{{ $vacancy->company_id }}" readonly>
                </div>
                <div class="form-group hidden">
                    <label for="vacancy_id">Vaga Escolhida:</label>
                    <input type="text" class="form-control" id="vacancy_id" name="vacancy_id" value="{{ $vacancy->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="vacancy">Vaga Escolhida:</label>
                    <input type="text" class="form-control" id="vacancy" name="vacancy" value="{{ $vacancy->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="internName">Nome do Estagiário Selecionado:</label>
                    <input type="text" class="form-control" id="internName" name="internName" readonly>
                </div>
                <div class="form-group hidden">
                    <label for="intern_id">ID do Estagiário Selecionado:</label>
                    <input type="text" class="form-control" id="intern_id" name="intern_id" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Encerrar Vaga</button>
            </form>
        </div>

        <!-- Tabela de Estagiários -->
        <div class="interns-table mt-5">
            <h3>Selecione um Estagiário</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Faculdade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interns as $intern)
                        <tr onclick="selectIntern({{ $intern->id }}, '{{ $users[$loop->index]->name }}')">
                            <td>{{ $intern->id }}</td>
                            <td>{{ $users[$loop->index]->name }}</td>
                            <td>{{ $users[$loop->index]->email }}</td>
                            <td>{{ $intern->educational_institution }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function selectIntern(internId, internName) {
            // Remove a classe 'selected' de todas as linhas
            var rows = document.querySelectorAll('.interns-table tbody tr');
            rows.forEach(row => row.classList.remove('selected'));
            
            // Adiciona a classe 'selected' à linha clicada
            var selectedRow = document.querySelector(`tr[onclick="selectIntern(${internId}, '${internName}')"]`);
            selectedRow.classList.add('selected');

            // Atualiza os campos do formulário
            document.getElementById('intern_id').value = internId;
            document.getElementById('internName').value = internName;
            
            alert('Candidato ' + internName + ' selecionado');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </x-app-layout>
