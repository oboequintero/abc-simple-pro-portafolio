@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Limite Transacciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('idioma.index') }}"></i> Idioma: Todos </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Limite Transacciones Registrados</h3>
						<div class="col-xs-1 col-md-1">
							<form  method="GET" action="{{ route('limite_transacciones.create') }}">
									<input name="_method" type="hidden" value="GET">
									<button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Ingresar Limite" ><i class="glyphicon glyphicon-plus"></i></button>
							</form>
						</div>
            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            <div class="box-body">
                @if($data)
				<table class="table">
					<thead>
						<tr>
							<th>Límite</th>
							<th>Activo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
							<tr>
								<td>{{ $row->limite }}</td>
								<td>@if ($row->activo == 1)
											SI
							  		@endif
							  		@if ($row->activo == 0)
											NO
							 	 	@endif	
								</td>
								<td style="width:30px;">
									<a href="{{ route('limite_transacciones.edit',$row->id_l_trans) }}" class="btn btn-info">
										<i class="glyphicon glyphicon-pencil"></i>
									</a>
								</td>
								<td></td>
							</tr>
						@endforeach
					</tbody>	
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
