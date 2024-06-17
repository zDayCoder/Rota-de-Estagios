<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Vaga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Detalhes da Vaga -->
        <div class="vacancy">
            <h2 id="vacancy_id" name= "vacancy_id">{{ $vacancy->id }} </h2><h2>{{ $vacancy->name}} </h2>
            <p><strong>Descrição:</strong> {{ $vacancy->description }}</p>
            <p><strong>Salário:</strong> {{ $vacancy->salary }}</p>
            <p><strong>Modelo:</strong> {{ $vacancy->model }}</p>
            <p><strong>Endereço:</strong> Rua Exemplo, 123, Cidade, Estado</p>
            <h3>Habilidades Requeridas:</h3>
            <ul>
                @foreach ($skills as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Formulário para Aplicação -->
        <div class="form-container">
            <h3>Aplicar para esta Vaga</h3>
            <form action="{{ route('vacancy.applyStore') }}" method="POST">
                @csrf
                <div class="form-group hidden">
                    <label for="company_id">Empresa:</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" value="{{ $vacancy->company_id }}" readonly >
                </div>
                <div class="form-group hidden">
                    <label for="vacancy_id">Vaga Escolhida:</label>
                    <input type="text" class="form-control" id="vacancy_id" name="vacancy_id" value="{{ $vacancy->id }}" readonly >
                </div>
                <div class="form-group">
                    <label for="vacancy">Vaga Escolhida:</label>
                    <input type="text" class="form-control" id="vacancy" name="vacancy" value="{{ $vacancy->name }}" readonly >
                </div>
                
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="university">Faculdade:</label>
                    <input type="text" class="form-control" id="university" name="university" required>
                </div>
                <button type="submit" class="btn btn-primary">Aplicar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
