<!DOCTYPE html>
<html>
<head>
    <title>Create Vacancy</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Vacancy</h1>
        
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vacancy.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="company_id">Company ID:</label>
                <input type="text" class="form-control" id="company_id" name="company_id">
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="35">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100">
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary">
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <select class="form-control" id="model" name="model">
                    <option value="presencial">Presencial</option>
                    <option value="hibrido">Híbrido</option>
                    <option value="homeoffice">Home Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="addreess_id">Address ID:</label>
                <input type="text" class="form-control" id="addreess_id" name="addreess_id">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>