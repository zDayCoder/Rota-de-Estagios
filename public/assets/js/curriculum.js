$.datepicker.regional['pt-BR'] = {
    closeText: 'Fechar',
    prevText: 'Anterior',
    nextText: 'Próximo',
    currentText: 'Hoje',
    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ],
    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
    ],
    dayNames: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
    dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['pt-BR']);

function toggleEndDate(radio, index) {
    if (radio.value == "1") {
        $(`#label_end_date_${index}`).hide();
        $(`#end_date_${index}`).hide().val('');
    } else {
        $(`#label_end_date_${index}`).show();
        $(`#end_date_${index}`).show();
    }
}


// Função para inicializar a visibilidade correta ao carregar a página
function initializeEndDate(index) {
    toggleEndDate(index);
}

// Inicializa todos os campos de data de término no carregamento da página
$(document).ready(function() {
    $('input[name^="currently_working_"]').each(function() {
        const index = $(this).attr('name').match(/\d+/)[0];
        initializeEndDate(index);
    });
});
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
                <input type="text" autocomplete="off" id="start_date_${experienceIndex}" name="start_dates[]" class="w3-input w3-border datepicker">
                <label id="label_end_date_${experienceIndex}" for="end_date_${experienceIndex}">Data de Término:</label>
                <input type="text" autocomplete="off" id="end_date_${experienceIndex}" name="end_dates[]" class="w3-input w3-border datepicker">
                <label>Atualmente Trabalhando Aqui:</label><br>
                <input type="radio" id="currently_working_no_${experienceIndex}" name="currently_working_${experienceIndex}" value="0" onclick="toggleEndDate(this, ${experienceIndex}) " checked>
                <label for="currently_working_no_${experienceIndex}">Não</label>
                <input type="radio" id="currently_working_yes_${experienceIndex}" name="currently_working_${experienceIndex}" value="1" onclick="toggleEndDate(this, ${experienceIndex})">
                <label for="currently_working_yes_${experienceIndex}">Sim</label><br>
                <label for="description_${experienceIndex}">Descrição:</label>
                <textarea id="description_${experienceIndex}" name="descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                <button type="button" class="removeButton rounded-full" data-index="${experienceIndex}" data-section="experience"><span class="material-symbols-outlined">delete</span></button></div>`
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
    $('#addSkill').click(function() {
        skillIndex++;
        $('#skills').append(
            `<div class="section" id="skill_${skillIndex}">
                <label for="skill_${skillIndex}">Habilidade:</label>
                <input type="text" id="skill_${skillIndex}" name="skills[]" class="w3-input w3-border">
                <label for="skill_level_${skillIndex}">Nível:</label>
                <span id="skill_level_text_${skillIndex}">Iniciante</span><br>
                <input type="range" id="skill_level_${skillIndex}" name="skill_levels[]" min="1" max="5" step="1" value="1" class="w3-input w3-border">
                <button type="button" class="removeButton rounded-full" data-index="${skillIndex}" data-section="skill"><span class="material-symbols-outlined">delete</span></button></div>`
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
                <span id="language_level_text_${languageIndex}">Iniciante</span><br>
                <input type="range" id="language_level_${languageIndex}" name="language_levels[]" min="1" max="5" step="1" value="1" class="w3-input w3-border">
                <button type="button" class="removeButton rounded-full" data-index="${languageIndex}" data-section="language"><span class="material-symbols-outlined">delete</span></button></div>`
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
                <input type="text" autocomplete="off" id="certification_end_date_${certificationIndex}" name="certification_end_dates[]" class="w3-input w3-border datepicker">
                <label for="certification_description_${certificationIndex}">Descrição:</label>
                <textarea id="certification_description_${certificationIndex}" name="certification_descriptions[]" rows="2" class="w3-input w3-border"></textarea>
                <button type="button" class="removeButton rounded-full" data-index="${certificationIndex}" data-section="certification"><span class="material-symbols-outlined">delete</span></button></div>
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
    $('#addEducation').click(function() {
        educationIndex++;
        $('#educations').append(
            `<div class="section" id="education_${educationIndex}">
                <label for="education_${educationIndex}">Formação:</label>
                <input type="text" id="education_${educationIndex}" name="educations[]" class="w3-input w3-border">
                <label for="education_start_date_${educationIndex}">Data de Início:</label>
                <input type="text" autocomplete="off" id="education_start_date_${educationIndex}" name="education_start_dates[]" class="w3-input w3-border datepicker">
                <label for="education_end_date_${educationIndex}">Data de Término:</label>
                <input type="text" autocomplete="off" id="education_end_date_${educationIndex}" name="education_end_dates[]" class="w3-input w3-border datepicker">
                <button type="button" class="removeButton rounded-full" data-index="${educationIndex}" data-section="education"><span class="material-symbols-outlined">delete</span></button></div>
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
    $(document).on('click', '.removeButton', function() {
        const index = $(this).data('index');
        const section = $(this).data('section');
        $(`#${section}_${index}`).remove();
    });

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