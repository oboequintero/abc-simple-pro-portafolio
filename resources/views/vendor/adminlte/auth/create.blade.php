@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Crear Usuario
        <small>Anterior</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
              <!-- left column -->
        <div class="col-md-12">
                    <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Usuario</h3>
                <h3 class="box-title"></h3>
            </div>
                      <!-- /.box-header -->
                      <!-- form start -->
        @hasrole('super-admin')
        	<form method="post" action="{{ route('crear-us') }}"
				 accept-charset="UTF-8" enctype="multipart/form-data">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               			 <input name="_method" type="hidden" value="GET">
				<div class="form-group">
					<label for="exampleInputEmail">NOMBRE</label>
					<input type="text" name="nombre" class="form-control" placeholder="NOMBRE">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail">EMAIL</label>
					<input type="text" name="email" class="form-control" placeholder="EMAIL">
				</div>
				<div class="form-group">
				    <label for="exampleInputpassword">CONTRASEÑA</label>
					<input type="password" name="password" class="form-control" placeholder="CONTRASEÑA">
				</div>
				<div class="form-group">
					<label for="exampleInputpasswordR">REPETIR CONTRASEÑA</label>
					<input type="password" name="passwordR" class="form-control" placeholder="REPETIR CONTRASEÑA">
				</div>
				<div class="col-lg-12 espacio"></div>
				<div class="col-md-4 col-md-offset-4">
					<button class="btn btn-lg btn-primary btn-block" type="submit" >Registrar</button>
				</div>
            </form>
        @else
            <h3 class="container-fluid"><strong> {{Auth::user()->getRoleNames()}}  No tiene permiso de crear usuario</strong></h3>
        @endrole
		</div>
        </div>

    <!-- /.box -->
        </div>
    <!-- /.box-body -->
    </div>
<!-- /.box -->
</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</section>
@endsection

