<!DOCTYPE html>
<html>
<head>
    <title>Vacancies List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Vacancies List</h1>
        <a href="{{ route('vacancy.create') }}" class="btn btn-primary">Create New Vacancy</a>
        <table class="table table-bordered mt-3">
            <thead>
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
                        <td>{{ $vacancy->addreess_id }}</td>
                        <td>
                         <a href="{{ url("/vacancy/recruiter/$vacancy->id/edit")}}"> Editar Vaga</a>                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Skills List</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Vaga ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->level }}</td>
                        <td>{{ $skill->vacancy_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>