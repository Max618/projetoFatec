@extends('layouts.model')

@section('page-title')
Login
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel ">
                    <div class="panel-body"><h3>Login</h3>
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

                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                                    @if ($errors->has('password'))
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('password') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                            </div>

                            <div class="form-group form-inline m-b-10 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><small> Continuar conectado</small>
                                    </label>
                                </div>
                                        <a class="right" href="{{ route('password.request') }}"><small>Esqueceu sua senha?</small></a>
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default"><span>Login</span></button>
                                </div>

                        </form>
                    </div>
                </div>

    <!--END: Login Form-->
    <!--Social Login Form-->
                    <div class="hr-title hr-long center"></div>
                        <div class="row">
                            <div class="col-md-12">
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
            </div>
    <!--END: Social Login Form-->
            </div>
    </div>
</section>
@endsection
