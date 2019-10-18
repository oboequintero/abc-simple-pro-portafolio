
@extends('componentes.headerindex')
@section('content')
<div class="container" style="margin-bottom:65px;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                <form method="POST" action="{{ route('cliente.register.post') }}" class="ajustargrande" style="background-color:#ffffff; padding:15px; border-radius:20px; text-align:center;">
                {{ csrf_field() }}
                <p style="font-weight: bold; color:#d21e62; font-size:37px; text-align:center;">INSCRÍBETE</p>
                <p style="font-weight: bold; font-size:23px; color:#464646; text-align:center;">Comience a aprender ingles AHORA</p>
                <div class="alert alert-danger" id="divAlert8" style="display:none;"></div>
                <div class="alert alert-success" id="divAlert9" style="display:none;">Logueado con exito!</div>
                <div class="row">
                  <div class="col-md-6">
                    <fieldset class="form-group" style="text-align:left;">
                      <label for="first_name" style="color:#464646;">Nombre</label>
                      <input type="text" class="form-control" id="namec" name="namec" required>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="form-group" style="text-align:left;">
                      <label for="last_name" style="color:#464646;">Apellido</label>
                      <input type="text" class="form-control" id="last_namec" name="last_namec" required>
                    </fieldset>
                  </div>
                </div>
                <fieldset class="form-group" style="text-align:left;">
                  <label for="last_name" style="color:#464646;">Email</label>
                  <input type="email" class="form-control" id="emailc" name="emailc" required>
                </fieldset>
                <fieldset class="form-group" style="text-align:left;">
                  <label for="last_name" style="color:#464646;">Telefono</label>
                  <input type="phone" class="form-control required number" id="phonec" name="phonec" required>
                </fieldset>
                <fieldset class="form-group" style="text-align:left;">
                  <label for="password" style="color:#464646;">CONTRASENA</label>

                  <div class='input-group'>
                    <input class="form-control" type="password" name="passwordc" id="passc" aria-describedby='show' required>
                    <div class='input-group-prepend'>
                        <span class="input-group-text fa fa-eye" style='margin-top:-10px' id="show"></span>
                    </div>
                  </div>

                </fieldset>
                <div class="form-group text-center">
                  <div class="checkbox">
                    <label style="color:#464646; font-size:12px;"><input type="checkbox" {{ old('remember') ? 'checked' : '' }} checked value="">ENVÍENME NOTICIAS Y PROMOCIONES POR EMAIL</label>
                  </div>
                </div>
                <button type="button" id="submit5" class="btn btn-primary" style="background-color:#0e9a9d; font-weight: bold; font-size:25px; padding-left:45px; padding-right:45px; border-radius:10px;">Empezar</button>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
