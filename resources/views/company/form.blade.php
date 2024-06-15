<!-- resources/views/company/form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($company->id) ? 'Edit Company' : 'Create Company' }}</title>
</head>
<body>
    <h1>{{ isset($company->id) ? 'Edit Company' : 'Create a New Company' }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($company->id) ? route('company.update', $company->id) : route('company.store') }}" method="POST">
        @csrf
        @if(isset($company->id))
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

        <!-- Address fields -->
        <div>
            <label for="zip_code">CEP:</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $company->address->zip_code ?? '') }}" required>
        </div>
        <div>
            <label for="street_address">Logradouro:</label>
            <input type="text" id="street_address" name="street_address" value="{{ old('street_address', $company->address->street_address ?? '') }}" required>
        </div>
        <div>
            <label for="complement">Complemento:</label>
            <input type="text" id="complement" name="complement" value="{{ old('complement', $company->address->complement ?? '') }}">
        </div>
        <div>
            <label for="neighborhood">Bairro:</label>
            <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $company->address->neighborhood ?? '') }}" required>
        </div>
        <div>
            <label for="city">Localidade:</label>
            <input type="text" id="city" name="city" value="{{ old('city', $company->address->city ?? '') }}" required>
        </div>
        <div>
            <label for="state">UF:</label>
            <input type="text" id="state" name="state" value="{{ old('state', $company->address->state ?? '') }}" required>
        </div>
        <div>
            <label for="number">Número:</label>
            <input type="text" id="number" name="number" value="{{ old('number', $company->address->number ?? '') }}" required>
        </div>
        <button type="submit">{{ isset($company->id) ? 'Update' : 'Create' }}</button>
    </form>

    <script>
        document.getElementById('zip_code').addEventListener('input', function() {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) {
                return;
            }

            fetch('{{ route('address.get-address-by-cep') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ cep: cep })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('street_address').value = data.logradouro || '';
                document.getElementById('complement').value = data.complemento || '';
                document.getElementById('neighborhood').value = data.bairro || '';
                document.getElementById('city').value = data.localidade || '';
                document.getElementById('state').value = data.uf || '';
            })
            .catch(error => {
                console.error('Erro ao buscar endereço:', error);
            });
        });
    </script>
</body>
</html>
