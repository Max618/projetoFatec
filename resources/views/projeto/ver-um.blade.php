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
            'December' => 'Dezembro'
        );
        return $mes_extenso[$mes];
    }
@endphp

@section('content')
<section class="content">
    <div class="container">
             
            <!-- Blog post-->
            <div class="post-content post-content-single post-modern">
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
                            <span class="post-autor"><strong>Postado por: </strong><a href="#">{{ $projeto->user['name'] }}</a></span>
                            <span class="post-category"><strong>de </strong><a href="#">{{ $projeto->instituicao['name'] }}</a></span><br>
                            <span class="post-category"><strong>Categoria:</strong> <a href="#">{{ $projeto->categoria['name'] }},</a></span>
                            <span class="post-category"><strong>Ambito: </strong><a href="#">{{ $projeto->ambito['name'] }},</a></span>
                            <span class="post-category"><strong>Eixo: </strong><a href="#">{{ $projeto->eixo['name'] }},</a></span>
                            <span class="post-category"><strong>Tags: </strong><a href="#"></span>
                            <span class="label label-default">{{ $projeto->tags }}</span></a>
                        </div>

                        <div class="seperator"></div>

                        <div class="post-description">
                            <h3>Descrição: </h3>
                            <p>{{ $projeto->descricao }}</p>
                            <div class="seperator"></div>
                            
                            <h3>Cronograma: </h3>
                            <p>{{ $projeto->cronograma }}</p>
                            <div class="seperator"></div>

                            <h3>Âncora: </h3>
                            <p>{{ $projeto->ancora }}</p>
                            <div class="seperator"></div>
                            
                            <h3>Questão Motriz: </h3>
                            <p>{{ $projeto->questao_motriz }}</p>
                            <div class="seperator"></div>

                            <h3>Número de Alunos por Grupo: </h3>
                            <p>{{ $projeto->n_alunos }}</p>
                            <div class="seperator"></div>

                            <h3>Prazo de Aulas: </h3>
                            <p>{{ $projeto->prazo }}</p>
                            <div class="seperator"></div>

                            <h3>FeedBack: </h3>
                            <p>{{ $projeto->feedback }}</p>
                            <div class="seperator"></div>

                            <h3>Resultado: </h3>
                            <p>{{ $projeto->resultado }}</p>
                            <div class="seperator"></div>

                            <h3>Comentários do Professor: </h3>
                            <p>{{ $projeto->comentarios_prof }}</p>
    
                            @if($projeto->prof_aux_id)
                            <div class="seperator"></div>
                            <h3>Profesor Auxiliar: </h3>
                            <p><strong>Nome:</strong> {{ $projeto->prof_aux['name_prof'] }}<br>
                            <strong>Email:</strong> {{ $projeto->prof_aux['email'] }}</p>
                            @endif

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
                                    <span class="post-comments-number">@if($projeto->total_curtidas){{ $projeto->total_curtidas }}@else 0 @endif</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-comments-o"></i>
                                    <span class="post-comments-number">@if($projeto->total_coments){{ $projeto->total_coments }}@else 0 @endif</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="post-comments-number">@if($projeto->total_comp){{ $projeto->total_comp }}@else 0 @endif</span>
                            </div>
                            <div class="post-comments">
                                    <i class="fa fa-eye"></i>
                                    <span class="post-comments-number">@if($projeto->total_visualizacao){{ $projeto->total_visualizacao }}@else 0 @endif</span>
                            </div>
                        </div>
                </div>
                
                <!-- Comments-->
                <div id="comments" class="comments">
                    <div class="heading">
                        <h4 class="comments-title">Comentários <small class="number">({{ $projeto->total_coments }})</small></h4>
                    </div>


                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/1.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Alea Grande</h4>
                            <p class="time">Feb 25, 2015 at 9:30 PM</p>
                            <p>Maecenas nec iaculis turpis, eget congue massa. Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>

                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/2.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Juna Smith</h4>
                            <p class="time">Jan 18, 2015 at 10:30 PM</p>
                            <p>Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>



                        <div class="comment comment-replied">
                            <a href="#" class="pull-left">
                                <img alt="" src="images/team/3.jpg" class="avatar">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Ariol Smith</h4>
                                <p class="time">Jun 24, 2015 at 14:28 PM</p>
                                <p>Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue.</p>
                                <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment">
                        <a href="#" class="pull-left">
                            <img alt="" src="images/team/4.jpg" class="avatar">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Dia Perry</h4>
                            <p class="time">Jun 24, 2015 at 14:28 PM</p>
                            <p>Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Donec mollis semper rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed euismod neque. Aliquam eget malesuada enim, eu interdum elit. Sed sagittis ornare velit a congue. Sed sagittis ornare velit a congue. Maecenas nec iaculis turpis, eget congue massa. Ut ultrices consectetur eleifend. Nullam nisl dui, congue in mi non, dapibus adipiscing metus. </p>
                            <a href="#" class="comment-reply pull-right"><i class="fa fa-reply"></i> Reply</a>
                        </div>
                    </div>

                </div>
                <div class="comment-form">
                    <div class="heading">
                        <h4>Leave a comment</h4>
                    </div>
                    <form class="form-gray-fields">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="upper">Your Name</label>
                                    <input type="text" aria-required="true" id="name" placeholder="Enter name" name="senderName" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="upper">Your Email</label>
                                    <input type="email" aria-required="true" id="email" placeholder="Enter email" name="senderEmail" class="form-control required email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="upper">Your Phone</label>
                                    <input type="text" aria-required="true" id="phone" placeholder="Enter phone" name="phone" class="form-control required">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" class="upper">Your comment</label>
                                    <textarea aria-required="true" id="comment" placeholder="Enter comment" rows="9" name="comment" class="form-control required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Post comment</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- END: Comments-->
            </div>
            <!-- END: Blog post-->

    </div>
</section>
@endsection