@extends('layouts.model')

@section('page-title')
    {{ $projeto->name }}
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
            'December' => 'Dezembro',
            'Jan' => 'Jan',
            'Feb' => 'Fev',
            'Mar' => 'Mar',
            'Apr' => 'Abr',
            'May' => 'Mai',
            'Jun' => 'Jun',
            'Jul' => 'Jul',
            'Aug' => 'Ago',
            'Nov' => 'Nov',
            'Sep' => 'Set',
            'Oct' => 'Out',
            'Dec' => 'Dez'
        );
        return substr_replace($data, $mes_extenso[substr($data, 3,-16)] ,3,-16);
    }
@endphp

@section('page-header')
<!-- Page Menu -->
<div class="page-menu">
    <div class="container">
        <div class="menu-title">Navegar</div>
        <nav>
            <ul>
                <li><a class="scroll-to" href="#descricao">Descrição</a> </li>
                <li><a class="scroll-to" href="#n_alunos">Alunos por Grupo</a> </li>
                <li><a class="scroll-to" href="#n_aulas">Aulas Necessárias</a> </li>
                @forelse($campos as $campo)
                <li><a class="scroll-to" href="#{{ $campo->name }}">{{ $campo->name }}</a> </li>
                @empty
                @endforelse
                <li><a class="scroll-to" href="#projeto">Projeto</a> </li>
                @if(count($projeto->prof_aux) > 0)
                <li><a class="scroll-to" href="#prof_aux">Professor Auxiliar</a>
                @endif
            </ul>
        </nav>

        <div id="menu-responsive-icon">
            <i class="fa fa-reorder"></i>
        </div>

    </div>
</div>
<!-- end: Page Menu -->
@endsection

