@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Contenidos
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
			@if($id_plantilla == 0)
				<li><a href="{{ route('idioma.index') }}" >Idioma: Todos </a></li>
				<li><a href="{{ route('curso.index')}}"  >Curso: Todos </a></li>
				<li><a href="{{ route('nivel.index') }}" >Niveles: Todos</a></li>
                <li><a href="{{ route('leccion.index') }}" >Lecciones: Todos</a></li>
                <li><a href="{{ route('plantilla.index') }}" >Plantillas: Todas</a></li>
			@else
    			<li><a href="{{ route('idioma.index') }}" >Idioma: {{$idioma->nombre}} </a></li>
				<li><a href="{{ route('curso.index')}}" >Curso: {{$curso->nombre}}</a></li>
				<li><a href="{{ route('nivel.index')}}" >Niveles: {{$nivel->nombre}}</a></li>
                <li><a href="{{ route('leccion.index')}}" >Lecciones: {{$leccion->nombre}}</a></li>
                <li><a href="{{ route('plantilla.index') }}" c>Plantillas: {{$plantilla->nombre}}</a></li>
			@endif
      </ol>
    </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Contenido Registrados</h3>
                    <div class="col-xs-1 col-md-1">
                        <form  method="GET" action="{{ route('cr-c') }}">
                            <input name="_method" type="hidden" value="GET">
                            <input name="id_plantilla" type="hidden" value="{{ $id_plantilla }}">
                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Ingresar Contenido" ><i class="glyphicon glyphicon-plus"></i></button>
                        </form>
                    </div>
              </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(!is_null($contenido))
                        <table  class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>IdHtml</th>
                                <th>Leccion</th>
                                <th>Plantilla</th>
                                <th>Pagina</th>
                                <th>Letra</th>
                                <th>Descrip.</th>
                                <th>Tiempo</th>
                                <th>Img/Vid</th>
                                <th>Activo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contenido as $item)
                        <tr id="detail">
                            <td>{{ $item->idhtml}} </td>
                            <td>{{ $item->leccion}} </td>
                            <td>{{ $item->plantilla}} </td>
                            <td>{{ $item->pagina}} </td>
                            <td>{{ $item->tamano}} </td>
                            <td>{{ $item->descripcion}}</td>
                            <td>{{ $item->tiempo}}</td>
			                <td>
                                @if ( $item->id_tipo_con == 1)
                                    <video width="100" height="100" controls src={{ asset('/storage/contenido/'.$item->ruta) }}>
                                    </video>
                                @endif
				                @if ($item->id_tipo_con == 3)
				                    <img src={{ asset('/storage/contenido/'.$item->ruta) }} height="100" width="100">
				                @endif
                            </td>
                            <td  style="text-align:center;  " >
                                <a href="#" readonly>
                                    <input  type="checkbox" data-toggle="toggle"
                                    @if ($item->activo == 1)
                                      checked
                                    @endif
                                    data-size="mini" disabled>
                                </a>
                            </td>
                            <td style="width:100px;">
                                <a href="{{ route('contenido.edit',$item->id_contenido) }}" class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a href="#" id='ref-eliminar' class="btn btn-xs btn-danger"
                                    onclick="Eliminar({{ $item->id_contenido }},this.parentNode.parentNode.rowIndex)">
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
            alert('en eliminar');
            var parametros = {
                "identidad" : id,
                'token': "token"
                };
            var opcion = confirm("Está seguro de Eliminar?");
               if (opcion == true) {
                $.ajax({
                    data:  parametros,
                    url:   'elimi_co',
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



