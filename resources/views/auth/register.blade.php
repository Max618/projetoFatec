@extends('layouts.model')

@section('page-title')
Registrar
@endsection

@section('content')
<section class="p-t-60">
    <div class="container">
    <!--Register Form-->
        <div class="hr-title hr-long center"><abbr>Registrar</abbr> </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="sr-only">Nome</label>

                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome">

                                    @if ($errors->has('name'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('name') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">E-Mail</label>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-mail">

                                    @if ($errors->has('email'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('email') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Senha</label>

                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                                    @if ($errors->has('password'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('password') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="sr-only">Confirmar Senha</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Senha">
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary button icon-left"><span><i class="fa fa-edit"></i>
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
    <!--END: Register Form-->
    <!--Social Login Form-->
                    <div class="hr-title hr-long center"><abbr>Ou</abbr></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                <ul class="list-inline">
                                    <li><a class="button blue-dark rounded icon-left" href="{{ route('loginSocial', 'facebook')}}"><span><i class="fa fa-facebook"></i>Facebook</span></a></li>
                                    <li><a class="button red-dark rounded icon-left" href="{{ route('loginSocial', 'google')}}"><span><i class="fa fa-google-plus"></i>Google+</span></a></li>
                                    <li><a class="button blue rounded icon-left" href="{{ route('loginSocial', 'twitter')}}"><span><i class="fa fa-twitter"></i>Twitter</span></a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    <!--END: Social Login Form-->
            </div>
    </div>
</section>
@endsection
