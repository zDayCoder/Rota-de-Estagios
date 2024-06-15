<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($intern) ? 'Edit Intern' : 'Create Intern' }}</title>
</head>
<body>
    <h1>{{ isset($intern) ? 'Edit Intern' : 'Create a New Intern' }}</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ isset($intern) ? route('interns.update', $intern->id) : route('interns.store') }}" method="POST">
        @csrf
        @if(isset($intern))
            @method('PUT')
        @endif

        <div>

            <p>Full Name: {{ Auth::user()->name }}</p>
        </div>
        <div>
            <p>Email: {{ Auth::user()->email }}</p>
        </div>

        <div>
            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $intern->birth_date ?? '') }}" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="{{ old('gender', $intern->gender ?? '') }}" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $intern->cpf ?? '') }}" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $intern->phone ?? '') }}" required>
        </div>
        <div>
            <label for="educational_institution">Educational Institution:</label>
            <input type="text" id="educational_institution" name="educational_institution" value="{{ old('educational_institution', $intern->educational_institution ?? '') }}" required>
        </div>
        <div>
            <label for="current_course">Current Course:</label>
            <input type="text" id="current_course" name="current_course" value="{{ old('current_course', $intern->current_course ?? '') }}" required>
        </div>
        <div>
            <label for="current_period">Current Period:</label>
            <input type="text" id="current_period" name="current_period" value="{{ old('current_period', $intern->current_period ?? '') }}" required>
        </div>
        <div>
            <label for="zip_code">CEP:</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $intern->address->zip_code ?? '') }}" required>
        </div>
        <div>
            <label for="street_address">Street Address:</label>
            <input type="text" id="street_address" name="street_address" value="{{ old('street_address', $intern->address->street_address ?? '') }}" required>
        </div>
        <div>
            <label for="complement">Complement:</label>
            <input type="text" id="complement" name="complement" value="{{ old('complement', $intern->address->complement ?? '') }}">
        </div>
        <div>
            <label for="neighborhood">Neighborhood:</label>
            <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $intern->address->neighborhood ?? '') }}" required>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ old('city', $intern->address->city ?? '') }}" required>
        </div>
        <div>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="{{ old('state', $intern->address->state ?? '') }}" required>
        </div>
        <div>
            <label for="number">Number:</label>
            <input type="text" id="number" name="number" value="{{ old('number', $intern->address->number ?? '') }}" required>
        </div>
        <button type="submit">{{ isset($intern) ? 'Update' : 'Create' }}</button>
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
