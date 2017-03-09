@extends('layouts.model')

@section('page-title')
Logado
@endsection

@section('page-header')
<!-- PAGE TITLE -->
<section id="page-title">
    <div class="container">
        <div class="page-title col-md-8" data-animation="fadeInDown" data-animation-delay="300">
            <h1>Bem-vindo, {{ auth()->user()->name }}!</h1>
            <span>Este é o seu perfil, onde você pode editar e alterar seus dados</span>
        </div>
        <div class="breadcrumb col-md-4" data-animation="fadeInDown" data-animation-delay="800">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{ route('home') }}">Home</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: PAGE TITLE -->
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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        <br>
                        <a href="{{ route('projeto.create') }}">Novo</a>
                        <br>
                        <a href="{{route('projeto.index')}}">Ver Todos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
