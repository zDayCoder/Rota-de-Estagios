<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h2 class="mt-2 row justify-content-center">Criando Currículo</h2>
    <div class="container-curriculo">
        <div class="w3-row-padding">
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                    <div class="w3-container">
                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                        placeholder="(XX) XXXXX-XXXX">
                                </div>
                            </div>


                            <div class="dados-pessoais p-3">
                                <h3>Resumo</h3>
                                <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                            </div>
                            <div class="dados-pessoais p-3">
                                <div id="experiences"></div>
                                <!-- Experiência -->
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
                                <div id="skills"></div>
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
                                <div id="languages"></div>
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
                                <div id="certifications"></div>
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id="addCertification">
                                    <h3>Certificações</h3>
                                    <button type="button" id="addCertification" class="rounded-circle btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Escolaridade/Formações -->
                            <div class="dados-pessoais p-3">
                                <div id="educations"></div>
                                <div class="d-flex justify-content-between align-items-center conteudo-card" id="addEducation">
                                    <h3>Escolaridade/Formações</h3>
                                    <button type="button" id="addEducation" class="rounded-circle btn-add">
                                        <i class="fas fa-plus"></i>
                                    </button>
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

                            <!-- Botão de Envio -->
                            <div class="submit text-center mt-4">
                                <button type="submit" class="btn btn-light btn-lg mybtn">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div><br>

            </div>

        </div>

        <script>
        var files = document.querySelector('input[name="files"]');

        files.addEventListener("change", function(file) {
            var input = file.target;

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