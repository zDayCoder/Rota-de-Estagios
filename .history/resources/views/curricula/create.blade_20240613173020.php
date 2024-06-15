<x-app-layout>
    <h2 class="titulo-curriculo">Criando Currículo</h2>
    <div class="container-curriculo">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">

                    <div class="w3-container">

                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST">
                            @csrf
                            <div class="dados-basicos">
                                <div class="row">
                                    <div class="col"></div>
                                <label for="name">Nome:</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="w3-input w3-border">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="w3-input w3-border">
                                <label for="phone">Telefone:</label>
                                <input type="tel" id="phone" name="phone" class="w3-input w3-border"
                                    placeholder="(XX) XXXXX-XXXX">
                                </div>
                            </div>


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

                            <!-- Botão de Envio -->
                            <div class="submit">
                                <button type="submit">Salvar</button>
                            </div>


                        </form>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script src="{{ asset('assets/js/curriculum.js') }}"></script>

</x-app-layout>
