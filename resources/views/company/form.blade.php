<!-- resources/views/companies/form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($company) ? 'Edit Company' : 'Create Company' }}</title>
</head>
<body>
    <h1>{{ isset($company) ? 'Edit Company' : 'Create a New Company' }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($company) ? route('company.update', $company->id) : route('company.store') }}" method="POST">
        @csrf
        @if(isset($company))
            @method('PUT')
        @endif
        <div>
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $company->company_name ?? '') }}" required>
        </div>
        <div>
            <label for="fancy_name">Fancy Name:</label>
            <input type="text" id="fancy_name" name="fancy_name" value="{{ old('fancy_name', $company->fancy_name ?? '') }}" required>
        </div>
        <div>
            <label for="cnpj">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', $company->cnpj ?? '') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $company->email ?? '') }}" required>
        </div>
        <div>
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $company->contact ?? '') }}" required>
        </div>
        <div>
            <label for="municipal_registration">Municipal Registration:</label>
            <input type="text" id="municipal_registration" name="municipal_registration" value="{{ old('municipal_registration', $company->municipal_registration ?? '') }}">
        </div>
        <div>
            <label for="state_registration">State Registration:</label>
            <input type="text" id="state_registration" name="state_registration" value="{{ old('state_registration', $company->state_registration ?? '') }}">
        </div>
        <div>
            <label for="legal_nature">Legal Nature:</label>
            <input type="text" id="legal_nature" name="legal_nature" value="{{ old('legal_nature', $company->legal_nature ?? '') }}" required>
        </div>
        <div>
            <label for="branch">Branch:</label>
            <input type="text" id="branch" name="branch" value="{{ old('branch', $company->branch ?? '') }}" required>
        </div>
        <div>
            <label for="address_id">Address ID:</label>
            <input type="text" id="address_id" name="address_id" value="{{ old('address_id', $company->address_id ?? '') }}" required>
        </div>
        <button type="submit">{{ isset($company) ? 'Update' : 'Create' }}</button>
    </form>
</body>
</html>
