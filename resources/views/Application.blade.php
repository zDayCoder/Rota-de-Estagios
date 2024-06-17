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
        <h1 class="text-center">Minhas Candidaturas</h1>
        
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Nome da vaga</th>
                    <th>Descrição</th>
                    <th>Modelo</th>
                    <th>Status da vaga</th>
                    <th>Data da Candidatura</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($applications as $application)
        <tr>
        <td>{{ $application->id }}</td>
        <td>{{ $companies[$loop->index]->company_name }}</td>
        <td>{{ $vacancies[$loop->index]->name }}</td>
        <td>{{ $vacancies[$loop->index]->description }}</td>
        <td>{{ $vacancies[$loop->index]->model }}</td>
        <td>{{ $vacancies[$loop->index]->status }}</td>
        <td>{{ $application->application_date }}</td>
        <td>
            <form action="{{ url("/application/intern/$application->id/delete") }}" method="DELETE" onsubmit="return confirmDeletion()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Remover</button>
            </form>
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

function confirmDeletion() {
        return confirm('Você tem certeza que deseja apagar esta aplicação?');
    }
        
    </script>
</body>
</html>
