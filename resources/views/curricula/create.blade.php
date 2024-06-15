@extends('curricula.app')

@section('content')

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                    <div class="w3-container">
                        <h2>Criando Currículo</h2>
                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST">
                            @csrf
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="w3-input w3-border">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                class="w3-input w3-border">
                            <label for="phone">Telefone:</label>
                            <input type="tel" id="phone" name="phone" class="w3-input w3-border"
                                placeholder="(XX) XXXXX-XXXX">

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
                                <button type="submit">Salvar</button>
                            </div>

                            <style>
                            .submit > button {
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

                            .submit > button:before {
                                content: "";
                                position: absolute;
                                z-index: -1;
                                background: var(--color);
                                height: 150px;
                                width: 200px;
                                border-radius: 50%;
                            }

                            .submit > button:hover {
                                color: #fff;
                            }

                            .submit > button:before {
                                top: 100%;
                                left: 100%;
                                transition: all .7s;
                            }

                            .submit > button:hover:before {
                                top: -30px;
                                left: -30px;
                            }

                            .submit > button:active:before {
                                background: #3a0ca3;
                                transition: background 0s;
                            }
                            </style>
                        </form>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

@endsection