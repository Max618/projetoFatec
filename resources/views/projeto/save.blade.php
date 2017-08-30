

@section('page-title')
   //salvar | {{ $projeto->name }}
@endsection
{{ $projeto->name  }}

    <section class="content">
        <div class="container">
            <div class="row">
                <!-- Blog post-->
                <div class="post-content post-content-single col-md-9">
                    <!-- Post item-->
                    <div class="post-item">
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
            </div>
        </div>
    </section>
