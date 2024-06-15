<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Details</title>
</head>
<body>
    <h1>Intern Details</h1>

    <div>
        <strong>Full Name:</strong>
        <p>{{ $intern->full_name }}</p>
    </div>
    <div>
        <strong>Email:</strong>
        <p>{{ $intern->email }}</p>
    </div>
    <div>
        <strong>Birth Date:</strong>
        <p>{{ $intern->birth_date }}</p>
    </div>
    <div>
        <strong>Gender:</strong>
        <p>{{ $intern->gender }}</p>
    </div>
    <div>
        <strong>CPF:</strong>
        <p>{{ $intern->cpf }}</p>
    </div>
    <div>
        <strong>Phone:</strong>
        <p>{{ $intern->phone }}</p>
    </div>
    <div>
        <strong>Educational Institution:</strong>
        <p>{{ $intern->educational_institution }}</p>
    </div>
    <div>
        <strong>Current Course:</strong>
        <p>{{ $intern->current_course }}</p>
    </div>
    <div>
        <strong>Current Semester:</strong>
        <p>{{ $intern->current_semester }}</p>
    </div>
    <div>
        <strong>Address ID:</strong>
        <p>{{ $intern->address_id }}</p>
    </div>

    <a href="{{ route('interns.edit', $intern->id) }}">Edit</a>
    <a href="{{ route('interns.index') }}">Back to list</a>
</body>
</html>