@section('content')
<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- content -->
            <div class="content col-md-9">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                        <div class="post-item-description">
                            <h1>{{ $projeto->name }}</h1>
                            <div class="post-meta">
                                <i class="fa fa-user"></i>
                                <span class="post-autor"><strong>Postado por: </strong><a href="#">{{ $projeto->user['name'] }}</a></span>
                                <!--<span class="post-category"><strong>de </strong><a href="#">{{ $projeto->instituicao['name'] }}</a></span>--><br>
                                <i class="fa fa-tags"></i>
                                <span class="post-category"><strong>Componente Curricular:</strong> <a href="#">{{ $projeto->categoria['name'] }}</a></span>
                                <div class="post-meta-share">
                                    <a class="btn btn-xs btn-slide btn-facebook" target='_blank' href="{{ route('social.compartilhar', ['provider' =>'facebook', 'id' => $projeto->id] ) }}">
                                        <i class="fa fa-facebook"></i>
                                        <span>Compartilhar</span>
                                    </a>
                                    <a class="btn btn-xs btn-slide btn-twitter" target='_blank' href="{{ route('social.compartilhar', ['provider' =>'twitter', 'id' => $projeto->id] ) }}" data-width="100">
                                        <i class="fa fa-twitter"></i>
                                        <span>Tweetar</span>
                                    </a>
                                    <a class="btn btn-xs btn-slide btn-googleplus" target='_blank' href="mailto:?body=<?php echo $url; ?>" data-width="118">
                                        <i class="fa fa-envelope"></i>
                                        <span>E-mail</span>
                                    </a>
                                    <a class="btn btn-xs btn-slide btn-danger" target='_blank' href="{{ route('social.save', $projeto->id) }}" data-width="80">
                                        <i class="fa fa-file-pdf-o"></i>
                                        <span>PDF</span>
                                    </a>
                                </div>
                            </div>


                        <div class="post-item-description">
                            <div id="descricao"></div>
                            <h4>Descrição: </h4>
                            <p>{{ $projeto->descricao }}</p>
                            <div id="descricao" class="seperator"></div>

                            <h4>Alunos por Grupo: </h4>
                            <p>{{ $projeto->n_alunos }}</p>
                            <div id="n_alunos" class="seperator"></div>

                            <h4>Aulas Necessárias: </h4>
                            <p>{{ $projeto->n_aulas }}</p>
                            <div id="n_aulas" class="seperator"></div>

                            @forelse($campos as $campo)
                            <h4>{{ $campo->name  }}: </h4>
                            <p>{{ $campo->val }}</p>
                            <div id="{{$campo->name}}" class="seperator"></div>
                            @empty
                            @endforelse

                            <h4>Projeto: </h4>
                            <p>{{ $projeto->projeto }}</p>
                            <div id="projeto" class="seperator"></div>
    
                            @if(count($projeto->prof_aux) > 0)
                            <h4>Professor Auxiliar: </h4>
                            @foreach($projeto->prof_aux as $prof)
                            <p><strong>Nome:</strong> {{ $prof->name_prof }}<br>
                            <strong>Email:</strong> {{ $prof->email }}</p>
                            @endforeach
                            @endif

                        </div>
                        <div class="post-tags">
                            @foreach($projeto->tags() as $tag)
                            <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Executar -->
                <!--<div id='executar'>
                    <div class="heading">
                        <h4 class="executar-title">Executar</h4>
                    </div>
                    <form action="{{ route('social.executar', $projeto->id) }}" method="POST">
                    {{ csrf_field() }}
                        <div class="radio">
                            <label>
                                <input type="radio" value="1" name="optionsRadios" id="optionsRadios1" checked> Executar sem mudanças </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="2" name="optionsRadios" id="optionsRadios2"> Executar com mudanças </label>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>-->
                <!-- END: Executar -->

                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="comment_number">
                        Comentários <span>{{ $projeto->total_coments }}</span>
                    </div>
                    <div class="comment-list">
                    @forelse($projeto->comentario as $comentarios)
                    <div class="comment">
                        <div class="image">
                            <img alt="" src="{{ $comentarios->user['avatar'] }}" class="avatar">
                        </div>
                        <div class="text">
                            <h5> {{ $comentarios->user['name'] }}</h5>
                            <span class="comment_date"> Postado em: {{ trocaMes($comentarios->created_at->format('d M, Y \à\s H:i')) }}</span>
                            <div class="text_holder">
                                {{ $comentarios->comentario }}
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <div class="respond-form" id="respond">
                    <div class="respond-comment">
                        Escreva um <span>Comentário</span>
                    </div>
                    {!! Form::open(['route' => ['social.comentar', $projeto->id], 'methood' => 'post', 'class' => 'form-gray-fields']) !!}
                    {{ csrf_field() }}
                    @auth
                    <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea aria-required="true" id="comentario" placeholder="Comentário" rows="9" name="comentario" class="form-control required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i>&nbsp;Enviar Comentário</button>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="form-group">
                        <label class="upper" for="botao">Entre Para Fazer um Comentário</label>
                        <a class="btn btn-facebook" id="botao" href="{{ route('loginSocial', 'facebook')}}"><span><i class="fa fa-facebook"></i>Facebook</span></a>
                    </div>
                    @endguest
                    {!! Form::close() !!}
                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->
        </div>
    </div>
        </div>

            <!-- Sidebar-->
            <div class="sidebar col-md-3">
                <div class="pinOnScroll">
                    <!--Tabs with Posts-->
                    <div class="widget">
                        <div id="tabs-01" class="tabs simple">
                            <ul class="tabs-navigation">
                                <li class="active"><a href="#tab1">Populares</a> </li>
                                <li class=""><a href="#tab2">Iguais</a> </li>
                                <li class=""><a href="#tab3">Recentes</a> </li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="post-thumbnail-list">
                                        @forelse($projeto->populares(3) as $populares)
                                        <div class="post-thumbnail-entry">
                                            <div class="post-thumbnail-content">
                                                <a href="{{ route('projeto.show', $populares->id) }}">{{ $populares->name }}</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d/m/y', strtotime($populares->created_at)) }}</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> {{ $populares->componente_curricular }}</span>
                                            </div>
                                        </div>
                                        @empty
                                        <p>Nenhum projeto semelhante ainda</p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="post-thumbnail-list">
                                        @forelse($projeto->iguais(3) as $iguais)
                                        <div class="post-thumbnail-entry">
                                            <div class="post-thumbnail-content">
                                                <a href="{{ route('projeto.show', $iguais->id) }}">{{ $iguais->name }}</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d/m/y', strtotime($iguais->created_at)) }}</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> {{ $iguais->componente_curricular }}</span>
                                            </div>
                                           </div>
                                        @empty
                                        <p>Nenhum projeto semelhante ainda</p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="post-thumbnail-list">
                                        @forelse($projeto->ultimos(3) as $ultimo)
                                        <div class="post-thumbnail-entry">
                                            <div class="post-thumbnail-content">
                                                <a href="{{ route('projeto.show', $ultimo->id) }}">{{ $ultimo->name }}</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> {{ date('d/m/y', strtotime($ultimo->created_at)) }}</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> {{ $ultimo->componente_curricular }}</span>
                                            </div>
                                        </div>
                                        @empty
                                        <p>Nenhum projeto semelhante ainda</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End: Tabs with Posts-->

                    <!--widget tags -->
                    <div class="widget  widget-tags">
                        <h4 class="widget-title">Tags</h4>
                        <div class="tags">
                            @foreach($tags as $tag)
                            <a href="{{ route('search.tags',$tag->name) }}">{{ $tag['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!--end: widget tags -->


                </div>
            </div>
            <!-- end: sidebar-->
        </div>
    </div>
</section>
@endsection