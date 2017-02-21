@extends('layouts.model')

@section('page-title')
Login
@endsection

@section('content')
<div class="container">
<!--Login Form-->
    <div class="hr-title hr-long center"><abbr>Login Form</abbr> </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="sr-only">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-inline form-group">
                            <button type="submit" class="button border effect fill-vertical"><span>Login</span></button>
                                <div class="checkbox float-right">
                                    <label class="no-margin">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                        <small> Remember me</small> 
                                    </label>
                                </div>
                        </div>
                            <a class="" href="{{ route('password.request') }}"><small>Forgot Your Password?</small></a>
                    </form>
            <div class="hr-title hr-long center"><abbr>Ou</abbr> </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="social-icons  social-icons-large social-icons-border social-icons-colored-hover">
                        <ul>
                            {!! Form::open(['route' => ['loginSocial', 'facebook'], 'method' => 'get'], ['class' => 'form-horizontal', 'panel-body']) !!}
                            <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i><span>Teste</span></a></li>
                              <li>  {!! Form::submit('login facebook', ['class' => 'form-control']) !!} </li>
                            <li>
                <a href="https://www.facebook.com/pages/wowthemesnet/562560840468823" class="btn btnghost btn-lg"><i class="fa fa-facebook fa-fw"></i><span class="network-name">Facebook</span></a>
                </li>
                            
                            {!! Form::close() !!}
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
