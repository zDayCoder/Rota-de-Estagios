<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
</head>
<body>
    <h1>Empresas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>Contato</th>
                <th>Registro Municipal</th>
                <th>Registro Estadual</th>
                <th>Natureza Jurídica</th>
                <th>Seguimento</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
