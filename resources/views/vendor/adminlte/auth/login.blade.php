@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Inicio de Sesion
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="panel panel-default">
                <div class="login-logo">
                    <a href="{{ url('/home') }}"><b>Abc</b>-Simple</a>
                </div><!-- /.login-logo -->

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif

                <div class="login-box-body">
                    <form class="form-horizontal" method="post"  action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                                    </label>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                            </div><!-- /.col -->
                            @include('adminlte::auth.partials.social_login')
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
