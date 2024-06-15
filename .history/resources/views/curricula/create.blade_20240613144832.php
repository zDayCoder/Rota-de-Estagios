@extends('curricula.app') {{-- Se você estiver utilizando um layout padrão --}}

@section('content')
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/curriculo-stle.css') }}">

<body>

    <div class="container">
        <div class="resume-form">
            <h2>Criando Currículo</h2>
            <form action="{{ route('curricula.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="w3-input w3-border">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="w3-input w3-border">
                </div>
                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="tel" id="phone" name="phone" class="w3-input w3-border" placeholder="(XX) XXXXX-XXXX">
                </div>
                <div class="form-group">
                    <h3>Resumo</h3>
                    <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                </div>
                <!-- Outros campos como experiência, habilidades, idiomas, certificações, educação -->
                
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="form-group submit">
                    <button type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script src="{{ asset('assets/js/curriculum.js') }}"></script>
</body>

</html>

@endsection