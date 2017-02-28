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

@php
function trocaMes($mes){
        $mes_extenso = array(
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'November' => 'Novembro',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'December' => 'Dezembro'
        );
        return $mes_extenso[$mes];
    }
@endphp

@section('content')
    <section>
        <div class="container">
            <!-- Blog post-->
            <div class="post-content post-modern post-3-columns">
                <!-- Blog image post-->
                @forelse($projetos as $projeto)
                    <div class="post-item p-t-30">
                        <div class="post-image">
                            <a href="{{ route('projeto.show', $projeto->id) }}">
                                <img alt="" src="images/blog/thumb/1.jpg">
                            </a>
                        </div>
                        <div class="post-content-details">
                            <div class="post-title">
                                <h3><a href="#">{{  $projeto->name }}</a></h3>
                            </div>
                            <div class="post-info">
                                <span class="post-autor">Postado por: <a href="#">{{ $projeto->user['name'] }}</a></span>
                                <span class="post-category">de: <a href="#">{{ $projeto->instituicao['name'] }}</a></span>
                            </div>
                            <div class="post-description">
                                <p>{{ $projeto->descricao }}</p>

                                <div class="post-info">
                                    <a class="read-more" href="{{ route('projeto.show', $projeto->id) }}">Ler mais <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="post-meta">
                            <div class="post-date">
                                <span class="post-date-day">{{ $projeto->created_at->format('d') }}</span>
                                <span class="post-date-month">{{ trocaMes($projeto->created_at->format('F')) }}</span>
                                <span class="post-date-year">{{ $projeto->created_at->format('Y') }}</span>
                            </div>

                            <div class="post-comments">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span class="post-comments-number">{{ $projeto->total_curtidas }}</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-comments-o"></i>
                                    <span class="post-comments-number">{{ $projeto->total_coments }}</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="post-comments-number">{{ $projeto->total_comp }}</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-eye"></i>
                                    <span class="post-comments-number">{{ $projeto->total_visualizacao }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Sem posts</p>
                @endforelse


<!-- pagination nav -->
<div class="text-center">
        <div class="pagination-wrap">
            {{ $projetos->links() }}
        </div>
    </div>
<!-- END: pagination nav -->

            </div>
        </div>
    </section>
@endsection
