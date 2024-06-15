<!-- resources/views/companies/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
</head>
<body>
    <h1>Company Details</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <td>{{ $company->id }}</td>
        </tr>
        <tr>
            <th>Company Name</th>
            <td>{{ $company->company_name }}</td>
        </tr>
        <tr>
            <th>Fancy Name</th>
            <td>{{ $company->fancy_name }}</td>
        </tr>
        <tr>
            <th>CNPJ</th>
            <td>{{ $company->cnpj }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $company->email }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{{ $company->contact }}</td>
        </tr>
        <tr>
            <th>Municipal Registration</th>
            <td>{{ $company->municipal_registration }}</td>
        </tr>
        <tr>
            <th>State Registration</th>
            <td>{{ $company->state_registration }}</td>
        </tr>
        <tr>
            <th>Legal Nature</th>
            <td>{{ $company->legal_nature }}</td>
        </tr>
        <tr>
            <th>Branch</th>
            <td>{{ $company->branch }}</td>
        </tr>
        <tr>
            <th>Address ID</th>
            <td>{{ $company->address_id }}</td>
        </tr>
    </table>
    <a href="{{ route('company.index') }}">Back to Companies</a>
</body>
</html>
