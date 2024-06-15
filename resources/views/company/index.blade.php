<!-- resources/views/companies/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
</head>
<body>
    <h1>Companies</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Fancy Name</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Municipal Registration</th>
                <th>State Registration</th>
                <th>Legal Nature</th>
                <th>Branch</th>
                <th>Address ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->fancy_name }}</td>
                    <td>{{ $company->cnpj }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->contact }}</td>
                    <td>{{ $company->municipal_registration }}</td>
                    <td>{{ $company->state_registration }}</td>
                    <td>{{ $company->legal_nature }}</td>
                    <td>{{ $company->branch }}</td>
                    <td>{{ $company->address_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
