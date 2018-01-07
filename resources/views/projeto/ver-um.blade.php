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
                <li><a class="scroll-to" href="#cronograma">Cronograma</a> </li>
                <li><a class="scroll-to" href="#ancora">Âncora</a> </li>
                <li><a class="scroll-to" href="#questao_motriz">Questão Motriz</a> </li>
                <li><a class="scroll-to" href="#n_alunos">Número de Alunos</a> </li>
                <li><a class="scroll-to" href="#prazo">Prazo</a> </li>
                <li><a class="scroll-to" href="#feedback">FeedBack</a> </li>
                <li><a class="scroll-to" href="#resultado">Resultado</a> </li>
                <li><a class="scroll-to" href="#comentarios_prof">Comentários Professor</a></li>
                @if($projeto->prof_aux_id)
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
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="/images/blog/1.jpg">
                                </a>
                            </div>
                        <div class="post-item-description">
                            <h1>{{ $projeto->name }}</h1>
                            <div class="post-meta">
                                <i class="fa fa-user"></i>
                                <span class="post-autor"><strong>Postado por: </strong><a href="#">{{ $projeto->user['name'] }}</a></span>
                                <span class="post-category"><strong>de </strong><a href="#">{{ $projeto->instituicao['name'] }}</a></span>
                                <i class="fa fa-tags"></i>
                                <span class="post-category"><strong>Categoria:</strong> <a href="#">{{ $projeto->categoria['name'] }},</a></span>
                                <span class="post-category"><strong>Ambito: </strong><a href="#">{{ $projeto->ambito['name'] }},</a></span>
                                <span class="post-category"><strong>Eixo: </strong><a href="#">{{ $projeto->eixo['name'] }},</a></span>
                                <div class="post-meta-share">
                                    <a class="btn btn-xs btn-slide btn-facebook" target='_blank' href="{{ route('social.compartilhar', ['provider' =>'facebook', 'id' => $projeto->id] ) }}">
                                        <i class="fa fa-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                    <a class="btn btn-xs btn-slide btn-twitter" target='_blank' href="{{ route('social.compartilhar', ['provider' =>'twitter', 'id' => $projeto->id] ) }}" data-width="100">
                                        <i class="fa fa-twitter"></i>
                                        <span>Twitter</span>
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
                        <div class="post-tags">
                            @foreach($projeto->tags() as $tag)
                            <a href="#">{{ $tag }}</a>
                            @endforeach
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
                    <!--widget newsletter-->
                    <div class="widget  widget-newsletter">

                        <form id="widget-search-form-sidebar" action="search-results-page.html" method="get" class="form-inline">
                            <div class="input-group">
                                <input type="text" aria-required="true" name="q" class="form-control widget-search-form" placeholder="Search for pages...">
                                <span class="input-group-btn">
                  <button type="submit" id="widget-widget-search-form-button" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </span> </div>
                        </form>
                    </div>
                    <!--end: widget newsletter-->

                    <!--Tabs with Posts-->
                    <div class="widget">
                        <div id="tabs-01" class="tabs simple">
                            <ul class="tabs-navigation">
                                <li class="active"><a href="#tab1">Popular</a> </li>
                                <li class=""><a href="#tab2">Featured</a> </li>
                                <li class=""><a href="#tab3">Recent</a> </li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="post-thumbnail-list">
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/5.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Suspendisse consectetur fringilla luctus</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 6m ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/6.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/7.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="post-thumbnail-list">
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/6.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/7.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/8.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Fringilla luctus Lorem ipsum dolor sit amet</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="post-thumbnail-list">
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/7.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/8.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Fringilla luctus Lorem ipsum dolor sit amet</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 11h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail-entry">
                                            <img alt="" src="images/blog/thumbnail/6.jpg">
                                            <div class="post-thumbnail-content">
                                                <a href="#">Consectetur adipiscing elit</a>
                                                <span class="post-date"><i class="fa fa-clock-o"></i> 24h ago</span>
                                                <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                            </div>
                                        </div>
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