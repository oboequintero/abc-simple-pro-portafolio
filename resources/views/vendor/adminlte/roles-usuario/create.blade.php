@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Roles Usuario
        <small>anterior</small>
      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h4><a href="{{ route('roles-usuario.show',$id) }}">Listar Roles-Usuarios</a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

		<form method="post" action="{{ route('crear-ru') }}" 
			accept-charset="UTF-8" enctype="multipart/form-data">
			<input name="_method" type="hidden" value="GET">
           		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input name="id_usuario" type="hidden" value="{{ $id }}">
			<div  class="form-group">
					<label>SELECCIONE EL ROL DEL USUARIO</label>
					<select name="lista_id_rol" class="form-control">
						@foreach($roles as $row)
							<option>{{$row->name}}</option>
						@endforeach
					</select>
			</div>
			<div class="col-lg-12 espacio"></div>
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
			</div>
		</form>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection
