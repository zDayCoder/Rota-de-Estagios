
<div class="container">
    <h1>Detalhes do Coordenador</h1>

    <div class="card">
        <div class="card-body">

        <div>

<p>Full Name: {{ Auth::user()->name }}</p>
</div>
<div>
<p>Email: {{ Auth::user()->email }}</p>
</div>

<div>

            <p class="card-text">

                <strong>Registro do Coordenador:</strong> {{ $coordinator->coordinator_registration }}<br>
                <strong>Contato:</strong> {{ $coordinator->contact }}
            </p>
            <a href="{{ route('coordinators.edit', $coordinator->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
