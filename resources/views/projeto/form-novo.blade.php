@extends('layouts.model')

@section('page-title')
Criar Novo Projeto
@endsection

@section('page-header')
<section id="page-title" class="page-title-parallax page-title-center text-dark" style="background-image:url(/images/parallax/page-title-parallax.jpg);">
    <div class="container">
        <div class="page-title col-md-8">
            <h1>Cadastrar Novo Projeto</h1>
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
<section class="p-t-60">
@if(Session::has('sucesso'))
    <div class="container">
        <div role="alert" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong><i class="fa fa-check-circle"></i> Sucesso!</strong> {{session('sucesso')}}
        </div>
    </div>
@elseif(Session::has('erro'))
    <div class="container">
        <div role="alert" class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong><i class="fa fa-warning"></i> Erro!</strong> {{session('erro')}}
        </div>
    </div>
@endif
<!--Castrar Projeto Form-->
<div class="hr-title hr-long center"><abbr>Parte 1</abbr></div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <!-- <form action="{{ route('projeto.store') }}" method="POST"> -->
           {!! Form::open(['route' => 'projeto.store', 'methood' => 'post']) !!}
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="name">Nome do Projeto</label>
                            <input type="text" class="form-control required" name="name" placeholder="Nome Projeto" id="name" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="descricao">Descrição</label>
                            <input type="text" class="form-control required" name="descricao" placeholder="Breve Descrição do Projeto" id="descricao" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="questao_motriz">Questão Motriz</label>
                            <textarea class="form-control required" name="questao_motriz" rows="6" placeholder="Questão Motriz" id="questao_motriz" aria-required="true"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="ancora<">Âncora</label>
                            <textarea class="form-control required" name="ancora" rows="6" placeholder="Âncora" id="ancora" aria-required="true"></textarea>
                        </div>
                    </div>
                </div>
<div class="hr-title hr-long center"><abbr>Parte 2</abbr> </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="ambito_id">Ambito</label>
                           {!! Form::select('ambito_id', $ambitos, 'Selecione', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="categoria">Categoria</label>
                            {!! Form::select('categoria_id', $categorias, 'Selecione', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="eixo">Eixo</label>
                            {!! Form::select('eixo_id', $eixos, 'Selecione', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="tags">Tags</label>
                            <input type="text" class="form-control required" name="tags" placeholder="Nome Projeto" id="tags" aria-required="true">
                        </div>
                    </div>
                </div>
<div class="hr-title hr-long center"><abbr>Parte 3</abbr></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="instituicao">Instituição</label>
                            {!! Form::select('instituicao_id', $instituicoes, 'Selecione', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prazo">Prazo</label>
                            <input type="number" class="form-control required" name="prazo" placeholder="Número de Aulas" id="prazo" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_alunos">Número de Alunos</label>
                            <input type="number" class="form-control required" name="n_alunos" placeholder="Número Alunos" id="n_alunos" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="feedback">Feedback</label>
                            <input type="text" class="form-control required" name="feedback" placeholder="Feedback" id="feedback" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="cronograma">Cronograma</label>
                            <textarea class="form-control required" name="cronograma" rows="5" placeholder="Cronograma" id="cronograma" aria-required="true"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="comentarios_prof">Comentários</label>
                            <textarea class="form-control required" name="comentarios_prof" rows="5" placeholder="Comentários" id="comentarios_prof" aria-required="true"></textarea>
                        </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn btn-primary icon-left" type="submit"><i class="fa fa-paper-plane"></i> Enviar Projeto</button>
                        </div>
                    </div>
                </div>
           <!-- </form> -->
           {!! Form::close() !!}
        </div>
    </div>
<!--END: Castrar Projeto Form-->
</section>
@endsection