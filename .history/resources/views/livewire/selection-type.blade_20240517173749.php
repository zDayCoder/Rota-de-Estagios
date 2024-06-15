<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<body>
        <div class="card-address">
    <div class="main-content">

        <h1>Cadastro de Endereço</h1>

        <div class="container">
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
    </div>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

</body>

</html>
