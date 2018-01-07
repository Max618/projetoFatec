@extends('layouts.model')

@section('page-title')
    Ver Projetos
@endsection

@php
function trocaMes($data){
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
        return substr_replace($data, $mes_extenso[substr($data, 3,-5)] ,3,-5);
    }
@endphp

@section('content')
<!-- Page Menu -->
<div class="page-menu">
    <div class="container">
        <div class="menu-title">Categorias</div>
        <nav>
            <ul>
                @foreach($categorias as $categoria)
                <li class="active"><a href="{{ route('search.categorias',$categoria->id) }}">{{ $categoria["name"] }}</a> </li>
                @endforeach
            </ul>
        </nav>

        <div id="menu-responsive-icon">
            <i class="fa fa-reorder"></i>
        </div>

    </div>
</div>
<!-- end: Page Menu -->
<section id="page-content">
    <div class="container">
        <!-- post content -->

        <!-- Page title -->
        <div class="page-title">
            <h1>Todos os Projetos</h1>
            <div class="breadcrumb float-left">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li><a href="{{ route('projeto.index') }}">Projetos</a>
                    </li>
                    <li class="active"><a href="{{ route('projeto.index') }}">Ver Todos</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: Page title -->

        <!-- Blog -->
        <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item" data-stagger="10">
        <!-- Blog image post-->
        @forelse($projetos as $projeto)
            <div class="post-item border">
                <div class="post-item-wrap">
                    <div class="post-image">
                        <a href="{{ route('projeto.show', $projeto->id) }}">
                            <img alt="" src="/images/blog/12.jpg">
                        </a>
                        <span class="post-meta-category"><a href="{{ route('search.categorias',$categoria->id) }}">{{ $projeto->categoria['name'] }}</a></span>
                    </div>
                    <div class="post-item-description">
                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ trocaMes($projeto->created_at->format('d F Y')) }}</span>
                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>{{ $projeto->total_coments }} Comentários</a></span>
                        <h2><a href="{{ route('projeto.show', $projeto->id) }}">{{  $projeto->name }}</a></h2>
                        <p>{{ $projeto->descricao }}</p>
                        <a href="{{ route('projeto.show', $projeto->id) }}" class="item-link">Ler mais <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <p>Sem posts</p>
        @endforelse
        </div>


<!-- pagination nav -->
<nav class="text-center">
    <ul class="pagination pagination-simple">
        {{ $projetos->links() }}
    </ul>
</nav>
<!-- END: pagination nav -->

            </div>
    </section>
@endsection
