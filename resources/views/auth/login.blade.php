@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-8 prepend-2 form_box">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h2>Connectez-vous</h2>
                    <label for="email" class="col-md-4 control-label">Adresse email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    <button type="submit" class="mb-10">
                        <span>Se connecter</span>
                    </button>

                    <a class="btn btn-link center mt-10" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>

                </form>
            </div>
    </div>
</div>
@endsection
