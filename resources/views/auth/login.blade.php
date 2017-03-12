@extends('layouts.model')

@section('page-title')
Login
@endsection

@section('content')
<section class="p-t-60">
    <div class="container">
    <!--Login Form-->
        <div class="hr-title hr-long center"><abbr>Login</abbr> </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                                <label for="email" class="sr-only">E-Mail Address</label>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                    @if ($errors->has('email'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('email') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                                <label for="password" class="sr-only">Password</label>

                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('password') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-inline form-group">
                                <button type="submit" class="btn btn-primary button icon-left"><span><i class="fa fa-sign-in"></i>Login</span></button>
                                    <div class="checkbox float-right">
                                        <label class="no-margin">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                            <small>Continuar conectado</small> 
                                        </label>
                                    </div>
                            </div>
                                <a class="" href="{{ route('password.request') }}"><small>Esqueceu sua senha?</small></a>
                        </form>
    <!--END: Login Form-->
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
@endsection
