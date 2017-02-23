@extends('layouts.model')

@section('page-title')
Logado
@endsection

@section('content')
<section class="p-t-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        <a href="{{ route('projeto.create') }}">Novo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
