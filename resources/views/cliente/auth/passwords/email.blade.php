@extends('componentes.headerindex')
@section('content')
<div class="container" style="margin-top:230px; margin-bottom:65px;">
      <div class="row justify-content-center">
          <div class="" style="text-align:center;">
              <div class="panel panel-default">
                  <div class="panel-heading">Restablecer Password</div>
                  <div class="panel-body">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif

                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente/password/email') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="control-label">Direccion E-Mail</label>

                              <div class="">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="">
                                  <button type="submit" class="btn btn-primary">
                                      Enviar Enlace de Recuperacion
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="container" style="margin-top:220px;">
    </div>
@endsection
