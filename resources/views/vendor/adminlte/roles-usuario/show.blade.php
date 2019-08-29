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
        @hasrole('super-admin')
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Roles Usuarios</h3>

            </div>
            <!-- /.box-header -->

            <div class="box-body">
            	@if($data)
				<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nombre Usuario</th>
						<th>Email</th>
						<th>Nombre Rol</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($data as $row)
					<tr>
						<td>{{ $row->nombre_U }}</td>
						<td>{{ $row->email_U }}</td>
						<td>{{ $row->nombre_R }}</td>
						<td>
						<form action="{{ route('roles-usuario.destroy',$row->id) }}" method="post">
								<input name="_method" type="hidden" value="DELETE">
								<input name="id_usuario" type="hidden" value="{{ $id }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</td>
						<td></td>
					</tr>
				</tbody>
				@endforeach
			</table>
            @endif
        </div>
        <form  method="GET" action="{{ route('roles-usuario.create') }}">
			<input name="_method" type="hidden" value="GET">
			<input name="id_usuario" type="hidden" value="{{ $id }}">
			<button type="submit" class="btn btn-lg btn-primary">Administrar</button>
	    </form>
        <!-- /.box-body -->
      </div>
      @else
            <h3 class="container-fluid"><strong> {{Auth::user()->getRoleNames()}}  No tiene permiso administrar Roles</strong></h3>
      @endrole
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

