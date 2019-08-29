@extends('componentes.headerindex')
@section('content')
<div class="container" style="margin-top:130px; margin-bottom:65px;">
    <div class="row justify-content-center">
        <div class="" style="text-align:center;">
        <div class="panel-heading"style="margin-bottom:35px; font-weight: bold;">Restablecer clave</div>
            <div class="panel panel-default">
                <div class="panel-body" >
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Correo electronico</label>

                            <div class="col-md-12">
                                <input style="widht:200px;" id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Clave</label>

                            <div class="col-md-12">
                                <input style="width:300px;" id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-12 control-label">Confirmar Clave</label>
                            <div class="col-md-12">
                                <input style="widht:200px;" id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Clave
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
