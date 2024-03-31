@section('navbar')

<header role="banner" id="rest-header">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="javascript:void()" class="js-rest-nav-toggle rest-nav-toggle" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>


                    @include('welcome/rest_title')

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="javascript:void()" data-nav-section="home"><span>Início</span></a>
                        </li>
                        <!-- <li><a href="javascript:void()" data-nav-section="services"><span>Services</span></a></li>
                        <li><a href="javascript:void()" data-nav-section="explore"><span>Portfolio</span></a></li> -->
                        <li><a href="javascript:void()" data-nav-section="vagas"><span>Vagas</span></a></li>
                        <li><a href="javascript:void()" data-nav-section="testimony"><span>Relatos e
                                    Feedbacks</span></a></li>
                        <li><a href="javascript:void()" data-nav-section="about"><span>Sobre</span></a></li>
                        <li>
                            <a href="{{ route('dashboard') }}" data-nav-section="dashboard"
                                style="color: #a3130d; text-decoration: none; font-weight: 800;">
                                @auth
                                <span>Dashboard</span>
                                @else
                                <span>Entrar</span>
                                @endauth
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

@endsection