@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Editar de Usuario
        <small>Usuario</small>
      </h1>
    </section>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Main content -->
    <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Editar Usuario</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->

			<form method="post" action="{{ route('auth.update', $user->id ) }}"
		                accept-charset="UTF-8" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="exampleInputEmail">NOMBRE</label>
					<input type="text" name="nombre" class="form-control" placeholder="NOMBRE" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail">EMAIL</label>
					<input type="text" name="email" class="form-control" placeholder="EMAIL" value="{{ $user->email }}">
				</div>
				<div class="form-group">
				    <label for="exampleInputpassword">CONTRASEÑA</label>
					<input id="password" type="password" name="password" class="form-control" placeholder="CONTRASEÑA" required>
				</div>
				<div class="form-group">
					<label for="exampleInputpasswordR">REPETIR CONTRASEÑA</label>
					<input id="passwordR" type="password" name="passwordR" class="form-control" placeholder="REPETIR CONTRASEÑA" required>
				</div>
				<div class="col-lg-12 espacio"></div>
				<div class="col-md-4 col-md-offset-4">
					<button id="boton_enviar" class="btn btn-lg btn-primary btn-block" type="submit" >Registrar</button>
				</div>
            </form>

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
<script>

    $( document ).ready(function() {
         $("#boton_enviar").click(function(event) {
            if($( "#passwordR" ).val() != $( "#password" ).val() ){
                event.preventDefault();
                alert( "La confirmación no coincide" );
            }

        });
    });

</script>

</section>
@endsection
