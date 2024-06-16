<x-app-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h2 class="titulo-curriculo">Criando Currículo</h2>
    <div class="container-curriculo">
        <div class="w3-row-padding">
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                    <div class="w3-container">
                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="dados-basicos">
                                <div class="row">
                                    <div class="col-xl-3 image-user" id="view_photo">
                                        <!-- <div class="img-thumbnail">
                                            <div class="image">
                                                <label for="profile_photo">Adicionar Foto</label>
                                                <img id="profile_photo_preview" style="height:100px; width:100px"
                                                    src="{{ asset('assets/img/default-user.svg') }}"
                                                    alt="Foto de perfil">
                                            </div>
                                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                                style="display: none;">
                                            <div class="zoom">
                                                <div class="minus"></div>
                                                <div class="close"></div>
                                            </div>
                                        </div> -->


                                        <div class="photo-frame"
                                            style="border: 1.5px solid gray; display: inline-block; border-radius: 100%; padding: 4px; position: relative;">
                                            <img id="profile_photo_preview"
                                                src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                                style="object-fit: cover; width: 100%; height: auto; max-width:200px; min-width: 200px; min-height: 200px; border-radius: 100%;"
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
                                <div class="col-md-9 ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="name">Nome:</label>
                                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col-8">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone">Telefone:</label>
                                            <input type="tel" id="phone" name="phone" class="form-control"
                                                placeholder="(XX) XXXXX-XXXX">
                                        </div>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                                <div class="dados-pessoais p-3">
                                    <h3>Resumo</h3>
                                    <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                                </div>
                                <div class="dados-pessoais p-3">
                                    <!-- Experiência -->
                                    <div class="d-flex justify-content-between align-items-center conteudo-card" id="addExperience">
                                        <h3>Experiência</h3>

                                        <button type="button" id="addExperience" class="rounded-circle"><span
                                                class="material-symbols-outlined ">
                                                add
                                            </span></button>
                                    </div>
                                </div>
                                <div id="experiences"></div>
                                <!-- Habilidades -->
                                <div class="dados-pessoais p-3">
                                    <div class="d-flex justify-content-between align-items-center conteudo-card" id="addSkill">
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
                                    <div class="d-flex justify-content-between align-items-center conteudo-card" id="addLanguage">
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
=======
                            <div class="dados-pessoais p-3">
                                <h3>Resumo</h3>
                                <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                            </div>
                            <div class="dados-pessoais p-3">
                                <!-- Experiência -->
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addExperience">
                                    <h3>Experiência</h3>

                                    <button type="button" id="addExperience" class="rounded-circle">
                                        <span class="material-symbols-outlined ">add</span>
                                    </button>
                                </div>
                            </div>
                            <div id="experiences"></div>
                            <!-- Habilidades -->
                            <div class="dados-pessoais p-3">
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addSkill">
                                    <h3>Habilidades</h3>
                                    <button type="button" id="addSkill" class="rounded-circle">
                                        <span class="material-symbols-outlined ">add</span>
                                    </button>
                                </div>
                                <div id="skills"></div>

                            </div>
                            <!-- Idiomas -->
                            <div class="dados-pessoais p-3">
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addLanguage">
                                    <h3>Idiomas</h3>

                                    <button type="button" id="addLanguage" class="rounded-circle">
                                        <span class="material-symbols-outlined ">add</span>
                                    </button>
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
>>>>>>> c5008b488249aa026f9830ece67e15ce88aa4ab2

            </div>

        </div>

<<<<<<< HEAD
    </div>

<<<<<<< HEAD
=======
    </div>
<<<<<<< HEAD
    </x-app-layout>
=======

>>>>>>> db2539a467cf8f7ff198a0d69b6539c6acc65947
    <script>
    var files = document.querySelector('input[name="files"]');
=======
        <script>
        var files = document.querySelector('input[name="files"]');

        files.addEventListener("change", function(file) {
            var input = file.target;
>>>>>>> c5008b488249aa026f9830ece67e15ce88aa4ab2

            var reader = new FileReader();

            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('output');
                output.src = dataURL;
            };

            reader.readAsDataURL(input.files[0]);

        });
        </script>
</x-app-layout>
