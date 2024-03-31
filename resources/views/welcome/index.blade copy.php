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
    @include('welcome/navigation-menu')
    @yield('navbar')

    <section id="rest-home" data-section="home"
        style="background-image: url('{{ asset('assets/img/enterprise.avif') }}');" data-stellar-background-ratio="0.5">
        <div class="gradient"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="animate-box"><span class="big">Encontre</span> <br><span>o estágio dos seus
                                    sonhos</span> <br><span class="medium" style="text-transform: uppercase;">e construa
                                    um futuro</span><br><span>repleto de possibilidades</span></h1>
                            <div class="call-to-action" id="ancora">
                                <a href="javascript:void()" class="search animate-box"
                                    onclick="$('[data-nav-section=\'vagas\']').click();"><i class="icon-search"></i>
                                    Vagas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="rest-testimony" data-section="testimony">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box"><span>Conquistas Compartilhadas</span></h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext animate-box">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-1.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Vokalia and Consonantia, there live the blind texts Far far away, behind the word
                                mountains</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-2.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-4.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-3.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains. Vokalia and Consonantia</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-5.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-1.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-6.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-3.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>

                    <div class="testimony-entry animate-box">
                        <div class="feed-bubble">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div>
                        <div class="author-img" style="background-image: url('{{ asset('assets/img/user-4.jpg') }}');">
                        </div>
                        <span class="user">Randy White <br> <small>Bloger, Analyst</small></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="rest-vagas" data-section="vagas">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading text-center">
                    <h2 class="animate-box">Vagas</h2>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 subtext animate-box">
                            <h3>Confira algumas oportunidades de estágio que podem despertar seu interesse.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rest-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-1.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Solid</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-2.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Air</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-3.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Black</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-4.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Soon</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-5.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Homestate</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-6.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Words</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-7.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Soon</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-8.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Homestate</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="rest-portfolio animate-box">
                            <a href="javascript:void()">
                                <div class="portfolio-entry"
                                    style="background-image: url('{{ asset('assets/img/portfolio-9.jpg') }}');">
                                    <div class="desc">
                                        <p>Solid Far far away, behind the word mountains, far from the countries Vokalia
                                            and Consonantia, there live the blind texts.</p>
                                    </div>
                                </div>
                                <div class="portfolio-text text-center">
                                    <h3>Words</h3>
                                    <ul class="stuff">
                                        <li><i class="icon-heart2"></i>200</li>
                                        <li><i class="icon-eye2"></i>248</li>
                                        <li><i class="icon-download"></i>240</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="rest-blog" data-section="blog">
        <div class="rest-blog">
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
                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-1.jpg') }}');">
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
                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-2.jpg') }}');">
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
                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-3.jpg') }}');">
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

                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-3.jpg') }}');">
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
                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-1.jpg') }}');">
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
                    <div class="col-md-4 animate-box blog">
                        <a href="javascript:void()" class="entry">
                            <div class="blog-bg" style="background-image: url('{{ asset('assets/img/blog-2.jpg') }}');">
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
    </section>


    <div id="rest-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animate-box">
                    <h3 class="section-title">{{ config('app.name', 'Rota de Estágios') }}</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.
                    </p>

                </div>

                <div class="col-md-4 animate-box">
                    <h3 class="section-title">Our Address</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
                        <li><i class="icon-phone"></i>+ 1235 2355 98</li>
                        <li><i class="icon-envelope"></i><a href="javascript:void()">info@yoursite.com</a></li>
                        <li><i class="icon-globe"></i><a href="javascript:void()">www.yoursite.com</a></li>
                    </ul>
                    <h3 class="section-title">Connect with Us</h3>
                    <ul class="social-media">
                        <li><a href="javascript:void()" class="facebook"><i class="icon-facebook"></i></a></li>
                        <li><a href="javascript:void()" class="twitter"><i class="icon-twitter"></i></a></li>
                        <li><a href="javascript:void()" class="dribbble"><i class="icon-dribbble"></i></a></li>
                        <li><a href="javascript:void()" class="github"><i class="icon-github-alt"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 animate-box">
                    <h3 class="section-title">Drop us a line</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-send-message btn-md"
                                value="Send Message">
                        </div>
                    </form>
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