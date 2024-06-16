<x-app-layout>
<x-authentication-card>

<div class="container">
    <x-label>
        <h1>{{ isset($company->id) ? 'Editar cadastro' : 'Cadastrar da Empresa' }}</h1>
    </x-label>
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
            <x-label for="company_name">Razão Social:</x-label>
            <x-input class="block mt-1 w-full input-styles" type="text" id="company_name" name="company_name" value="{{ old('company_name', $company->company_name ?? '') }}" required/>
        </div>
        <div>
            <x-label for="fancy_name">Nome Fantasia:</x-label>
            <x-input class="block mt-1 w-full input-styles" type="text" id="fancy_name" name="fancy_name" value="{{ old('fancy_name', $company->fancy_name ?? '') }}" required/>
        </div>
        <div>
            <x-label for="cnpj">CNPJ:</x-label>
            <x-input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', $company->cnpj ?? '') }}" required/>
        </div>
        <div>
            <x-label for="email">Email:</x-label>
            <x-input type="email" id="email" name="email" value="{{ old('email', $company->email ?? '') }}" required/>
        </div>
        <div>
            <x-label for="contact">Contato:</x-label>
            <x-input type="text" id="contact" name="contact" value="{{ old('contact', $company->contact ?? '') }}" required/>
        </div>
        <div>
            <x-label for="municipal_registration">Registro Municipal:</x-label>
            <x-input type="text" id="municipal_registration" name="municipal_registration" value="{{ old('municipal_registration', $company->municipal_registration ?? '') }}"/>
        </div>
        <div>
            <x-label for="state_registration">Registro Estadual:</x-label>
            <x-input type="text" id="state_registration" name="state_registration" value="{{ old('state_registration', $company->state_registration ?? '') }}"/>
        </div>
        <div>
            <x-label for="legal_nature">Natureza Jurídica:</x-label>
            <x-input type="text" id="legal_nature" name="legal_nature" value="{{ old('legal_nature', $company->legal_nature ?? '') }}" required/>
        </div>
        <div>
            <x-label for="branch">Seguimento:</x-label>
            <x-input type="text" id="branch" name="branch" value="{{ old('branch', $company->branch ?? '') }}" required/>
        </div>

        <!-- Address fields -->
        <div>
            <x-label for="zip_code">CEP:</x-label>
            <x-input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $company->address->zip_code ?? '') }}" required/>
        </div>
        <div>
            <x-label for="street_address">Logradouro:</x-label>
            <x-input type="text" id="street_address" name="street_address" value="{{ old('street_address', $company->address->street_address ?? '') }}" required/>
        </div>
        <div>
            <x-label for="complement">Complemento:</x-label>
            <x-input type="text" id="complement" name="complement" value="{{ old('complement', $company->address->complement ?? '') }}"/>
        </div>
        <div>
            <x-label for="neighborhood">Bairro:</x-label>
            <x-input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $company->address->neighborhood ?? '') }}" required/>
        </div>
        <div>
            <x-label for="city">Localidade:</x-label>
            <x-input type="text" id="city" name="city" value="{{ old('city', $company->address->city ?? '') }}" required/>
        </div>
        <div>
            <x-label for="state">UF:</x-label>
            <x-input type="text" id="state" name="state" value="{{ old('state', $company->address->state ?? '') }}" required/>
        </div>
        <div>
            <x-label for="number">Número:</x-label>
            <x-input type="text" id="number" name="number" value="{{ old('number', $company->address->number ?? '') }}" required/>
        </div>

        <x-button class="mt-3 mb-4" type="submit">
            {{ isset($company->id) ? 'Atualizar' : 'Cadastrar' }}
        </x-button>
    </form>
    </div>
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
    </x-authentication-card>

   </x-app-layout>
