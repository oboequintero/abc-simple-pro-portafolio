@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Lecciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        @if($id_nivel == 0)
            <li><a href="{{ route('idioma.index') }}" ></i>Idioma: Todos </a></li>
            <li><a href="{{ route('curso.index')}}"  >Curso: Todos </a></li>
            <li><a href="{{ route('nivel.index') }}" >Niveles: Todos</a></li>
        @else
            <a href="{{ route('idioma.index') }}" >Idioma: {{$idioma->nombre}} </a>
            <a href="{{ route('curso.index')}}" >Curso: {{$curso->nombre}}</a>
            <a href="{{ route('nivel.index')}}" >Niveles: {{$nivel->nombre}}</a>
        @endif
            <li><a href="{{ route('leccion.index') }}">Lecciones: Todas</a></li>
       </ol>
    </section>
        <!-- Main content -->
     <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Lecciones Registradas</h3>
                    <div class="col-xs-1 col-md-1">
						<form  method="GET" action="{{ route('crear-l') }}">
							<input name="_method" type="hidden" value="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input name="id_nivel" type="hidden" value="{{ $id_nivel }}">
							<button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Ingresar Lección" ><i class="glyphicon glyphicon-plus"></i></button>
						</form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if($data)
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
									<th>Nivel</th>
									<th>Código</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Activo</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
									<tr id="detail">
										<td>{{ $row->nombre_N }}</td>
										<td>{{ $row->codigo_L }}</td>
										<td>{{ $row->nombre_L }}</td>
										<td>{{ $row->descripcion_L }}</td>
                                        <td  style="text-align:center;  " >
                                            <a href="#" readonly>
                                                <input  type="checkbox" data-toggle="toggle"
                                                @if ($row->activo_L == 1)
                                                  checked
                                                @endif
                                                data-size="mini" disabled>
                                            </a>
                                        </td>
										<td style="width:100px;">
											<a href="{{ route('leccion.edit',$row->id_leccion) }}" class="btn btn-xs btn-info">
											    <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                            <a class="btn btn-xs">
                                                    <form  method="GET" action="{{ route('plantilla.index') }}">
                                                        <input name="_method" type="hidden" value="GET">
                                                        <input name="id_plantilla" type="hidden" value="{{ $row->id_leccion }}">
                                                        <button type="submit"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Buscar Plantillas" >
                                                            <i class="glyphicon glyphicon-th"></i>
                                                        </button>
                                                    </form>
                                            </a>
   											<a href="#" id='ref-eliminar' class="btn btn-xs btn-danger"
													onclick="Eliminar({{ $row->id_leccion }},this.parentNode.parentNode.rowIndex)">
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
                    url:   'elimi_le',
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
