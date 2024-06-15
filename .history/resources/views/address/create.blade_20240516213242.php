<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/address-style.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
</head>

<body>
    <div class="card">


            <h1>Cadastro de Endereço</h1>

            <form id="addressForm" action="{{ route('address.store') }}" method="POST">
                @csrf
                <div class="conteudo">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="zip_code" required><br><br>
                </div>
                <div class="conteudo">
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" id="logradouro" name="street_address" required><br><br>
                </div>
                <div class="conteudo">
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complement"><br><br>
                </div>
                <div class="conteudo">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="neighborhood" required><br><br>
                </div>
                <div class="conteudo">
                    <label for="localidade">Localidade:</label>
                    <input type="text" id="localidade" name="city" required><br><br>
                </div>
                <div class="conteudo">
                    <label for="uf">UF:</label>
                    <input type="text" id="uf" name="state" required><br><br>
                </div>
                <div class="conteudo">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="number" required><br><br>
                </div>
                <div class="botao">
                    <button type="submit">Salvar</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        document.getElementById('cep').addEventListener('input', function() {
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
                    body: JSON.stringify({
                        cep: cep
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('complemento').value = data.complemento || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('localidade').value = data.localidade || '';
                    document.getElementById('uf').value = data.uf || '';
                })
                .catch(error => {
                    console.error('Erro ao buscar endereço:', error);
                });
        });
    </script>
</body>

</html>
