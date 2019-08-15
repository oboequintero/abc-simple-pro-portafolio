@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Cursos
        <small>lista</small>
      </h1>
      <ol class="breadcrumb">
    	<input name="id_idioma" type="hidden" value="{{ $id_idioma }}">
        @if($id_idioma == 0)
            <li><a href="{{ route('idioma.index') }}"></i> Idioma: Todos </a></li>
		@else
            <li><a href="{{ route('idioma.index') }}"></i> Idioma: {{$idioma->nombre}} </a></li>
        @endif
            <li><a href="{{ route('curso.index') }}">Curso: Todos</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cursos Registrados</h3>
						<div class="col-xs-1 col-md-1">
							<form  method="GET" action="{{ route('crear-c') }}">
								<input name="_method" type="hidden" value="GET">
								<input name="id_idioma" type="hidden" value="{{ $id_idioma }}">
								<button type="submit" class="btn btn-xs  btn-primary" data-toggle="tooltip" title="Ingresar Curso" ><i class="glyphicon glyphicon-plus"></i></button>
							</form>
						</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	@if($data)
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Precio</th>
								<th>Activo</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $row)
							<tr>
								<td>{{ $row->codigo }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->descripcion }}</td>
								<td style="text-align:right;">{{ number_format($row->precio, 2) }}</td>
                                <td  style="text-align:center;  " >
                                    <a href="#" readonly>
                                        <input  type="checkbox" data-toggle="toggle"
                                        @if ($row->activo == 1)
                                          checked
                                        @endif
                                        data-size="mini" disabled>
                                    </a>
                                </td>
								<td style="width:100px;">
									<a href="{{ route('curso.edit',$row->id_curso) }}" class="btn btn-xs btn-info">
										<i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a class="btn btn-xs">
                                            <form  method="GET" action="{{ route('nivel.index') }}">
                                                <input name="_method" type="hidden" value="GET">
                                                <input name="id_curso" type="hidden" value="{{ $row->id_curso }}">
                                                <button type="submit"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Buscar Niveles" >
                                                    <i class="glyphicon glyphicon-th-large"></i>
                                                </button>
                                            </form>
                                    </a>
                                    <a href="#" id='ref-eliminar' class="btn btn-xs btn-danger"
											onclick="Eliminar({{ $row->id_curso }},this.parentNode.parentNode.rowIndex)">
											<i class="glyphicon glyphicon-remove"></i>
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
               if (opcion == true) {
                $.ajax({
                    data:  parametros,
                    url:   'elimi_cu',
                    type:  'post',
                    async:  false,
                    dataType: "json",
                error: function(data) {

                       alert('Ha surgido un error');
                },
                success:  function (data) {

                    document.getElementsByTagName("table")[0].setAttribute("id","example1");
                    document.getElementById("example1").deleteRow(i);
                    alert('Elemento eliminado correctamente');
                }
                });
               }
        }
    </script>
@endsection

