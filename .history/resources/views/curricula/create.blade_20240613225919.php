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
                            <div class=" dados-basicos ">
                                <div class="row">
                                    <div class="col-xl-3 image-user" name="files">  id="view_photo">
                                        <div class="img-thumbnail">
                                            <img id='output' style="height:100px; width=100px"></div>
                                            <input type="file" name="files">
                                        </div>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="name">Nome:</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $user->name }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row d-flex">


                                            <div class="col-8">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" name="email"
                                                    value="{{ $user->email }}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone">Telefone:</label>
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    placeholder="(XX) XXXXX-XXXX">
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="dados-pessoais p-3">
                                <h3>Resumo</h3>

                                <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                            </div>
                            <div class="dados-pessoais p-3">
                                <!-- Experiência -->
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addExperience">
                                    <h3>Experiência</h3>

                                    <button type="button" id="addExperience">Adicionar Experiência</button>
                                </div>
                            </div>
                            <div id="experiences"></div>
                            <!-- Habilidades -->

                            <div class="dados-pessoais p-3">

                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addSkill">
                                    <h3>Habilidades</h3>
                                    <button type="button" id="addSkill" class="rounded-circle"><span
                                            class="material-symbols-outlined ">
                                            add
                                        </span>
                                    </button>
                                </div>
                                <div id="skills"></div>

                            </div>
                            <!-- Idiomas -->
                            <div class="dados-pessoais p-3">
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addLanguage">
                                    <h3>Idiomas</h3>

                                    <button type="button" id="addLanguage" class="rounded-circle"><span
                                            class="material-symbols-outlined ">
                                            add
                                        </span></button>
                                </div>
                                <div id="languages"></div>

                            </div>

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
    <script>
        var files = document.querySelector('div[name="files"]');
        
        files.addEventListener("change", function(file){
            var input = file.target;
            
            var reader = new FileReader();
            
            reader.onload = function(){
              var dataURL = reader.result;
              var output = document.getElementById('output');
              output.src = dataURL;
            };
        
            reader.readAsDataURL(input.files[0]);
        });
        </script>
</x-app-layout>
