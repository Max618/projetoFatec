@extends('layouts.model')

@section('page-title')
    {{ $projeto->name }}
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
        return $mes_extenso[$mes];
    }
@endphp

@section('page-header')
<!-- PAGE TITLE -->
<section id="page-title">
    <div class="container">
        <div class="page-title col-md-8" data-animation="fadeInDown" data-animation-delay="300">
            <h1>{{ $projeto->name }}</h1>
            <span>{{ $projeto->descricao }}</span>
        </div>
        <div class="breadcrumb col-md-4" data-animation="fadeInDown" data-animation-delay="800">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{ route('projeto.index') }}">Projetos</a>
                </li>
                <li><a href="{{ route('projeto.show', $projeto->id) }}">{{ $projeto->name }}</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: PAGE TITLE -->
@endsection

@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <!-- Blog post-->
            <div class="post-content post-content-single col-md-9">
                <!-- Post item-->
                <div class="post-item">
                    <div class="post-image">
                        <a href="#">
                            <img alt="" src="/images/blog/1.jpg">
                        </a>
                    </div>
                    <div class="post-content-details">
                        <div class="post-title">
                            <h1>{{ $projeto->name }}</h1>
                            <i class="fa fa-user"></i>
                            <span class="post-autor"><strong>Postado por: </strong><a href="#">{{ $projeto->user['name'] }}</a></span>
                            <span class="post-category"><strong>de </strong><a href="#">{{ $projeto->instituicao['name'] }}</a></span>
                            <br>
                            <i class="fa fa-tags"></i>
                            <span class="post-category"><strong>Categoria:</strong> <a href="#">{{ $projeto->categoria['name'] }},</a></span>
                            <span class="post-category"><strong>Ambito: </strong><a href="#">{{ $projeto->ambito['name'] }},</a></span>
                            <span class="post-category"><strong>Eixo: </strong><a href="#">{{ $projeto->eixo['name'] }},</a></span>
                            <span class="post-category"><strong>Tags: </strong></span>
                            <a href="#"><span class="label label-default">{{ $projeto->tags }}</a></span>
                        </div>

                        <div id="descricao" class="seperator"></div>

                        <div class="post-description">
                            <h3>Descrição: </h3>
                            <p>{{ $projeto->descricao }}</p>
                            <div id="cronograma" class="seperator"></div>
                            
                            <h3>Cronograma: </h3>
                            <p>{{ $projeto->cronograma }}</p>
                            <div id="ancora" class="seperator"></div>

                            <h3>Âncora: </h3>
                            <p>{{ $projeto->ancora }}</p>
                            <div id="questao_motriz" class="seperator"></div>
                            
                            <h3>Questão Motriz: </h3>
                            <p>{{ $projeto->questao_motriz }}</p>
                            <div id="n_alunos" class="seperator"></div>

                            <h3>Número de Alunos por Grupo: </h3>
                            <p>{{ $projeto->n_alunos }}</p>
                            <div id="prazo" class="seperator"></div>

                            <h3>Prazo de Aulas: </h3>
                            <p>{{ $projeto->prazo }}</p>
                            <div id="feedback" class="seperator"></div>

                            <h3>FeedBack: </h3>
                            <p>{{ $projeto->feedback }}</p>
                            <div id="resultado" class="seperator"></div>

                            <h3>Resultado: </h3>
                            <p>{{ $projeto->resultado }}</p>
                            <div id="comentarios_prof" class="seperator"></div>

                            <h3>Comentários do Professor: </h3>
                            <p>{{ $projeto->comentarios_prof }}</p>
    
                            @if($projeto->prof_aux_id)
                            <div id="prof_aux" class="seperator"></div>
                            <h3>Profesor Auxiliar: </h3>
                            <p><strong>Nome:</strong> {{ $projeto->prof_aux['name_prof'] }}<br>
                            <strong>Email:</strong> {{ $projeto->prof_aux['email'] }}</p>
                            @endif

                        </div>
                    </div>

                    <div class="post-meta">
                            <div class="post-date">
                                <span class="post-date-day">{{ $projeto->created_at->format('j') }} de</span>
                                <span class="post-date-month">{{ trocaMes($projeto->created_at->format('F')) }} de</span>
                                <span class="post-date-year">{{ $projeto->created_at->format('Y') }}</span>
                            </div>

                            <div class="post-comments">
                                    <a href="{{ route('social.curtir', $projeto->id) }}">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <span class="post-comments-number">{{ $projeto->total_curtidas }}</span></a>
                            </div>
                            <div class="post-comments">
                                    <a class="scroll-to" href="#comentar">
                                    <i class="fa fa-comments-o"></i>
                                    <span class="post-comments-number">{{ $projeto->total_coments }}</a></span>
                            </div>
                            <div class="post-comments">
                                    <a data-container="body" data-toggle="popover" data-placement="top" title="Compartilhar" data-content="
                                    <div class='social-icons social-icons-colored-hover'>
                                    <ul>
                                        <li class='social-facebook'><a target='_blank' href='{{ route('social.compartilhar', ['provider' =>'facebook', 'id' => $projeto->id] ) }}'><i class='fa fa-facebook'></i></a></li>
                                        <li class='social-twitter'><a target='_blank' href='{{ route('social.compartilhar', ['provider' =>'twitter', 'id' => $projeto->id] ) }}'><i class='fa fa-twitter'></i></a></li>
                                        <li class='social-gplus'><a target='_blank' href='{{ route('social.compartilhar', ['provider' =>'gplus', 'id' => $projeto->id] ) }}'><i class='fa fa-google-plus'></i></a></li>
                                    </ul>
                                    </div>
                                    ">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="post-comments-number">{{ $projeto->total_comp }}</span></a>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-eye"></i>
                                    <span class="post-comments-number">{{ $projeto->total_visualizacao }}</span>
                            </div>
                    </div>
                </div>
                
                <!-- Executar -->
                <div id='executar'>
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
                </div>
                <!-- END: Executar -->

                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="heading">
                        <h4 class="comments-title">Comentários <small class="number">({{ $projeto->total_coments }})</small></h4>
                    </div>

                    @forelse($projeto->comentario as $comentarios)
                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="{{ $comentarios->user['avatar'] }}" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><i class="fa fa-user"></i> {{ $comentarios->user['name'] }}</h4>
                            <p class="time"><i class="fa fa-clock-o"></i> {{ trocaMes($comentarios->created_at->format('M')).$comentarios->created_at->format(' j, Y \à\s H:i') }}</p>
                            <p>{{ $comentarios->comentario }}</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <div id="comentar" class="comment-form">
                    <div class="heading">
                        <h4>Escreva um Comentário</h4>
                    </div>
                    {!! Form::open(['route' => ['social.comentar', $projeto->id], 'methood' => 'post', 'class' => 'form-gray-fields']) !!}
                    {{ csrf_field() }}
                    @if(!Auth::guest())
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
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Enviar Comentário</button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <label class="upper" for="botao">Entre Para Fazer um Comentário</label>
                        <a class="button blue-dark rounded icon-left" id="botao" href="{{ route('loginSocial', 'facebook')}}"><span><i class="fa fa-facebook"></i>Facebook</span></a>
                    </div>
                    @endif
                    {!! Form::close() !!}
                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->
            <!--Sidebar -->
            <div id="sidebar" class="sidebar col-md-3">
                <div class="widget clearfix widget-archive">
                    <h4 class="widget-title">Navegar</h4>
                    <ul class="list list-lines">
                        <li><a class="scroll-to" href="#descricao">Descrição</a>
                        </li>
                        <li><a class="scroll-to" href="#cronograma">Cronograma</a>
                        </li>
                        <li><a class="scroll-to" href="#ancora">Âncora</a>
                        </li>
                        <li><a class="scroll-to" href="#questao_motriz">Questão Motriz</a>
                        </li>
                        <li><a class="scroll-to" href="#n_alunos">Número de Alunos</a>
                        </li>
                        <li><a class="scroll-to" href="#prazo">Prazo</a>
                        </li>
                        <li><a class="scroll-to" href="#feedback">FeedBack</a>
                        </li>
                        <li><a class="scroll-to" href="#resultado">Resultado</a>
                        </li>
                        <li><a class="scroll-to" href="#comentarios_prof">Comentários Professor</a>
                        </li>
                        @if($projeto->prof_aux_id)
                        <li><a class="scroll-to" href="#prof_aux">Professor Auxiliar</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!--END: Sidebar -->
        </div>
    </div>
</section>
@endsection