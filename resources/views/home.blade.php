@extends('layouts.model')

@section('page-title')
Logado
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
<section class="p-t-60">
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
