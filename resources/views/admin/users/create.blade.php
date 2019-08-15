@extends('admin.header')

@section('main-content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registrar Usuario</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="/users/" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="varchar">Nombre</label>
                            <input  type="text" name="nombre" class="form-control" placeholder="Nombre" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Email</label>
                            <input type="text" name="email" class="form-control"  placeholder="Correo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña"/>
                        </div>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection