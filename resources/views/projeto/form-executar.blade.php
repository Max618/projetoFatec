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
            <span>Preencha o Formulário do Novo Projeto</span>
        </div>
        <div class="breadcrumb col-md-4" data-animation="fadeInDown" data-animation-delay="800">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{ route('home') }}">Home</a>
                </li>
                <li><a href="{{ route('projeto.index') }}">Projetos</a>
                </li>
                <li><a href="{{ route('projeto.create') }}">Novo Projeto</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- END: PAGE TITLE -->
@endsection

@section('content')
@if(Session::has('mensagem'))
        <div class="container">
            <div role="alert" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <strong><i class="fa fa-check-circle"></i> Mensagem!</strong> {{session('mensagem')}}
            </div>
        </div>
@endif
@endsection
