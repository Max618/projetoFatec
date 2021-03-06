@extends('layouts.model')

@section('page-title')
Executar Projeto
@endsection

@section('page-header')
<!-- PAGE TITLE -->
<section id="page-title">
    <div class="container">
        <div class="page-title col-md-8" data-animation="fadeInDown" data-animation-delay="300">
            <h1>Executar Projeto</h1>
            <span>Preencha o Formulário das Modificações do Projeto</span>
        </div>
        <div class="breadcrumb col-md-4" data-animation="fadeInDown" data-animation-delay="800">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{ route('home') }}">Home</a>
                </li>
                <li><a href="{{ route('projeto.index') }}">Projetos</a>
                </li>
                <li><a href="{{ route('projeto.create') }}">Executar Projeto</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: PAGE TITLE -->
@endsection

@section('content')
<div class="hr-title hr-long center"><abbr>Parte 1</abbr></div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           {!! Form::open(['route' => ['social.executar-mudancas', $projeto->id], 'methood' => 'post']) !!}
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="name">Nome do Projeto</label>
                            <input type="text" class="form-control required" name="name" placeholder="Nome Projeto" id="name" aria-required="true" value="{{ $projeto->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="descricao">Descrição</label>
                            <input type="text" class="form-control required" name="descricao" placeholder="Breve Descrição do Projeto" id="descricao" aria-required="true" value="{{ $projeto->descricao }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="questao_motriz">Questão Motriz</label>
                            <textarea class="form-control required" name="questao_motriz" rows="6" placeholder="Questão Motriz" id="questao_motriz" aria-required="true">{{ $projeto->questao_motriz }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="ancora<">Âncora</label>
                            <textarea class="form-control required" name="ancora" rows="6" placeholder="Âncora" id="ancora" aria-required="true">{{ $projeto->ancora }}</textarea>
                        </div>
                    </div>
                </div>
<div class="hr-title hr-long center"><abbr>Parte 2</abbr> </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="ambito_id">Ambito</label>
                           {!! Form::select('ambito_id', $ambitos, "$projeto->ambito['name']", ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="categoria">Categoria</label>
                            {!! Form::select('categoria_id', $categorias, "$projeto->categoria['name']", ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="eixo">Eixo</label>
                            {!! Form::select('eixo_id', $eixos, "$projeto->eixo['name']", ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="tags">Tags</label>
                            <input type="text" class="form-control required" name="tags" placeholder="Separe uma tag da outra com '/'" id="tags" aria-required="true" value="{{ $projeto->tags }}">
                        </div>
                    </div>
                </div>
<div class="hr-title hr-long center"><abbr>Parte 3</abbr></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="instituicao">Instituição</label>
                            {!! Form::select('instituicao_id', $instituicoes, "$projeto->instituicao['name']", ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prazo">Prazo</label>
                            <input type="number" class="form-control required" name="prazo" placeholder="Número de Aulas" id="prazo" aria-required="true" value="{{ $projeto->prazo }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_alunos">Número de Alunos</label>
                            <input type="number" class="form-control required" name="n_alunos" placeholder="Número Alunos" id="n_alunos" aria-required="true" value="{{ $projeto->n_alunos }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="feedback">Feedback</label>
                            <input type="text" class="form-control required" name="feedback" placeholder="Feedback" id="feedback" aria-required="true" value="{{ $projeto->feedback }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="cronograma">Cronograma</label>
                            <textarea class="form-control required" name="cronograma" rows="5" placeholder="Cronograma" id="cronograma" aria-required="true">{{ $projeto->cronograma }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="comentarios_prof">Comentários</label>
                            <textarea class="form-control required" name="comentarios_prof" rows="5" placeholder="Comentários" id="comentarios_prof" aria-required="true">{{ $projeto->comentarios_prof }}</textarea>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-12">
                       <label class="upper" for="cronograma">RESULTADO</label>
                       <textarea class="form-control required" name="resultado" rows="6" placeholder="Resultado" id="resultado" aria-required="true">{{ $projeto->resultado }}</textarea>
                   </div>
               </div>
<div class="hr-title hr-long center"><abbr>Parte 4 - Prof aux</abbr></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="name_prof">Nome</label>
                            <input type="text" class="form-control" name="name_prof" placeholder="Nome Professor Auxiliar" id="name_prof" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="email">E-mail</label>
                            <input type="email" class="form-control required" name="email" placeholder="E-mail Professor Auxiliar" id="email" aria-required="true">
                        </div>
                    </div>
                </div>
<div class="hr-title hr-long center"><abbr>Parte 5 - Imagem</abbr></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="img">Imagem</label>
                            <input type="file" class="form-control required" name="imagem" id="imagem">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn btn-primary icon-left" type="submit"><i class="fa fa-paper-plane"></i> Executar Projeto</button>
                        </div>
                    </div>
                </div>
           <!-- </form> -->
           {!! Form::close() !!}
        </div>
    </div>
@endsection
