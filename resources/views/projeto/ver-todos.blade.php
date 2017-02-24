@extends('layouts.model')

@section('page-title')
    Ver Projetos
@endsection

@section('page-header')
    <section id="page-title" class="page-title-parallax page-title-center text-dark" style="background-image:url(/images/parallax/page-title-parallax.jpg);">
        <div class="container">
            <div class="page-title col-md-8">
                <h1>Projetos</h1>
                <span>Inspiration comes of working every day.</span>
            </div>
            <div class="breadcrumb col-md-4">
                <ul>
                    <li><a href="#"><i class="fa fa-home"></i></a> </li>
                    <li><a href="#">Home</a> </li>
                    <li><a href="#">Shortcodes</a> </li>
                    <li class="active"><a href="#">Buttons</a> </li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')
<section>
    <div class="container portfolio">
        <!-- Portfolio Items -->
        <div id="isotope" class="isotope portfolio-items" data-isotope-item-space="3" data-isotope-mode="masonry" data-isotope-col="3" data-isotope-item=".portfolio-item">
            @foreach($projetos as $projeto)
                <div class="portfolio-item design artwork">
                    <div class="portfolio-image effect social-links">
                        <img src="images/portfolio/15.jpg" alt="">
                        <div class="image-box-content">
                            <p>
                                <a href="images/portfolio/1.jpg" data-lightbox-type="image" title="Your image title here!"><i class="fa fa-expand"></i></a>
                                <a href="{{ route('projeto.show', $projeto->id) }}"><i class="fa fa-link"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="portfolio-description">
                        <h4 class="title">{{$projeto->name}}</h4>
                        <p><i class="fa fa-tag"></i>{{$projeto->tags}}</p>
                    </div>
                    <div class="portfolio-date">
                        <p class="small"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($projeto->created_at)->format('d/m/Y') }}</p>
                    </div>
                    <div class="portfolio-details">
                        <strong>Descrição:</strong>
                        <p>{{$projeto->descricao}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END: Portfolio Items -->
    </div>
    <hr class="space">

</section>
@endsection