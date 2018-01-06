<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/images/favicon.png">

    <title>Titulo | @yield('page-title')</title>
    <!-- Stylesheets & Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body class="wide">
    

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- HEADER -->
        <header id="header" class="header-transparent">
            <div id="header-wrap">
                <div class="container">

                    <!--LOGO-->
                    <div id="logo">
                        <a href="{{{ url('/') }}}" class="logo" data-dark-logo="/images/logo-dark.png">
                            <img src="/images/logo.png" alt="Polo Logo">
                        </a>
                    </div>
                    <!--END: LOGO-->

                    <!--Top Search Form-->
                    <div id="top-search">
                        <form action="search-results-page.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
                        </form>
                    </div>
                    <!--end: Top Search Form-->

                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <button class="lines-button x"> <span class="lines"></span> </button>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->

                    <!--Navigation-->
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li class="dropdown"><a href="{{ route('projeto.index') }}">Projetos</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('projeto.index') }}" class="icon-right"><span>Ver Projetos <i class="fa fa-list-ul"></i></span></a>
                                            </li>
                                            @auth
                                                <li><a href="{{ route('projeto.create') }}" class="icon-right"><span>Novo Projeto <i class="fa fa-edit"></i></span></a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </li>
                                    <li><a href="">Sobre</a></li>
                                    <li><a href="">Ajuda</a></li>

                        <!-- Authentication Links -->
                        @auth
                            <li class="dropdown"><a href="#">
                             @if (session('socialUser'))
                            <img height="30px" width="30px" class="avatar" src="{{ session('socialUser')->getAvatar() }}">
                            @endif
                            {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('home') }}"  class="icon-right"><span>Home <i class="fa fa-home"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="icon-right"><span>Sair <i class="fa fa-sign-out"></i></span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>   
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @endguest
                        <!--END: Authentication Links -->

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- END: HEADER -->
        
        <!-- PAGE HEADER -->
                @yield('page-header')
        <!-- END: PAGE HEADER -->


        <!-- PEGAR PAGINA -->
                @yield('content')
        <!-- END: PEGAR PAGINA -->

        <!-- FOOTER -->
        <footer class="background-dark text-grey" id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row text-center">
                        <img alt="" src="/images/logo-sm-dark.png">
                        <div class="copyright-text text-center"> &copy; 2016 POLO - Best HTML5 Template Ever. All Rights Reserved. <a target="_blank" href="http://www.inspiro-media.com">INSPIRO</a>
                        </div>
                        <div class="social-icons center">
                                    <ul>
                                        <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                        <li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END: FOOTER -->

    </div>
    <!-- END: WRAPPER -->

    <!-- Go to top button -->
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

    <!--Plugins-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('js/functions.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/revolution/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/revolution/css/navigation.css') }}">

    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>




</body>

</html>
