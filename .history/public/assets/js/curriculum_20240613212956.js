$(document).ready(function () {
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
            $(`#end_date_${index}`).prop('disabled', true);
        } else {
            $(`#end_date_${index}`).show();
            $(`#end_date_${index}`).prop('disabled', false);
        }
    }

    // Adicionar Experiência
    $('#addExperience').click(function () {
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
                <input type="text" id="start_date_${experienceIndex}" name="start_dates[]" class="w3-input w3-border datepicker">
                <label for="end_date_${experienceIndex}">Data de Término:</label>
                <input type="text" id="end_date_${experienceIndex}" name="end_dates[]" class="w3-input w3-border datepicker">
                <label for="currently_working_${experienceIndex}">
                    <input type="checkbox" id="currently_working_${experienceIndex}" name="currently_working[]" value="1" onclick="toggleEndDate(this, ${experienceIndex})"> Atualmente Trabalhando Aqui
                </label>
                <label for="description_${experienceIndex}">Descrição:</label>
                <textarea id="description_${experienceIndex}" name="descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                <button type="button" class="removeButton" data-index="${experienceIndex}" data-section="experience">Remover Experiência</button>
            </div>`
        );
        $('.datepicker').datepicker({
            dateFormat: 'dd/mm/yy'
        }).inputmask({
            mask: "99/99/9999",
            placeholder: "dd/mm/aaaa",
            showMaskOnHover: false,
            showMaskOnFocus: false
        });
    });

    // Adicionar Habilidade
    $('#addSkill').click(function () {
        skillIndex++;
        let currentIndex = skillIndex; // Captura o valor atual de skillIndex

        $('#skills').append(
            `<div class="section" id="skill_${currentIndex}">
                <label for="skill_${currentIndex}">Habilidade:</label>
                <input type="text" id="skill_${currentIndex}" name="skills[]" class="w3-input w3-border">
                <label for="skill_level_${currentIndex}">Nível:</label>
                <span id="skill_level_text_${currentIndex}">Iniciante</span>
                <input type="range" id="skill_level_${currentIndex}" name="skill_levels[]" min="1" max="5" step="1" value="1" class="w3-input w3-border">
                <button type="button" class="removeButton" data-index="${currentIndex}" data-section="skill">Remover Habilidade</button>
            </div>`
        );

        // Adiciona o evento de input para o novo range
        $(`#skill_level_${currentIndex}`).on('input', function () {
            updateSkillText(currentIndex);
        });
    });

    function updateSkillText(index) {
        // Lógica para atualizar o texto conforme o valor do range
        let skillLevel = $(`#skill_level_${index}`).val();
        let skillText = getSkillLevelText(skillLevel);
        $(`#skill_level_text_${index}`).text(skillText);
    }

    function getSkillLevelText(level) {
        // Função para retornar o texto correspondente ao nível
        switch (level) {
            case '1':
                return 'Iniciante';
            case '2':
                return 'Intermediário';
            case '3':
                return 'Avançado';
            case '4':
                return 'Profissional';
            case '5':
                return 'Especialista';
            default:
                return 'Desconhecido';
        }


        // Adicionar Idioma
        $('#addLanguage').click(function () {
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
            $(`#language_level_${languageIndex}`).on('input', function () {
                updateLanguageText(languageIndex);
            });
        });

        // Adicionar Certificação
        $('#addCertification').click(function () {
            certificationIndex++;
            $('#certifications').append(
                `<div class="section" id="certification_${certificationIndex}">
                <label for="certification_${certificationIndex}">Certificação:</label>
                <input type="text" id="certification_${certificationIndex}" name="certifications[]" class="w3-input w3-border">
                <label for="certification_end_date_${certificationIndex}">Data de Conclusão:</label>
                <input type="text" id="certification_end_date_${certificationIndex}" name="certification_end_dates[]" class="w3-input w3-border datepicker">
                <label for="certification_description_${certificationIndex}">Descrição:</label>
                <textarea id="certification_description_${certificationIndex}" name="certification_descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                <button type="button" class="removeButton" data-index="${certificationIndex}" data-section="certification">Remover Certificação</button>
            </div>`
            );
            $('.datepicker').datepicker({
                dateFormat: 'dd/mm/yy'
            }).inputmask({
                mask: "99/99/9999",
                placeholder: "dd/mm/aaaa",
                showMaskOnHover: false,
                showMaskOnFocus: false
            });
        });

        // Adicionar Formação
        $('#addEducation').click(function () {
            educationIndex++;
            $('#educations').append(
                `<div class="section" id="education_${educationIndex}">
                <label for="education_${educationIndex}">Formação:</label>
                <input type="text" id="education_${educationIndex}" name="educations[]" class="w3-input w3-border">
                <label for="education_start_date_${educationIndex}">Data de Início:</label>
                <input type="text" id="education_start_date_${educationIndex}" name="education_start_dates[]" class="w3-input w3-border datepicker">
                <label for="education_end_date_${educationIndex}">Data de Término:</label>
                <input type="text" id="education_end_date_${educationIndex}" name="education_end_dates[]" class="w3-input w3-border datepicker">
                <button type="button" class="removeButton" data-index="${educationIndex}" data-section="education">Remover Formação</button>
            </div>`
            );
            $('.datepicker').datepicker({
                dateFormat: 'dd/mm/yy'
            }).inputmask({
                mask: "99/99/9999",
                placeholder: "dd/mm/aaaa",
                showMaskOnHover: false,
                showMaskOnFocus: false
            });
        });

        // Remover Seção
        $(document).on('click', '.removeButton', function () {
            const index = $(this).data('index');
            const section = $(this).data('section');
            $(`#${section}_${index}`).remove();
        });

        function toggleEndDate(checkbox, index) {
            if (checkbox.checked) {
                $(`#end_date_${index}`).hide();
                $(`#end_date_${index}`).prop('disabled', true);
            } else {
                $(`#end_date_${index}`).show();
                $(`#end_date_${index}`).prop('disabled', false);
            }
        }

        // Inicializar datepicker para campos de data já existentes
        $('.datepicker').datepicker({
            dateFormat: 'dd/mm/yy'
        }).inputmask({
            mask: "99/99/9999",
            placeholder: "dd/mm/aaaa",
            showMaskOnHover: false,
            showMaskOnFocus: false
        });

        // Adicionar máscara ao campo de telefone
        $('#phone').inputmask({
            mask: "(99) 99999-9999",
            placeholder: " ",
            showMaskOnHover: false,
            showMaskOnFocus: false
        });
    });