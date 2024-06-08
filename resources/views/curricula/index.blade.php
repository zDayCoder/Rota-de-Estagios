@extends('curricula.app')

@section('content')
<!DOCTYPE html>
<html>
<title>{{ config('app.name', 'Rota de Estágios') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Roboto", sans-serif
}
</style>

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">
            @if ($curriculum)
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <div style="min-height:333px;background:#EEEDEB">
                            <img src="{{ asset('assets/img/user-1.jpg')}}" style="width:100%" alt="Avatar"
                                onerror="this.onerror=null; this.style='padding:50px;width:100%';this.src='{{ asset('assets/img/default-user.svg') }}';">
                        </div>
                        <div class="w3-display-bottomleft w3-container w3-text-black">
                            <h2>{{ $curriculum->name }}</h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <!--Resumo/Objetivo -->
                        <p>{{ $curriculum->summary }}</p>
                        <hr>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->city }} - {{ $curriculum->state }}</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->email }}</p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->phone }}</p>
                        <hr>

                        <!-- Habilidades -->
                        <h3>Habilidades</h3>
                        @foreach($curriculum->skills as $skill)
                        <p>{{ $skill->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width: {{ $skill->level * 20 }}%">{{ $skill->level * 20 }}%</div>
                        </div>
                        @endforeach
                        <br>

                        <!-- Idiomas -->
                        <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Idiomas</b></p>
                        @foreach($curriculum->languages as $language)
                        <p>{{ $language->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px; width: {{ $language->level * 20 }}%"></div>
                        </div>
                        @endforeach

                        <br>
                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Experiência Profissional</h2>
                    @foreach($curriculum->experiences as $experience)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $experience->position }}</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-building fa-fw w3-margin-right"></i>{{ $experience->employer }}</h6>
                        <h6 class="w3-text-teal"><i class="fa fa-map-marker fa-fw w3-margin-right"></i>{{ $experience->location }}</h6>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $experience->start_date }} - @if($experience->is_current) Atual @else {{ $experience->end_date }} @endif</h6>
                        <p>{{ $experience->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>

                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Certificações</h2>
                    @foreach($curriculum->certifications as $certification)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $certification->name }}</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $certification->end_date }}</h6>
                        <p>{{ $certification->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>

                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-graduation-cap fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Educação</h2>
                    @foreach($curriculum->educations as $education)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $education->name }}</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $education->start_date }} - {{ $education->end_date }}</h6>
                        <hr>
                    </div>
                    @endforeach
                </div>

                <!-- End Right Column -->
            </div>
            @else
            <h1> Sem Currículo </h1>
            <button type="button" class="btn btn-primary" onclick="window.location='{{ route('curricula.create') }}'">Crie um agora mesmo</button>
            @endif
            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

</body>
</html>
@endsection
