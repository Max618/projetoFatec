@extends('layouts.model')

@section('page-title')
Login
@endsection

@section('content')
<section class="p-t-60">
    <div class="container">
    <!--Reset Password Form-->
        <div class="hr-title hr-long center"><abbr>Resetar senha</abbr> </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                        @if (session('status'))
                        <p>
                        <div role="alert" class="alert alert-sucess alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                            <strong>{{ session('status') }}</strong> 
                        </div>
                        </p>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">E-Mail Address</label>

                                <div class="col-md-12">
                                    <input id="email" placeholder="E-mail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <p>
                                    <div role="alert" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <strong>{{ $errors->first('email') }}</strong> 
                                    </div>
                                    </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        Eviar Link de Reset da Senha
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
    <!--END: Reset Password Form-->
            </div>
    </div>
</section>
@endsection
