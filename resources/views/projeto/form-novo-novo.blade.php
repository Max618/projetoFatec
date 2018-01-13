@extends('layouts.model')

@section('page-title')
Criar Novo Projeto
@endsection


@section('content')
<section id="page-content">
    @if(count($errors->all()) > 0)
    @foreach($errors->all() as $error)
    <div class="container">
        <div role="alert" class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong><i class="fa fa-warning"></i> Alerta!</strong> {{ $error }}
        </div>
    </div>
    @endforeach
    @endif
    <div class="container">
        <!-- Page title -->
        <div class="page-title">
            <h1>Cadastrar Novo Projeto</h1>
            <div class="breadcrumb float-left">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li><a href="{{ route('projeto.index') }}">Projetos</a>
                    </li>
                    <li><a class="active" href="{{ route('projeto.create') }}">Novo Projeto</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: Page title -->
        <!--Castrar Projeto Form-->
        <div class="row">
            <div class="col-md-12 ">
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
                            <label class="upper" for="componente_curricular">Componente curricular</label>
                            <input type="text" class="form-control required" name="componente_curricular" placeholder="Componente Curricular" id="componente_curricular" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_alunos">Alunos por Grupo</label>
                            <select name="n_alunos" id="n_alunos">
                                <option value="">Selecione um Opção</option>
                                @for($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="n_aulas">Aulas Necessárias</label>
                            <select name="n_aulas" id="n_aulas">
                                <option value="">Selecione um Opção</option>
                                @for($i = 1; $i < 21; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="tags">Tags</label>
                            <input type="text" class="form-control required" name="tags" placeholder="Separe uma tag da outra com '/'" id="tags" aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="upper" for="cronograma">Projeto</label>
                        <textarea class="form-control required" name="projeto" rows="6" placeholder="Projeto" id="projeto" aria-required="true"></textarea>
                    </div>
                </div>
                <div id="novos_campos" class="row">

                </div>
                <div class="seperator"><span>Informações</span></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prof">Professor Resposável</label>
                            {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'id' => 'prof', 'aria-required' =>'true' ]) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="prof_email">E-mail</label>
                            {{ Form::email('email', Auth::user()->email, ['class' => 'form-control', 'id' => 'prof_email', 'aria-required' =>'true' ]) }}
                        </div>
                    </div>
                </div>
                <div class="row" id="prof_aux">

                </div>
                <button type="button" id="add_prof" class="btn btn-light btn-xs">+</button>
                <div id="add_escola" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="unidade">Unidade Escolar</label>
                            {{ Form::select('instituicao_id', $instituicoes, 'Selecione uma Unidade', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <!--<button type="button" id="add_esc" class="btn btn-light btn-xs">+</button>-->
                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label class="upper" for="img">Imagem</label>
                            {{ Form::file('imagem', ['class' => 'form-control required', 'id' => 'img']) }}
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn" type="submit"><i class="fa fa-paper-plane"></i> Enviar Projeto</button>
                            <button type="button" id="btn_add" class="btn btn-primary"> Inserir campo novo</button>
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