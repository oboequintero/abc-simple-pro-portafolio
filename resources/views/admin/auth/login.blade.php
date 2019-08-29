@extends('admin.layout.header-login')
@section('main-content')
 <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img class="logo" src="/assets/images/abc.png" alt="">
            <form  method="POST" action="{{ route('admin.login.post') }}" aria-label="{{ __('Login') }}">
                {{ csrf_field() }}
              <h1>Inicio de Sesion</h1>
              <div>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email"/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
              <div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" />
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
                <div class="checkbox">
                    <label>
                       <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
              <div>
                <button class="btn btn-default submit" type="submit">Iniciar Sesión</button>
                <a href="{{ route('password.request') }}" class="reset_pass">Olvidaste tu Clave?</a>
              </div>
            </form>
            <div>
              <a href="{{url('/admin/register') }}">Nuevo Usuario</a>
            </div>
          </section>
        </div>
      </div>
    </div>
@endsection

