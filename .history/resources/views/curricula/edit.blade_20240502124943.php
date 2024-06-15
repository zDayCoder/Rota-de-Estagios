@extends('curricula.app')


@section('content')
    <div class="container">
        <h2>Editar Currículo</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('curricula.update', $curriculum->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Nome Completo:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $curriculum->full_name) }}">
            </div>
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $curriculum->address) }}">
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep', $curriculum->cep) }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $curriculum->email) }}">
            </div>
            <div class="form-group">
                <label for="phone_number">Telefone:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $curriculum->phone_number) }}">
            </div>
            <div class="form-group">
                <label for="professional_objective">Objetivo Profissional:</label>
                <textarea class="form-control" id="professional_objective" name="professional_objective">{{ old('professional_objective', $curriculum->professional_objective) }}</textarea>
            </div>
            <div class="form-group">
                <label for="academic_course">Curso Acadêmico:</label>
                <input type="text" class="form-control" id="academic_course" name="academic_course" value="{{ old('academic_course', $curriculum->academic_course) }}">
            </div>
            <div class="form-group">
                <label for="institution">Instituição:</label>
                <input type="text" class="form-control" id="institution" name="institution" value="{{ old('institution', $curriculum->institution) }}">
            </div>
            <div class="form-group">
                <label for="start_year">Ano de Início:</label>
                <input type="number" class="form-control" id="start_year" name="start_year" value="{{ old('start_year', $curriculum->start_year) }}">
            </div>
            <div class="form-group">
                <label for="expected_completion_year">Ano de Conclusão Previsto:</label>
                <input type="number" class="form-control" id="expected_completion_year" name="expected_completion_year" value="{{ old('expected_completion_year', $curriculum->expected_completion_year) }}">
            </div>
            <div class="form-group">
                <label for="skills">Habilidades:</label>
                <textarea class="form-control" id="skills" name="skills">{{ old('skills', $curriculum->skills) }}</textarea>
            </div>
            <div class="form-group">
                <label for="languages">Idiomas:</label>
                <input type="text" class="form-control" id="languages" name="languages" value="{{ old('languages', $curriculum->languages) }}">
            </div>
            <div class="form-group">
                <label for="projects">Projetos:</label>
                <textarea class="form-control" id="projects" name="projects">{{ old('projects', $curriculum->projects) }}</textarea>
            </div>
            <div class="form-group">
                <label for="certifications">Certificações:</label>
                <textarea class="form-control" id="certifications" name="certifications">{{ old('certifications', $curriculum->certifications) }}</textarea>
            </div>
            <div class="form-group">
                <label for="extracurricular_activities">Atividades Extracurriculares:</label>
                <textarea class="form-control" id="extracurricular_activities" name="extracurricular_activities">{{ old('extracurricular_activities', $curriculum->extracurricular_activities) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection