@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
		<h1>Plantillas</h1>
		<ol class="breadcrumb">
			@if($id_leccion == 0)
				<li><a href="{{ route('idioma.index') }}" ></i>Idioma: Todos </a></li>
				<li><a href="{{ route('curso.index') }}" ></i>Curso: Todos </a></li>
				<li><a href="{{ route('nivel.index') }}" ></i>Niveles: Todos </a></li>
				<li><a href="{{ route('leccion.index') }}" ></i>Lecciones: Todos </a></li>

			@else
				<a href="{{ route('idioma.index') }}">Idioma: {{$idioma->nombre}} </a>
				<a href="{{ route('curso.index',$idioma->id_idioma)}}">Curso: {{$curso->nombre}}</a>
				<a href="{{ route('nivel.index',$curso->id_curso)}}">Niveles: {{$nivel->nombre}}</a>
				<a href="{{ route('leccion.index',$nivel->id_nivel)}}">Lecciones: {{$leccion->nombre}}</a>
			@endif
				<a href="{{ route('plantilla.index',$id_leccion) }}">Plantillas: Todas</a>
		</ol>
    </section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<div class="box-header">
						<h3 class="box-title">Plantillas Registradas</h3>
						<div class="col-xs-1 col-md-1">
							<form  method="GET" action="{{ route('cr-p') }}">
								<input name="_method" type="hidden" value="GET">
								<input name="id_leccion" type="hidden" value="{{ $id_leccion }}">
								<button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Ingresar Plantilla" ><i class="glyphicon glyphicon-plus"></i></button>
							</form>
						</div>
					</div>

					<div id="div1" class="table-responsive" style="display:;">
						@if($data)
                        <table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Código</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Página</th>
										<th>Tipo</th>
										<th>Activo</th>
										<th>Acción</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr id="detail">
											<td>{{ $row->codigo_P }}</td>
											<td>{{ $row->nombre_P }}</td>
											<td>{{ $row->descripcion_P }}</td>
											<td>{{ $row->pagina_P }}</td>
											<td>{{ $row->tipo_P }}</td>
                                            <td  style="text-align:center;  " >
                                                <a href="#" readonly>
                                                    <input  type="checkbox" data-toggle="toggle"
                                                    @if ($row->activo_P == 1)
                                                      checked
                                                    @endif
                                                    data-size="mini" disabled>
                                                </a>
                                            </td>
											<td style="width:130px;">
												<a href="{{ route('plantilla.edit',$row->id_plantilla) }}" class="btn btn-xs btn-info">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
                                                <a class="btn btn-xs">
                                                        <form  method="GET" action="{{ route('contenido.index') }}">
                                                                <input name="_method" type="hidden" value="GET">
                                                                <button type="submit" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Ir a Contenido" >
                                                                    <i class="glyphicon glyphicon-folder-open"></i>
                                                                </button>
                                                                <input type="hidden" name="id_plantilla" value="{{ $row->id_plantilla }}">
                                                        </form>
                                                </a>
												<a href="#" id='ref-eliminar' class="btn btn-xs btn-danger"
													onclick="Eliminar({{ $row->id_plantilla }},this.parentNode.parentNode.rowIndex)">
													<i class="glyphicon glyphicon-remove"></i>
												</a>
												<a href="{{ route('lamina.show',$row->id_plantilla) }}"
													@if($row->valor == 1)
														class="btn btn-xs btn-info"
													@else
														class="btn btn-xs btn-danger"
													@endif
													>
													<i class="glyphicon glyphicon-sunglasses"></i>
												</a>
                                                </td>
										</tr>
								</tbody>
									@endforeach
							</table>
						@endif
					</div>

					<div id="div2" class="table-responsive" style="display:none;">
						<h2>Paginas:</h2>
						@if($data)
							<div class="row">
								@foreach($data as $row)
									<div class="col-xs-3 col-md-1">
										<div class="thumbnail">
											<button type="button"
												@if($row->valor == 1)
													class="btn btn-info btn-sm"
												@else
													class="btn btn-danger btn-sm"
												@endif
											>
											 <span id="span" class="badge">{{ $row->pagina_P }}</span>
											</button>
										</div>
									</div>
								@endforeach
							</div>
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
    <script >
    function Eliminar(id,i) {
        $.ajaxSetup({
            headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        var parametros={
                        "identidad" : id,
                        'token': "token"
                        };
        var opcion = confirm("Está seguro de Eliminar?");
        if (opcion == true) {
            $.ajax({
                data:  parametros,
                url:   'elimi_pl',
                type:  'post',
                async:  false,
                dataType: "json",
            error: function() {
                alert('Ha surgido un error');
            },
            success:  function (data) {
                $("#span").html(data.datos);
                document.getElementsByTagName("table")[0].setAttribute("id","tabla");
                document.getElementById("tabla").deleteRow(i);
                alert('Elemento eliminado correctamente');
            }
            });
        }
    }
    </script>
@endsection
