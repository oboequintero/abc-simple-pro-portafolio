@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Tablas Tipos Tarjeta
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
              <h3 class="box-title">Tipos Tarjeta</h3>
						<div class="col-xs-1 col-md-1">
							<form  method="GET" action="{{ route('tipo_tarjeta.create') }}">
									<input name="_method" type="hidden" value="GET">
									<button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Ingresar Tarjeta" ><i class="glyphicon glyphicon-plus"></i></button>
							</form>
						</div>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
                @if($data)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr><th>Nombre</th>
							
							<th>Activo</th>
							
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{ $row->nombre }}</td>
								
								<td>@if ($row->activo == 1)
											SI
							  		@endif
							  		@if ($row->activo == 0)
											NO
							 	 	@endif	
								</td>
								
                               
                                <td style="width:100px;">
                                    <a href="{{ route('tipo_tarjeta.edit',$row->id_t_tarjeta) }}" class="btn btn-xs btn-info">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    
                                </td>
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
    <script type="text/javascript">
        function Eliminar(id,i) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var parametros = {
                "identidad" : id,
                'token': "token"
                };

            var opcion = confirm("Está seguro de Eliminar?");
            if (opcion === true) {
                $.ajax({
                    data:  parametros,
                    url:   'elimi_id',
                    type:  'post',
                    async:  false,
                    dataType: "json",
                error: function() {
                    alert('Ha surgido un error');
                },
                success:  function (data) {
                    document.getElementsByTagName("table")[0].setAttribute("id","tabla");
                    document.getElementById("tabla").deleteRow(i);
                    alert('Elemento eliminado correctamente');
                }
                });
            }
        }
    </script>
@endsection

