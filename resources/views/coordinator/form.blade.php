<div class="container">
    <h1>{{ isset($coordinator) ? 'Editar Coordenador' : 'Criar Coordenador' }}</h1>

    <form action="{{ isset($coordinator) ? route('coordinators.update', $coordinator->id) : route('coordinators.store') }}" method="POST">
        @csrf
        @if(isset($coordinator))
            @method('PUT')
        @endif

        <div>

<p>Full Name: {{ Auth::user()->name }}</p>
</div>
<div>
<p>Email: {{ Auth::user()->email }}</p>
</div>

<div>

        <div class="form-group">
            <label for="coordinator_registration">Registro do Coordenador</label>
            <input type="text" class="form-control" id="coordinator_registration" name="coordinator_registration" value="{{ isset($coordinator) ? $coordinator->coordinator_registration : '' }}">
        </div>

        <div class="form-group">
            <label for="contact">Contato</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ isset($coordinator) ? $coordinator->contact : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($coordinator) ? 'Atualizar' : 'Criar' }}</button>
    </form>
</div>
