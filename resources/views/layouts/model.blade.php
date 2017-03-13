<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="shortcut icon" href="/images/favicon.png">

    <title>Titulo | @yield('page-title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="/vendor/animateit/animate.min.css" rel="stylesheet">

    <!-- Vendor css -->
    <link href="/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Template base -->
    <link href="/css/theme-base.css" rel="stylesheet">

    <!-- Template elements -->
    <link href="/css/theme-elements.css" rel="stylesheet">

    <!-- Responsive classes -->
    <link href="/css/responsive.css" rel="stylesheet">
    <!--
    Laravel css
    <link href="/css/app.css" rel="stylesheet">

    Laravel js
    <script src="/js/app.js"></script>-->

    <!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->


    <!-- Template color -->
    <link href="/css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

    <!-- LOAD GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" property="stylesheet" href="/vendor/rs-plugin/css/settings.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/css/rs-plugin-styles.css" type="text/css" />

    <!-- CSS CUSTOM STYLE -->
    <link rel="stylesheet" type="text/css" href="/css/custom.css" media="screen" />

    <!--VENDOR SCRIPT-->
    <script src="/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/vendor/plugins-compressed.js"></script>
    
    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script type="text/javascript" src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

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

                    <!--MOBILE MENU -->
                    <div class="nav-main-menu-responsive">
                        <button class="lines-button x">
                            <span class="lines"></span>
                        </button>
                    </div>
                    <!--END: MOBILE MENU -->

                    <!--TOP SEARCH -->
                    <div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>
                        <form action="search-results-page.html" method="get" data-toggle="validator">
                            <input type="text" name="q" id="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;" required>
                        </form>




                    </div>
                    <!--END: TOP SEARCH -->

                    <!--NAVIGATION-->
                    <div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
                        <div class="container">
                            <nav id="mainMenu" class="main-menu mega-menu">
                                <ul class="main-menu nav nav-pills">
                                    <li class="dropdown"><a href="{{ route('projeto.index') }}">Projetos</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('projeto.index') }}" class="icon-right"><span>Ver Projetos <i class="fa fa-list-ul"></i></span></a>
                                            </li>
                                            @if (!Auth::guest())
                                                <li><a href="{{ route('projeto.create') }}" class="icon-right"><span>Novo Projeto <i class="fa fa-edit"></i></span></a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="">Sobre</a></li>
                                    <li><a href="">Ajuda</a></li>

                        <!-- Authentication Links -->
                        @if (!Auth::guest())
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
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @endif
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

    <!-- GO TOP BUTTON -->
    <a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

    <!-- Theme Base, Components and Settings -->
    <script src="/js/theme-functions.js"></script>

    <!-- Custom js file -->
    <script src="/js/custom.js"></script>



</body>

</html>
