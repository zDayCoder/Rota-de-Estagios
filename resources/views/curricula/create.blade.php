@extends('curricula.app')


@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Adicionar Currículo</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('curricula.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h2>Informações Pessoais</h2>
                    <label for="full_name">Nome Completo:</label><br>
                    <input type="text" name="full_name" id="full_name" class="form-control" required><br><br>
                    <label for="address">Endereço:</label><br>
                    <input type="text" name="address" id="address" maxlength="9" class="form-control" required><br><br>
                    <label for="cep">CEP:</label><br>
                    <input type="text" name="cep" id="cep" class="form-control" required><br><br>
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" required><br><br>
                    <label for="phone_number">Número de Telefone:</label><br>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required><br><br>
                </div>
                <div class="form-group">
                    <h2>Objetivo Profissional</h2>
                    <label for="professional_objective">Objetivo Profissional:</label><br>
                    <textarea name="professional_objective" id="professional_objective" class="form-control"></textarea><br><br>
                </div>
                <div class="form-group">
                    <h2>Formação Acadêmica</h2>
                    <label for="academic_course">Curso Acadêmico:</label><br>
                    <input type="text" name="academic_course" id="academic_course" class="form-control"><br><br>
                    <label for="institution">Instituição de Ensino:</label><br>
                    <input type="text" name="institution" id="institution" class="form-control"><br><br>
                    <label for="start_year">Ano de Início:</label><br>
                    <input type="text" name="start_year" id="start_year" class="form-control"><br><br>
                    <label for="expected_completion_year">Ano de Conclusão Previsto:</label><br>
                    <input type="text" name="expected_completion_year" id="expected_completion_year" class="form-control"><br><br>
                </div>
                <div class="form-group">
                    <h2>Habilidades e Idiomas</h2>
                    <label for="skills">Habilidades:</label><br>
                    <textarea name="skills" id="skills" class="form-control"></textarea><br><br>
                    <label for="languages">Idiomas:</label><br>
                    <input type="text" name="languages" id="languages" class="form-control"><br><br>
                </div>
                <div class="form-group">
                    <h2>Projetos, Certificações e Atividades Extracurriculares</h2>
                    <label for="projects">Projetos:</label><br>
                    <textarea name="projects" id="projects" class="form-control"></textarea><br><br>
                    <label for="certifications">Certificações:</label><br>
                    <textarea name="certifications" id="certifications" class="form-control"></textarea><br><br>
                    <label for="extracurricular_activities">Atividades Extracurriculares:</label><br>
                    <textarea name="extracurricular_activities" id="extracurricular_activities" class="form-control"></textarea><br><br>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection
