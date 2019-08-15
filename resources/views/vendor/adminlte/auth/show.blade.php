@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Tablas de Usuarios
        <small>Lista</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Usuarios</h3>
						<div class="col-xs-1 col-md-1">
							<form  method="GET" action="{{ route('cr-u') }}">
									<input name="_method" type="hidden" value="GET">
									<button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Ingresar Usuario" ><i class="glyphicon glyphicon-plus"></i></button>
							</form>
						</div>
            </div>
	            <!-- /.box-header -->
          <div class="box-body">
		@if($data)
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($data as $row)
					<tr>
						<td>{{ $row->name }}</td>
						<td>{{ $row->email }}</td>
						<td style="width:30px;"><a href="{{ route('auth.edit',$row->id) }}" class="btn btn-info">Editar</a></td>
						<td style="width:30px;"><a href="{{ route('roles-usuario.show',$row->id) }}" class="btn btn-warning">Asignar Rol</a></td>
						<td></td>
					</tr>
				</tbody>
				@endforeach
			</table>
			@endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
