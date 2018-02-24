<!DOCTYPE html>
<html lang="pt-br">

<head>
</head>
<body class="wide">
<div class="wrapper">
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
                            </div>
                        </div>
        </div>
    </div>
</section>
</div>
</body>

</html>