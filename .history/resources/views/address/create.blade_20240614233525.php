<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/address-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereço</title>
</head>

<body>
    <div class="card-address">
        <div class="main-content">
            
            <h1>Cadastro de Endereço</h1>

            <div class="container d-flex">
                <form id="addressForm" action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-3 conteudo">
                            <label for="cep">CEP:</label>
                            <input type="text" id="cep" name="zip_code" required><br><br>
                        </div>
                        <div class="col-7 conteudo">
                            <label for="logradouro">Rua:</label>
                            <input type="text" id="logradouro" name="street_address" required><br><br>
                        </div>
                        <div class="col-2 conteudo">
                            <label for="numero">Número:</label>
                            <input type="text" id="numero" name="number" required><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col conteudo">
                            <label for="complemento">Complemento:</label>
                            <input type="text" id="complemento" name="complement"><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 conteudo">
                            <label for="bairro">Bairro:</label>
                            <input type="text" id="bairro" name="neighborhood" required><br><br>
                        </div>
                        <div class=" col-5 conteudo">
                            <label for="localidade">Cidade:</label>
                            <input type="text" id="localidade" name="city" required><br><br>
                        </div>
                        <div class="col-2 conteudo">
                            <label for="uf">UF:</label>
                            <input type="text" id="uf" name="state" required><br><br>
                        </div>
                    </div>
                  
                    <div class="botao">
                        <button type="submit">Salvar</button>
                    </div>

                </form>
            </div>
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
