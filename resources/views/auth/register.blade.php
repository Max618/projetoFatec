@extends('layouts.model')

@section('page-title')
Criar uma Nova Conta
@endsection

@section('content')
<section>
    <div class="container">
    <!--Register Form-->
        <div class="row">
            <div class="col-md-6 center no-padding">
                <div class="col-md-12">
                    <h3>Registrar uma Nova Conta</h3>
                    <p></p>
                </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="sr-only">Nome</label>

                                    <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome">

                                    @if ($errors->has('name'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('name') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">E-Mail</label>

                                    <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required placeholder="E-mail">

                                    @if ($errors->has('email'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('email') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Senha</label>

                                    <input id="password" type="password" class="form-control input-lg" name="password" required placeholder="Senha">

                                    @if ($errors->has('password'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('password') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="password-confirm" class="sr-only">Confirmar Senha</label>

                                    <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required placeholder="Confirmar Senha">
                            </div>

                            <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-default button">
                                        Registrar
                                    </button>
                            </div>
                        </form>
            </div>
        </div>
    <!--END: Register Form-->
    <!--Social Login Form-->
                    <div class="hr-title hr-long center"></div>
                        <div class="row">
                            <div class="col-md-5 center no-padding">
                                <div class="panel-body">
                                <ul class="list-inline">
                                    <li><a class="btn btn-facebook" href="{{ route('loginSocial', 'facebook')}}"><span><i class="fa fa-facebook"></i>Facebook</span></a></li>
                                    <li><a class="btn btn-googleplus" href="{{ route('loginSocial', 'google')}}"><span><i class="fa fa-google-plus"></i>Google+</span></a></li>
                                    <li><a class="btn btn-twitter" href="{{ route('loginSocial', 'twitter')}}"><span><i class="fa fa-twitter"></i>Twitter</span></a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    <!--END: Social Login Form-->
</section>
@endsection
