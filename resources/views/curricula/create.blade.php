@extends('curricula.app') {{-- Se você estiver utilizando um layout padrão --}}

@section('content')
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-container">
                        <h2>Criando Currículo</h2>
                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST">
                            @csrf
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w3-input w3-border">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w3-input w3-border">
                            <label for="phone">Telefone:</label>
                            <input type="tel" id="phone" name="phone" class="w3-input w3-border">

                            <!-- Resumo -->
                            <h3>Resumo</h3>
                            <label for="summary">Resumo:</label>
                            <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>

                            <!-- Experiência -->
                            <h3>Experiência</h3>
                            <div id="experiences"></div>
                            <button type="button" id="addExperience">Adicionar Experiência</button>

                            <!-- Habilidades -->
                            <h3>Habilidades</h3>
                            <div id="skills"></div>
                            <button type="button" id="addSkill">Adicionar Habilidade</button>

                            <!-- Idiomas -->
                            <h3>Idiomas</h3>
                            <div id="languages"></div>
                            <button type="button" id="addLanguage">Adicionar Idioma</button>

                            <!-- Certificações -->
                            <h3>Certificações</h3>
                            <div id="certifications"></div>
                            <button type="button" id="addCertification">Adicionar Certificação</button>

                            <!-- Escolaridade/Formações -->
                            <h3>Escolaridade/Formações</h3>
                            <div id="educations"></div>
                            <button type="button" id="addEducation">Adicionar Formação</button>

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

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                let experienceIndex = 0;
                                let skillIndex = 0;
                                let languageIndex = 0;
                                let certificationIndex = 0;
                                let educationIndex = 0;

                                function removeSection(id) {
                                    $(id).remove();
                                }

                                function updateSkillText(index) {
                                    const skillLevels = ['Iniciante', 'Básico', 'Intermediário', 'Avançado', 'Especialista'];
                                    $(`#skill_level_text_${index}`).text(skillLevels[$(`#skill_level_${index}`).val() - 1]);
                                }

                                function updateLanguageText(index) {
                                    const languageLevels = ['Iniciante', 'Básico', 'Intermediário', 'Avançado', 'Fluente'];
                                    $(`#language_level_text_${index}`).text(languageLevels[$(`#language_level_${index}`).val() - 1]);
                                }

                                function toggleEndDate(checkbox, index) {
                                    if (checkbox.checked) {
                                        $(`#end_date_${index}`).hide();
                                        $(`#end_date_${index}`).disable();
                                    } else {
                                        $(`#end_date_${index}`).show();
                                    }
                                }

                                // Adicionar Experiência
                                $('#addExperience').click(function() {
                                    experienceIndex++;
                                    $('#experiences').append(
                                        `<div class="section" id="experience_${experienceIndex}">
                                            <label for="position_${experienceIndex}">Cargo:</label>
                                            <input type="text" id="position_${experienceIndex}" name="positions[]" class="w3-input w3-border">
                                            <label for="employers_${experienceIndex}">Empregador:</label>
                                            <input type="text" id="employers_${experienceIndex}" name="employers[]" class="w3-input w3-border">
                                            <label for="location_${experienceIndex}">Localização:</label>
                                            <input type="text" id="location_${experienceIndex}" name="locations[]" class="w3-input w3-border">
                                            <label for="start_date_${experienceIndex}">Data de Início:</label>
                                            <input type="date" id="start_date_${experienceIndex}" name="start_dates[]" class="w3-input w3-border">
                                            <label for="end_date_${experienceIndex}">Data de Término:</label>
                                            <input type="date" id="end_date_${experienceIndex}" name="end_dates[]" class="w3-input w3-border">
                                            <label for="currently_working_${experienceIndex}">
                                                <input type="checkbox" id="currently_working_${experienceIndex}" name="currently_working[]" value="1" onclick="toggleEndDate(this, ${experienceIndex})"> Atualmente Trabalhando Aqui
                                            </label>
                                            <label for="description_${experienceIndex}">Descrição:</label>
                                            <textarea id="description_${experienceIndex}" name="descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                                            <button type="button" class="removeButton" data-index="${experienceIndex}" data-section="experience">Remover Experiência</button>
                                        </div>`
                                    );
                                });

                                // Adicionar Habilidade
                                $('#addSkill').click(function() {
                                    skillIndex++;
                                    $('#skills').append(
                                        `<div class="section" id="skill_${skillIndex}">
                                            <label for="skill_${skillIndex}">Habilidade:</label>
                                            <input type="text" id="skill_${skillIndex}" name="skills[]" class="w3-input w3-border">
                                            <label for="skill_level_${skillIndex}">Nível:</label>
                                            <span id="skill_level_text_${skillIndex}">Iniciante</span>
                                            <input type="range" id="skill_level_${skillIndex}" name="skill_levels[]" min="1" max="5" step="1" value="1" class="w3-input w3-border">
                                            <button type="button" class="removeButton" data-index="${skillIndex}" data-section="skill">Remover Habilidade</button>
                                        </div>`
                                    );
                                    $(`#skill_level_${skillIndex}`).on('input', function() {
                                        updateSkillText(skillIndex);
                                    });
                                });

                                // Adicionar Idioma
                                $('#addLanguage').click(function() {
                                    languageIndex++;
                                    $('#languages').append(
                                        `<div class="section" id="language_${languageIndex}">
                                            <label for="language_${languageIndex}">Idioma:</label>
                                            <input type="text" id="language_${languageIndex}" name="languages[]" class="w3-input w3-border">
                                            <label for="language_level_${languageIndex}">Nível:</label>
                                            <span id="language_level_text_${languageIndex}">Iniciante</span>
                                            <input type="range" id="language_level_${languageIndex}" name="language_levels[]" min="1" max="5" step="1" value="1" class="w3-input w3-border">
                                            <button type="button" class="removeButton" data-index="${languageIndex}" data-section="language">Remover Idioma</button>
                                        </div>`
                                    );
                                    $(`#language_level_${languageIndex}`).on('input', function() {
                                        updateLanguageText(languageIndex);
                                    });
                                });

                                // Adicionar Certificação
                                $('#addCertification').click(function() {
                                    certificationIndex++;
                                    $('#certifications').append(
                                        `<div class="section" id="certification_${certificationIndex}">
                                            <label for="certification_${certificationIndex}">Certificação:</label>
                                            <input type="text" id="certification_${certificationIndex}" name="certifications[]" class="w3-input w3-border">
                                            <label for="certification_end_date_${certificationIndex}">Data de Conclusão:</label>
                                            <input type="date" id="certification_end_date_${certificationIndex}" name="certification_end_dates[]" class="w3-input w3-border">
                                            <label for="certification_description_${certificationIndex}">Descrição:</label>
                                            <textarea id="certification_description_${certificationIndex}" name="certification_descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                                            <button type="button" class="removeButton" data-index="${certificationIndex}" data-section="certification">Remover Certificação</button>
                                        </div>`
                                    );
                                });

                                // Adicionar Formação
                                $('#addEducation').click(function() {
                                    educationIndex++;
                                    $('#educations').append(
                                        `<div class="section" id="education_${educationIndex}">
                                            <label for="education_${educationIndex}">Formação:</label>
                                            <input type="text" id="education_${educationIndex}" name="educations[]" class="w3-input w3-border">
                                            <label for="education_start_date_${educationIndex}">Data de Início:</label>
                                            <input type="date" id="education_start_date_${educationIndex}" name="education_start_dates[]" class="w3-input w3-border">
                                            <label for="education_end_date_${educationIndex}">Data de Término:</label>
                                            <input type="date" id="education_end_date_${educationIndex}" name="education_end_dates[]" class="w3-input w3-border">
                                            <button type="button" class="removeButton" data-index="${educationIndex}" data-section="education">Remover Formação</button>
                                        </div>`
                                    );
                                });

                                // Remover Seção
                                $(document).on('click', '.removeButton', function() {
                                    const index = $(this).data('index');
                                    const section = $(this).data('section');
                                    $(`#${section}_${index}`).remove();
                                });
                            });

                            function toggleEndDate(checkbox, index) {
                                if (checkbox.checked) {
                                    $(`#end_date_${index}`).hide();
                                } else {
                                    $(`#end_date_${index}`).show();
                                }
                            }
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
