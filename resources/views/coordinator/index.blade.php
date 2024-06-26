<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js"> -->
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rota de Estágios" />
    <meta name="keywords" content="Rota de Estágios, estagio, stage, intern, internship route" />
    <meta name="author" content="QuantumCode" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>


</head>

<body>
    <header role="banner" id="rest-header">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="navbar-header">
                        <!-- Mobile Toggle Menu Button -->
                        <a href="javascript:void()" class="js-rest-nav-toggle rest-nav-toggle" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>


                        <x-rest-title />

                    </div>
                    <x-navigation-bar>
                        <li class="active"><a href="javascript:void()" data-nav-section="home"><span>Início</span></a>
                        </li>
                        @guest
                        <li><a href="javascript:void()" data-nav-section="testimony"><span>Relatos e
                                    Feedbacks</span></a>
                        </li>
                        @endguest
                        @guest
                        <li><a href="javascript:void()" data-nav-section="objective"><span>Nosso Objetivo</span></a>
                        </li>
                        @endguest
                        <li><a href="javascript:void()" data-nav-section="about"><span>Sobre</span></a></li>
                        <!-- @guaest
                        <li><a href="javascript:void()"
                                onclick="window.location.href = '{{ route('enterprise.index') }}'"><span>Sou
                                    Recrutador</span></a></li>
                        @endaguest -->
                        <li>
                            <a href="{{ route('dashboard') }}" data-nav-section="dashboard"
                                style="color: #9D1221; text-decoration: none; font-weight: 800;">
                                @auth
                                <span>Dashboard</span>
                                @else
                                <span>Entrar</span>
                                @endauth
                            </a>
                        </li>
                    </x-navigation-bar>

                </nav>
            </div>
        </div>
    </header>

    <section id="rest-home" data-section="home"
        style="background-image: url('{{ asset('assets/img/coordinator.avif') }}');" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="animate-box"><span class="big">Guie</span> <br><span>os futuros
                                    profissionais</span> <br><span class="medium" style="text-transform: uppercase;">e
                                    inspire</span><br><span>um amanhã cheio de potencial</span></h1>
                            <!-- <div class="call-to-action">
                                <a href="javascript:void()" class="search animate-box"
                                    onclick="$('[data-nav-section=\'vagas\']').click();"><i class="icon-search"></i>
                                    Integrantes</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    @guest
    <section id="rest-testimony" data-section="testimony">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <!-- Título da Seção: Conquistas Compartilhadas -->
                    <h2 class="animate-box"><span>Conquistas Compartilhadas</span></h2>
                    <!-- Descrição da Seção: Destaque para a importância dos estágios e desenvolvimento profissional -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext animate-box">
                            <!-- Breve descrição sobre a importância dos estágios para o desenvolvimento profissional -->
                            <p>Descubra como nossos estagiários alcançaram grandes feitos e desenvolveram habilidades
                                valiosas durante seus estágios.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Testemunho 1 -->
                <div class="col-md-4">
                    <div class="testimony-entry animate-box">
                        <!-- Conteúdo do Testemunho 1: Experiência e contribuição de um estagiário -->
                        <div class="feed-bubble">
                            <p>A experiência do estágio me proporcionou oportunidades únicas de aprendizado e
                                contribuição para projetos importantes da empresa.</p>
                        </div>
                        <!-- Imagem do Autor do Testemunho 1 -->
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-1.jpg') }}');">
                        </div>
                        <!-- Nome e Cargo do Autor do Testemunho 1 -->
                        <span class="user">Mariana Silva <br> <small>Estagiária de Marketing Digital</small></span>
                    </div>
                </div>
                <!-- Testemunho 2 -->
                <div class="col-md-4">
                    <div class="testimony-entry animate-box">
                        <!-- Conteúdo do Testemunho 2: Desenvolvimento de habilidades durante o estágio -->
                        <div class="feed-bubble">
                            <p>No estágio, pude aprimorar minhas habilidades técnicas e de comunicação, preparando-me
                                para desafios futuros.</p>
                        </div>
                        <!-- Imagem do Autor do Testemunho 2 -->
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-2.jpg') }}');">
                        </div>
                        <!-- Nome e Cargo do Autor do Testemunho 2 -->
                        <span class="user">Pedro Santos <br> <small>Estagiário de Desenvolvimento Web</small></span>
                    </div>
                </div>
                <!-- Mais Testemunhos Aqui -->
                <!-- Repita o padrão para adicionar mais testemunhos -->
            </div>
        </div>
    </section>
    @endguest
    <!-- 
    <section id="rest-about" data-section="about">
        <div class="rest-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="animate-box"><span>Um pouquinho sobre nós</span></h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="animate-box ">Far far away, behind the word mountains, far from the countries
                                    Vokalia and Consonantia, there live the blind texts. Separated they live in
                                    Bookmarksgrove. </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-1.jpg') }}');">
                                <div class="date">
                                    <span>03</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-2.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-3.jpg') }}');">
                                <div class="date">
                                    <span>28</span>
                                    <small>Feb</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-3.jpg') }}');">
                                <div class="date">
                                    <span>28</span>
                                    <small>Feb</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-1.jpg') }}');">
                                <div class="date">
                                    <span>27</span>
                                    <small>Feb</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg" style="background-image: url('{{ asset('assets/img/about-2.jpg') }}');">
                                <div class="date">
                                    <span>25</span>
                                    <small>Feb</small>
                                </div>
                                <div class="desc">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts.</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Download Free HTML5 Template</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    @guest
    <section id="rest-objective" data-section="objective">
        <div class="rest-objective">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <!-- Título da Seção: Um Pouquinho Sobre Nós -->
                        <h2 class="animate-box"><span>Qual nosso objetivo?</span></h2>
                        <!-- Descrição da Seção: Breve história da empresa -->
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="animate-box">Como sabemos a área de tecnologia, é uma das que mais cresce no
                                    Brasil e no
                                    mundo. Porém, grande parte das vagas são para nível Pleno e Sênior, para pessoas
                                    com uma vasta experiência na área. A entrada de novos talentos é impossibilitada por
                                    diversos fatores, por isso, sem perca de tempo, queremos unir através da nossa
                                    plataforma, estagiários e empresas que buscam sangues novos e futuros brilhantes.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endguest

    <section id="rest-about" data-section="about">
        <div class="rest-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <!-- Título da Seção: Um Pouquinho Sobre Nós -->
                        <h2 class="animate-box"><span>Um pouquinho sobre nós</span></h2>
                        <!-- Descrição da Seção: Breve história da empresa -->
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="animate-box">Conheça a equipe de desenvolvedores por trás do projeto Rota de
                                    Estágios. Cada membro traz sua expertise e paixão para criar soluções inovadoras e
                                    acessíveis.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Card Desenvolvedor 1 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-1.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Ryan Arruda Figueiredo</p>
                                    <p>Cargo: Desenvolvedor Back-end</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Ryan Arruda Figueiredo</h3>
                            </div>
                        </a>
                    </div>
                    <!-- Card Desenvolvedor 2 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-2.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Lucas</p>
                                    <p>Cargo: Desenvolvedor Front-end</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Lucas</h3>
                            </div>
                        </a>
                    </div>
                    <!-- Card Desenvolvedor 3 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-3.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Adriel Costa</p>
                                    <p>Cargo: Desenvolvedor Full-stack</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Adriel Costa</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <!-- Card Desenvolvedor 1 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-1.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Endrews Nunes de Azevedo</p>
                                    <p>Cargo: Documentador</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Endrews Nunes de Azevedo</h3>
                            </div>
                        </a>
                    </div>
                    <!-- Card Desenvolvedor 2 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-2.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Rodrigo Souza da Cruz</p>
                                    <p>Cargo: Desenvolvedor Front-end</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Rodrigo Souza da Cruz</h3>
                            </div>
                        </a>
                    </div>
                    <!-- Card Desenvolvedor 3 -->
                    <div class="col-md-4 animate-box about">
                        <a href="javascript:void()" class="entry">
                            <div class="about-bg"
                                style="background-image: url('{{ asset('assets/img/about-3.jpg') }}');">
                                <div class="date">
                                    <span>01</span>
                                    <small>Mar</small>
                                </div>
                                <div class="desc">
                                    <p>Nome: Yohanis Machado Viana</p>
                                    <p>Cargo: Desenvolvedor Back-end</p>
                                    <p>Experiência: 3 anos</p>
                                </div>
                            </div>
                            <div class="desc-grid">
                                <h3>Yohanis Machado Viana</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div id="rest-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animate-box">
                    <h3 class="section-title">{{ config('app.name', 'Rota de Estágios') }}</h3>
                    <p>REST - Rota de Estágios é sua ponte para oportunidades na área de TI. 
			Conectamos talentos emergentes com empresas inovadoras, criando trajetórias de sucesso. 
			Se você é um estudante à procura de um estágio ou uma empresa em busca de novos talentos, 
			nosso site é o lugar ideal para você. 
			Junte-se a nós e transforme o futuro do mercado de tecnologia!
                    </p>

                </div>

                <div class="col-md-4 animate-box">
                    <h3 class="section-title">Nossos Endereços</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map"></i>Praça 19 de janeiro, 144 - Praia Grande(SP)</li>
                        <li><i class="icon-phone"></i>(13)999887766</li>
                        <li><i class="icon-envelope"></i><a href="javascript:void()">contatorest@gmail.com</a></li>
                    </ul>
                    <h3 class="section-title">Nos siga nas redes</h3>
                    <ul class="social-media">
                        <li><a href="https://www.facebook.com/restcom/" class="facebook"><i class="icon-facebook"></i>Facebook</a></li>
                        <li><a href="https://www.instagram.com/restofficial/" class="twitter"><i class="icon-twitter"></i>Instagram</a></li>
                        <li><a href="https://github.com/aple" class="github"><i class="icon-github-alt"></i>Github</a></li>
                    </ul>
                </div>
                <div class="col-md-4 animate-box">
                    <h3 class="section-title">Nos envie uma mensagem</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Nome</label>
                            <input type="name" class="form-control" id="name" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Mensagem</label>
                            <textarea class="form-control" id="message" rows="7" placeholder="Mensagem"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-send-message btn-md"
                                value="Enviar Mensagem">
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="assets/img/logo-sp.jpeg" alt="Logo SP" style="width: 100px; filter: grayscale(100%);">
                    <p>Em parceria com CPS e SP</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="copy-right">&copy;Todos Os Direitos Reservados. <br> Desenvolvido por <a
                            href="javascript:alert('ola')">QuantumCode</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js')}} "></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('assets/js/jquery.easing.1.3.js')}} "></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}} "></script>
    <!-- Waypoints -->
    <script src="{{ asset('assets/js/jquery.waypoints.min.js')}} "></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('assets/js/jquery.stellar.min.js')}} "></script>
    <!-- Counters -->
    <script src="{{ asset('assets/js/jquery.countTo.js')}} "></script>
    <!-- Main JS (Do not remove) -->
    <script src="{{ asset('assets/js/main.js')}} "></script>

</body>

</html>