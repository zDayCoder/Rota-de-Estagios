@extends('curricula.app') {{-- Se você estiver utilizando um layout padrão --}}

@section('content')
<!DOCTYPE html>
<html>
<title>{{ config('app.name', 'Rota de Estágios') }}Meu Curriculo</title>
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
    font-family: 'Courier New', Courier, monospace;}
</style>

<body class="w3-light-grey">

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

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

                        <!-- <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Designer</p> -->
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Praia Grande</p>
                        <p><i
                                class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->email }}
                        </p>
                        <p><i
                                class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->phone }}
                        </p>
                        <hr>

                        <!-- Habilidades -->
                        <h3>Habilidades</h3>
                        @foreach($curriculum->skills as $skill)
                        <p>{{ $skill->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width: 90%">90%</div>
                            <!-- style="width: {{ $skill->percentage }}%">{{ $skill->percentage }}%</div> -->
                        </div>
                        @endforeach
                        <br>

                        <!-- Idiomas -->
                        <p class="w3-large w3-text-theme"><b><i
                                    class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Idiomas</b></p>
                        @foreach($curriculum->languages as $language)
                        <p>{{ $language->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal"
                                style="height:24px; width: {{ $language->proficiency }}%"></div>
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
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Experiência
                        Profissional</h2>
                    @foreach($curriculum->experiences as $experience)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $experience->position }}</b></h5>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-building fa-fw w3-margin-right"></i>{{ $experience->employer }}</h6>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-map-marker fa-fw w3-margin-right"></i>{{ $experience->location }}</h6>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $experience->start_date }} -
                            @if($experience->currently_working) Atual @else {{ $experience->end_date }} @endif</h6>
                        <p>{{ $experience->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>

                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Certificações
                    </h2>
                    @foreach($curriculum->certifications as $certification)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $certification->name }}</b></h5>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $certification->date }}</h6>
                        <p>{{ $certification->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>


                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Educação</h2>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
                        <p>Web Development! All I need to know in one place</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>London Business School</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
                        <p>Master Degree</p>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>School of Coding</b></h5>
                        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
                        <p>Bachelor Degree</p><br>
                    </div>
                </div>

                <!-- End Right Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

    <footer class="w3-container w3-teal w3-center w3-margin-top">
        <p>Find me on social media.</p>
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

</body>

</html>

@endsection