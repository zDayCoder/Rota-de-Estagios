@extends('curricula.app') {{-- Se você estiver utilizando um layout padrão --}}

@section('content')
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Roboto", sans-serif
}
</style>

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-container">
                        <h2>Criar Novo Currículo</h2>
                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST">
                            @csrf
                            <!-- Informações Pessoais -->
                            <h3>Informações Pessoais</h3>
                            Endereço: {{ $address->city }} <br>
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="w3-input w3-border">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"  value="{{ $user->email }}"
                                class="w3-input w3-border">
                            <label for="phone">Telefone:</label>
                            <input type="tel" id="phone" name="phone" class="w3-input w3-border">

                            <!-- Resumo -->
                            <h3>Resumo</h3>
                            <label for="summary">Resumo:</label>
                            <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                            <!-- Experiência -->
                            <!-- Experiência -->
                            <h3>Experiência</h3>
                            <div id="experiences">
                                <div class="experience">
                                    <label for="position_1">Posição:</label>
                                    <input type="text" id="position_1" name="positions[]" class="w3-input w3-border">
                                    <label for="location_1">Localização:</label>
                                    <input type="text" id="location_1" name="locations[]" class="w3-input w3-border">
                                </div>
                            </div>
                            <button type="button" id="addExperience">Adicionar Experiência</button>

                            <!-- Habilidades -->
                            <h3>Habilidades</h3>
                            <div id="skills">
                                <div class="skill">
                                    <input type="text" id="skill_1" name="skills[]" class="w3-input w3-border">
                                </div>
                            </div>
                            <button type="button" id="addSkill">Adicionar Habilidade</button>

                            <!-- Idiomas -->
                            <h3>Idiomas</h3>
                            <div id="languages">
                                <div class="language">
                                    <input type="text" id="language_1" name="languages[]" class="w3-input w3-border">
                                </div>
                            </div>
                            <button type="button" id="addLanguage">Adicionar Idioma</button>

                            <!-- Certificações -->
                            <h3>Certificações</h3>
                            <div id="certifications">
                                <div class="certification">
                                    <input type="text" id="certification_1" name="certifications[]"
                                        class="w3-input w3-border">
                                </div>
                            </div>
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

                            <button type="button" id="addCertification">Adicionar Certificação</button>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                let experienceIndex = 1;
                                let skillIndex = 1;
                                let languageIndex = 1;
                                let certificationIndex = 1;

                                // Adicionar Experiência
                                $('#addExperience').click(function() {
                                    experienceIndex++;
                                    $('#experiences').append(
                                        `<div class="experience">
                    <label for="position_${experienceIndex}">Posição:</label>
                    <input type="text" id="position_${experienceIndex}" name="positions[]" class="w3-input w3-border">
                    <label for="location_${experienceIndex}">Localização:</label>
                    <input type="text" id="location_${experienceIndex}" name="locations[]" class="w3-input w3-border">
                </div>`
                                    );
                                });

                                // Adicionar Habilidade
                                $('#addSkill').click(function() {
                                    skillIndex++;
                                    $('#skills').append(
                                        `<div class="skill">
                    <input type="text" id="skill_${skillIndex}" name="skills[]" class="w3-input w3-border">
                </div>`
                                    );
                                });

                                // Adicionar Idioma
                                $('#addLanguage').click(function() {
                                    languageIndex++;
                                    $('#languages').append(
                                        `<div class="language">
                    <input type="text" id="language_${languageIndex}" name="languages[]" class="w3-input w3-border">
                </div>`
                                    );
                                });

                                // Adicionar Certificação
                                $('#addCertification').click(function() {
                                    certificationIndex++;
                                    $('#certifications').append(
                                        `<div class="certification">
                    <input type="text" id="certification_${certificationIndex}" name="certifications[]" class="w3-input w3-border">
                </div>`
                                    );
                                });
                            });
                            </script>

                            <!-- Botão de Envio -->
                            <button type="submit" class="w3-button w3-teal w3-margin-top">Salvar Currículo</button>
                        </form>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">
                <!-- Conteúdo opcional para a coluna direita -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>


</body>

</html>

@endsection