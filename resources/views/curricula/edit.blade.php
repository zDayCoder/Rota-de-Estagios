<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h2 class="mt-2 row justify-content-center">Editando Currículo</h2>
    <div class="container-curriculo">
        <div class="w3-row-padding">
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                    <div class="w3-container">
                        <!-- Formulário de Edição -->
                        <form id="curriculumForm" action="{{ route('curricula.update', $curriculum->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-md-3 image-user" id="view_photo">
                                    <div class="photo-frame"
                                        style="border: 1.5px solid gray; display: inline-block; border-radius: 100%; padding: 4px; position: relative;">
                                        <img id="profile_photo_preview"
                                            src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                            style="object-fit: cover; width: 100%; height: auto; max-width:200px;max-height:200px; min-width: 200px; min-height: 200px; border-radius: 100%;"
                                            alt="Avatar"
                                            onerror="this.onerror=null; this.src='{{ asset('assets/img/default-user.svg') }}';">
                                        <button type="button"
                                            onclick="document.getElementById('profile_photo').click();"
                                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); padding: 10px; background-color: rgba(0, 0, 0, 0.6); color: white; border: none; border-radius: 50%; cursor: pointer;">
                                            <i class="fas fa-camera"></i>
                                        </button>
                                    </div>
                                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                        style="display: none;">
                                    <script>
                                    document.getElementById('profile_photo').addEventListener('change', function() {
                                        const [file] = this.files;
                                        if (file) {
                                            document.getElementById('profile_photo_preview').src = URL
                                                .createObjectURL(file);
                                        }
                                    });

                                    document.querySelector('.upload-label').addEventListener('click', function() {
                                        document.getElementById('profile_photo').click();
                                    });
                                    </script>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-8">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-8">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-4">
                                    <label for="phone">Telefone:</label>
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        placeholder="(XX) XXXXX-XXXX" value="{{ $curriculum->phone }}">
                                </div>
                            </div>

                            <!-- Resumo -->
                            <div class="dados-pessoais p-3">
                                <h3>Resumo</h3>
                                <textarea id="summary" name="summary" rows="4"
                                    class="w3-input w3-border">{{ $curriculum->summary }}</textarea>
                            </div>

                            <!-- Experiência -->
                            <div class="dados-pessoais p-3">
                                <div id="experiences">
                                    @foreach ($curriculum->experiences as $index => $experience)
                                    <div class="section" id="experience_{{ $index }}">
                                        <div class="form-group">
                                            <label for="positions_{{ $index }}">Posição</label>
                                            <input type="text" class="form-control" id="positions_{{ $index }}"
                                                name="positions[]" value="{{ $experience->position }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="employers_{{ $index }}">Empregador</label>
                                            <input type="text" class="form-control" id="employers_{{ $index }}"
                                                name="employers[]" value="{{ $experience->employer }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="location_{{ $index }}">Localização</label>
                                            <input type="text" class="form-control" id="location_{{ $index }}"
                                                name="locations[]" value="{{ $experience->location }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date_{{ $index }}">Data de Início</label>
                                            <input type="text" class="form-control datepicker"
                                                id="start_date_{{ $index }}" name="start_dates[]"
                                                value="{{ $experience->start_date }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date_{{ $index }}">Data de Término</label>
                                            <input type="text" class="form-control datepicker"
                                                id="end_date_{{ $index }}" name="end_dates[]"
                                                value="{{ $experience->end_date }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="currently_working_{{ $index }}">
                                                <input type="checkbox" id="currently_working_{{ $index }}"
                                                    name="currently_working[]" value="1"
                                                    {{ $experience->is_current ? 'checked' : '' }}
                                                    onclick="toggleEndDate(this, {{ $index }})"> Atualmente Trabalhando
                                                Aqui
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_{{ $index }}">Descrição</label>
                                            <textarea id="description_{{ $index }}" name="descriptions[]" rows="2"
                                                class="form-control">{{ $experience->description }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger removeButton text-white"
                                            data-index="{{ $index }}" data-section="experience">Remover Experiência</button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addExperience">
                                    <h3>Experiência</h3>
                                    <button type="button" id="addExperience" class="rounded-circle btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Habilidades -->
                            <div class="dados-pessoais p-3">
                                <div id="skills">
                                    @foreach ($curriculum->skills as $index => $skill)
                                    <div class="section" id="skill_{{ $index }}">
                                        <div class="form-group">
                                            <label for="skills_{{ $index }}">Habilidade</label>
                                            <input type="text" class="form-control" id="skills_{{ $index }}"
                                                name="skills[]" value="{{ $skill->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="skill_level_{{ $index }}">Nível</label>
                                            <span id="skill_level_text_{{ $index }}">{{ $skill->level }}</span>
                                            <input type="range" class="form-control" id="skill_level_{{ $index }}"
                                                name="skill_levels[]" min="1" max="5" step="1"
                                                value="{{ $skill->level }}">
                                        </div>
                                        <button type="button" class="btn btn-danger removeButton text-white"
                                            data-index="{{ $index }}" data-section="skill">Remover Habilidade</button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addSkill">
                                    <h3>Habilidades</h3>
                                    <button type="button" id="addSkill" class="rounded-circle btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Idiomas -->
                            <div class="dados-pessoais p-3">
                                <div id="languages">
                                    @foreach ($curriculum->languages as $index => $language)
                                    <div class="section" id="language_{{ $index }}">
                                        <div class="form-group">
                                            <label for="languages_{{ $index }}">Idioma</label>
                                            <input type="text" class="form-control" id="languages_{{ $index }}"
                                                name="languages[]" value="{{ $language->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="language_level_{{ $index }}">Nível</label>
                                            <span id="language_level_text_{{ $index }}">{{ $language->level }}</span>
                                            <input type="range" class="form-control" id="language_level_{{ $index }}"
                                                name="language_levels[]" min="1" max="5" step="1"
                                                value="{{ $language->level }}">
                                        </div>
                                        <button type="button" class="btn btn-danger removeButton text-white"
                                            data-index="{{ $index }}" data-section="language">Remover Idioma</button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addLanguage">
                                    <h3>Idiomas</h3>
                                    <button type="button" id="addLanguage" class="rounded-circle btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>





                           <!-- Certificações -->
<div class="dados-pessoais p-3">
    <div id="certifications">
        @foreach ($curriculum->certifications as $index => $certification)
        <div class="section" id="certification_{{ $index }}">
            <div class="form-group">
                <label for="certification_{{ $index }}">Certificação:</label>
                <input type="text" class="form-control" id="certification_{{ $index }}" name="certifications[]" value="{{ $certification->name }}">
            </div>
            <div class="form-group">
                <label for="certification_end_date_{{ $index }}">Data de Conclusão:</label>
                <input type="text" class="form-control datepicker" id="certification_end_date_{{ $index }}" name="certification_end_dates[]" value="{{ $certification->end_date }}">
            </div>
            <div class="form-group">
                <label for="certification_description_{{ $index }}">Descrição:</label>
                <textarea id="certification_description_{{ $index }}" name="certification_descriptions[]" rows="2" class="form-control">{{ $certification->description }}</textarea>
            </div>
            <button type="button" class="btn btn-danger removeButton text-white" data-index="{{ $index }}" data-section="certification">Remover Certificação</button>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between align-items-center conteudo-card">
        <h3>Certificações</h3>
        <button type="button" id="addCertification" class="rounded-circle btn-add">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>

<!-- Formações -->
<div class="dados-pessoais p-3">
    <div id="educations">
        @foreach ($curriculum->educations as $index => $education)
        <div class="section" id="education_{{ $index }}">
            <div class="form-group">
                <label for="education_{{ $index }}">Formação:</label>
                <input type="text" class="form-control" id="education_{{ $index }}" name="educations[]" value="{{ $education->name }}">
            </div>
            <div class="form-group">
                <label for="education_start_date_{{ $index }}">Data de Início:</label>
                <input type="text" class="form-control datepicker" id="education_start_date_{{ $index }}" name="education_start_dates[]" value="{{ $education->start_date }}">
            </div>
            <div class="form-group">
                <label for="education_end_date_{{ $index }}">Data de Término:</label>
                <input type="text" class="form-control datepicker" id="education_end_date_{{ $index }}" name="education_end_dates[]" value="{{ $education->end_date }}">
            </div>
            <button type="button" class="btn btn-danger removeButton text-white" data-index="{{ $index }}" data-section="education">Remover Formação</button>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between align-items-center conteudo-card">
        <h3>Formações</h3>
        <button type="button" id="addEducation" class="rounded-circle btn-add">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>




                            <!-- Botão de Envio -->
                            <div class="submit text-center mt-4">
                                <button type="submit" class="btn btn-light btn-lg mybtn">Atualizar</button>
                            </div>
                        </form>
                        <!-- Fim do Formulário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
.mybtn {
    border: 2px solid #a71111 !important;
}

.mybtn:hover {
    border: 1px solid #790c0c88 !important;
    background-color: #eee;
}

.btn-add {
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #a71111;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-add:hover {
    background-color: #790c0c;
}

.btn-lg {
    padding: 10px 20px;
    font-size: 1.25rem;
    border-radius: 5px;
}
</style>