<x-app-layout>

<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <div class="w3-row-padding">

        <div class="w3-third">
            <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                <div class="w3-container">
                    <h2>Editando Currículo</h2>
                    <!-- Formulário de Edição -->
                    <form id="curriculumForm" action="{{ route('curricula.update', $curriculum->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" value="{{ $curriculum->name }}"
                            class="w3-input w3-border">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $curriculum->email }}"
                            class="w3-input w3-border">
                        <label for="phone">Telefone:</label>
                        <input type="tel" id="phone" name="phone" value="{{ $curriculum->phone }}"
                            class="w3-input w3-border" placeholder="(XX) XXXXX-XXXX">

                        <!-- Resumo -->
                        <h3>Resumo</h3>
                        <label for="summary">Resumo:</label>
                        <textarea id="summary" name="summary" rows="4"
                            class="w3-input w3-border">{{ $curriculum->summary }}</textarea>

                        <!-- Experiência -->
                        <h3>Experiência</h3>
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
                                    <input type="text" class="form-control datepicker" id="start_date_{{ $index }}"
                                        name="start_dates[]" value="{{ $experience->start_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="end_date_{{ $index }}">Data de Término</label>
                                    <input type="text" class="form-control datepicker" id="end_date_{{ $index }}"
                                        name="end_dates[]" value="{{ $experience->end_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="currently_working_{{ $index }}">
                                        <input type="checkbox" id="currently_working_{{ $index }}"
                                            name="currently_working[]" value="1"
                                            {{ $experience->currently_working ? 'checked' : '' }}
                                            onclick="toggleEndDate(this, {{ $index }})"> Atualmente Trabalhando Aqui
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="description_{{ $index }}">Descrição</label>
                                    <textarea id="description_{{ $index }}" name="descriptions[]" rows="2"
                                        class="form-control">{{ $experience->description }}</textarea>
                                </div>
                                <button type="button" class="btn btn-danger removeButton" data-index="{{ $index }}"
                                    data-section="experience">Remover Experiência</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="addExperience" class="btn btn-success">Adicionar Experiência</button>

                        <!-- Habilidades -->
                        <h3>Habilidades</h3>
                        <div id="skills">
                            @foreach ($curriculum->skills as $index => $skill)
                            <div class="section" id="skill_{{ $index }}">
                                <div class="form-group">
                                    <label for="skills_{{ $index }}">Habilidade</label>
                                    <input type="text" class="form-control" id="skills_{{ $index }}" name="skills[]"
                                        value="{{ $skill->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="skill_level_{{ $index }}">Nível</label>
                                    <span id="skill_level_text_{{ $index }}">{{ $skill->level }}</span>
                                    <input type="range" class="form-control" id="skill_level_{{ $index }}"
                                        name="skill_levels[]" min="1" max="5" step="1" value="{{ $skill->level }}">
                                </div>
                                <button type="button" class="btn btn-danger removeButton" data-index="{{ $index }}"
                                    data-section="skill">Remover Habilidade</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="addSkill" class="btn btn-success">Adicionar Habilidade</button>

                        <!-- Idiomas -->
                        <h3>Idiomas</h3>
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
                                <button type="button" class="btn btn-danger removeButton" data-index="{{ $index }}"
                                    data-section="language">Remover Idioma</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="addLanguage" class="btn btn-success">Adicionar Idioma</button>

                        <!-- Certificações -->
                        <h3>Certificações</h3>
                        <div id="certifications">
                            @foreach ($curriculum->certifications as $index => $certification)
                            <div class="section" id="certification_{{ $index }}">
                                <div class="form-group">
                                    <label for="certifications_{{ $index }}">Certificação</label>
                                    <input type="text" class="form-control" id="certifications_{{ $index }}"
                                        name="certifications[]" value="{{ $certification->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="certification_end_date_{{ $index }}">Data de Conclusão</label>
                                    <input type="text" class="form-control datepicker"
                                        id="certification_end_date_{{ $index }}" name="certification_end_dates[]"
                                        value="{{ $certification->end_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="certification_description_{{ $index }}">Descrição</label>
                                    <textarea id="certification_description_{{ $index }}"
                                        name="certification_descriptions[]" rows="2"
                                        class="form-control">{{ $certification->description }}</textarea>
                                </div>
                                <button type="button" class="btn btn-danger removeButton" data-index="{{ $index }}"
                                    data-section="certification">Remover Certificação</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="addCertification" class="btn btn-success">Adicionar
                            Certificação</button>

                        <!-- Escolaridade/Formações -->
                        <h3>Escolaridade/Formações</h3>
                        <div id="educations">
                            @foreach ($curriculum->educations as $index => $education)
                            <div class="section" id="education_{{ $index }}">
                                <div class="form-group">
                                    <label for="educations_{{ $index }}">Formação</label>
                                    <input type="text" class="form-control" id="educations_{{ $index }}"
                                        name="educations[]" value="{{ $education->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="education_start_date_{{ $index }}">Data de Início</label>
                                    <input type="text" class="form-control datepicker"
                                        id="education_start_date_{{ $index }}" name="education_start_dates[]"
                                        value="{{ $education->start_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="education_end_date_{{ $index }}">Data de Término</label>
                                    <input type="text" class="form-control datepicker"
                                        id="education_end_date_{{ $index }}" name="education_end_dates[]"
                                        value="{{ $education->end_date }}">
                                </div>
                                <button type="button" class="btn btn-danger removeButton" data-index="{{ $index }}"
                                    data-section="education">Remover Formação</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="addEducation" class="btn btn-success">Adicionar Formação</button>


                        <!-- Botão de Envio -->
                        <div class="submit">
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
                            <button type="submit">Atualizar</button>
                        </div>

                        <style>
                        .submit>button {
                            --color: #560bad;
                            font-family: inherit;
                            display: inline-block;
                            cursor: pointer;
                            width: 8em;
                            height: 2.6em;
                            line-height: 2.5em;
                            margin: 20px;
                            position: relative;
                            overflow: hidden;
                            border: 2px solid var(--color);
                            transition: color .5s;
                            z-index: 1;
                            font-size: 17px;
                            border-radius: 8px;
                            font-weight: 500;
                            color: var(--color);
                        }

                        .submit>button:before {
                            content: "";
                            position: absolute;
                            z-index: -1;
                            background: var(--color);
                            height: 150px;
                            width: 200px;
                            border-radius: 50%;
                        }

                        .submit>button:hover {
                            color: #fff;
                        }

                        .submit>button:before {
                            top: 100%;
                            left: 100%;
                            transition: all .7s;
                        }

                        .submit>button:hover:before {
                            top: -30px;
                            left: -30px;
                        }

                        .submit>button:active:before {
                            background: #3a0ca3;
                            transition: background 0s;
                        }
                        </style>
                    </form>

                </div>
            </div><br>

        </div>

    </div>

</div>

    </x-app-layout>