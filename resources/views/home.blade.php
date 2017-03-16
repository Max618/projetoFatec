@extends('layouts.model')

@section('page-title')
Logado
@endsection

@section('page-header')
<!-- PAGE TITLE -->
<section id="page-title">
    <div class="container">
        <div class="page-title col-md-8" data-animation="fadeInDown" data-animation-delay="300">
            <h1>Bem-vindo, {{ auth()->user()->name }}!</h1>
            <span>Este é o seu perfil, onde você pode editar e alterar seus dados</span>
        </div>
        <div class="breadcrumb col-md-4" data-animation="fadeInDown" data-animation-delay="800">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{ route('home') }}">Home</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: PAGE TITLE -->
@endsection

@section('content')
<section>
    @if(Session::has('sucesso'))
        <div class="container">
            <div role="alert" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <strong><i class="fa fa-check-circle"></i> Sucesso!</strong> {{session('sucesso')}}
            </div>
        </div>
    @elseif(Session::has('erro'))
        <div class="container">
            <div role="alert" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <strong><i class="fa fa-warning"></i> Erro!</strong> {{session('erro')}}
            </div>
        </div>
    @endif

    <!-- MEUS PROJETOS -->
        <div class="heading heading-center">
            <h2>Meus Projetos</h2>
        </div>

        @if(count($projetos) >= 5)
            <div class="container portfolio">
                <div class="carousel" data-lightbox-type="gallery">
                        @foreach($projetos as $projeto)
                            <div class="portfolio-item design artwork">
                                <div class="portfolio-image effect social-links">
                                    <img src="images/portfolio/1.jpg" alt="">
                                    <div class="image-box-content">
                                        <p>
                                            <a href="images/portfolio/1.jpg" data-lightbox-type="image" title="{{ $projeto->name }}"><i class="fa fa-expand"></i></a>
                                            <a href="{{ route('projeto.show', $projeto->id) }}"><i class="fa fa-link"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="portfolio-description">
                                    <h4 class="title">{{ $projeto->name }}</h4>
                                    <p>
                                        {{ $projeto->total_curtidas }} <i class="fa fa-thumbs-o-up"></i> 
                                        {{ $projeto->total_coments }} <i class="fa fa-comments-o"></i> 
                                        {{ $projeto->total_comp }} <i class="fa fa-share-alt"></i> 
                                        {{ $projeto->total_visualizacao }} <i class="fa fa-eye"></i>
                                    </p>
                                </div>
                                <div class="portfolio-date">
                                   
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        @elseif(count($projetos) < 5 and count($projetos) > 0)
            <div class="container portfolio">
                <div id="isotope" class="isotope portfolio-items" data-isotope-item-space="2" data-isotope-mode="masonry" data-isotope-col="4" data-isotope-item=".portfolio-item">
                    @foreach($projetos as $projeto)
                        <div class="portfolio-item design beauty">
                            <div class="portfolio-image effect social-links">
                                <img src="images/portfolio/2.jpg" alt="">
                                <div class="image-box-content">
                                    <p>
                                        <a href="images/portfolio/1.jpg" data-lightbox-type="image" title="{{ $projeto->name }}"><i class="fa fa-expand"></i></a>
                                        <a href="{{ route('projeto.show', $projeto->id) }}"><i class="fa fa-link"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="portfolio-description">
                                <h4 class="title">{{ $projeto->name }}</h4>
                                <p>
                                    {{ $projeto->total_curtidas }} <i class="fa fa-thumbs-o-up"></i> 
                                    {{ $projeto->total_coments }} <i class="fa fa-comments-o"></i> 
                                    {{ $projeto->total_comp }} <i class="fa fa-share-alt"></i> 
                                    {{ $projeto->total_visualizacao }} <i class="fa fa-eye"></i>
                                </p>

                            </div>
                            <div class="portfolio-date">
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="jumbotron jumbotron-fullwidth background-colored text-light m-b-0">

                    <h3>O que!?</h3>
                    <p>Você ainda não tem um projeto cadastrado.</p>
                    <a class="button transparent icon-right" href="{{ route('projeto.create') }}"><span>Novo Projeto</span></a>
                
            </div>
        @endif
    <!-- END: MEUS PROJETOS -->

    <!-- Projetos que gostei -->
    <div class="heading heading-center">
            <h2>Projetos que Gostei</h2>
    </div>

    @if(count($curtidas) >= 5)
            <div class="container portfolio">
                <div class="carousel" data-lightbox-type="gallery">
                        @foreach($projetos as $projeto)
                            <div class="portfolio-item design artwork">
                                <div class="portfolio-image effect social-links">
                                    <img src="images/portfolio/1.jpg" alt="">
                                    <div class="image-box-content">
                                        <p>
                                            <a href="images/portfolio/1.jpg" data-lightbox-type="image" title="{{ $projeto->name }}"><i class="fa fa-expand"></i></a>
                                            <a href="{{ route('projeto.show', $projeto->id) }}"><i class="fa fa-link"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="portfolio-description">
                                    <h4 class="title">{{ $projeto->name }}</h4>
                                    <p>
                                        {{ $projeto->total_curtidas }} <i class="fa fa-thumbs-o-up"></i> 
                                        {{ $projeto->total_coments }} <i class="fa fa-comments-o"></i> 
                                        {{ $projeto->total_comp }} <i class="fa fa-share-alt"></i> 
                                        {{ $projeto->total_visualizacao }} <i class="fa fa-eye"></i>
                                    </p>
                                </div>
                                <div class="portfolio-date">
                                   
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        @elseif(count($curtidas) < 5 and count($curtidas) > 0)
            <div class="container portfolio">
                <div id="isotope" class="isotope portfolio-items" data-isotope-item-space="2" data-isotope-mode="masonry" data-isotope-col="4" data-isotope-item=".portfolio-item">
                    @foreach($projetos as $projeto)
                        <div class="portfolio-item design beauty">
                            <div class="portfolio-image effect social-links">
                                <img src="images/portfolio/2.jpg" alt="">
                                <div class="image-box-content">
                                    <p>
                                        <a href="images/portfolio/1.jpg" data-lightbox-type="image" title="{{ $projeto->name }}"><i class="fa fa-expand"></i></a>
                                        <a href="{{ route('projeto.show', $projeto->id) }}"><i class="fa fa-link"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="portfolio-description">
                                <h4 class="title">{{ $projeto->name }}</h4>
                                <p>
                                    {{ $projeto->total_curtidas }} <i class="fa fa-thumbs-o-up"></i> 
                                    {{ $projeto->total_coments }} <i class="fa fa-comments-o"></i> 
                                    {{ $projeto->total_comp }} <i class="fa fa-share-alt"></i> 
                                    {{ $projeto->total_visualizacao }} <i class="fa fa-eye"></i>
                                </p>

                            </div>
                            <div class="portfolio-date">
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="jumbotron jumbotron-fullwidth background-colored text-light m-b-0">

                    <h3>O que!?</h3>
                    <p>Você ainda não curtiu um projeto.</p>
                    <a class="button transparent icon-right" href="{{ route('projeto.index') }}"><span>Ver Projetos</span></a>
                
            </div>
        @endif

</section>
@endsection
