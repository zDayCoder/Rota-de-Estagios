@extends('curricula.app') {{-- Se você estiver utilizando um layout padrão --}}


<!-- @section('content')
<div class="card">
    <div class="card-header">
        @if ($curriculum)
        <h1>Detalhes do Currículo</h1>
        @else
        <h1>Sem curriculo encontrado</h1>
        @endif
    </div>
    <div class="card-body">
        @if ($curriculum)
        <h2>Nome Completo:</h2>
        <p>{{ $curriculum->full_name }}</p>
        <h2>Endereço:</h2>
        <p>{{ $curriculum->address }}</p>
        <h2>CEP:</h2>
        <p>{{ $curriculum->cep }}</p>
        <h2>Email:</h2>
        <p>{{ $curriculum->email }}</p>
        <h2>Número de Telefone:</h2>
        <p>{{ $curriculum->phone_number }}</p>
        @if ($curriculum->professional_objective)
        <h2>Objetivo Profissional:</h2>
        <p>{{ $curriculum->professional_objective }}</p>
        @endif
        <h2>Curso Acadêmico:</h2>
        <p>{{ $curriculum->academic_course }}</p>
        <h2>Instituição de Ensino:</h2>
        <p>{{ $curriculum->institution }}</p>
        <h2>Ano de Início:</h2>
        <p>{{ $curriculum->start_year }}</p>
        <h2>Ano de Conclusão Previsto:</h2>
        <p>{{ $curriculum->expected_completion_year }}</p>
        <h2>Habilidades:</h2>
        <p>{{ $curriculum->skills }}</p>
        <h2>Idiomas:</h2>
        <p>{{ $curriculum->languages }}</p>
        @if ($curriculum->projects)
        <h2>Projetos:</h2>
        <p>{{ $curriculum->projects }}</p>
        @endif
        @if ($curriculum->certifications)
        <h2>Certificações:</h2>
        <p>{{ $curriculum->certifications }}</p>
        @endif
        @if ($curriculum->extracurricular_activities)
        <h2>Atividades Extracurriculares:</h2>
        <p>{{ $curriculum->extracurricular_activities }}</p>
        @endif
        @else
        <p>Nenhum currículo encontrado.</p>
        @endif
    </div>
    <div class="card-footer">
        @if ($curriculum)
        <a href="{{ route('curricula.edit', $curriculum->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('curricula.destroy', $curriculum->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Tem certeza que deseja excluir este currículo?')">Excluir</button>
        </form>
        @else
        <a href="{{ route('curricula.create') }}" class="btn btn-success">Adicionar Currículo</a>
        @endif
    </div>
</div> -->
@endsection