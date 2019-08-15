@extends('admin.header')

@section('main-content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                @if($id_leccion == 0)
                  <a href="{{ route('idioma.index') }}" class="btn btn-xs btn-info">Idioma: Todos </a>
                  <a href="{{ route('curso.show',0)}}"  class="btn btn-xs btn-success">Curso: Todos </a>
                  <a href="{{ route('nivel.show',0) }}" class="btn btn-xs btn-warning">Niveles: Todos</a>
                  <a href="{{ route('leccion.show',0) }}" class="btn btn-xs btn-danger">Curso: Todos</a>

                @else
                  <a href="{{ route('idioma.index') }}" class="btn btn-xs btn-info">Idioma: {{$idioma->nombre}} </a>
                  <a href="{{ route('curso.show',$idioma->id_idioma)}}" class="btn btn-xs btn-success">Curso: {{$curso->nombre}}</a>
                  <a href="{{ route('nivel.show',$curso->id_curso)}}" class="btn btn-xs btn-warning">Niveles: {{$nivel->nombre}}</a>
                  <a href="{{ route('leccion.show',$nivel->id_nivel)}}" class="btn btn-xs btn-danger">Lecciones: {{$leccion->nombre}}</a>
                @endif
                <a href="{{ route('plantilla.show',$id_leccion) }}" class="btn btn-xs btn-default">Plantillas: Todas</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Plantillas </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                      	<form  method="GET" action="{{ route('cr-p') }}">
                        <input name="_method" type="hidden" value="GET">
                        <input name="id_leccion" type="hidden" value="{{ $id_leccion }}">
                        <button type="submit" class="btn btn-info btn-xs""><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Plantilla"></i></button>
                      </form>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	@if($data)
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Página</th>
                          <th>Tipo</th>
                          <th>Activo</th>
                    			<th>Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                            <td>{{ $row->codigo_P }}</td>
                            <td>{{ $row->nombre_P }}</td>
                            <td>{{ $row->descripcion_P }}</td>
                            <td>{{ $row->pagina_P }}</td>
                            <td>{{ $row->tipo_P }}</td>
              							<td>@if ($row->activo_P == 1)
              									Habilitado
              								  @endif
              								  @if ($row->activo_P == 0)
              									Deshabilitado
              								  @endif	
              							</td>
                            <td style="text-align:center" width="100px">
                               <a href="{{ route('plantilla.edit',$row->id_plantilla) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Leccion">
                                <i class="fa fa-pencil"></i>
                               </a>
                               <a href="{{ route('contenido.show',$row->id_plantilla) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ver Contenido">
                                <i class="fa fa-list"></i>
                               </a>
                               <a href="{{ route('lamina.show',$row->id_plantilla) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Leccion">
                                <i class="fa fa-list"></i>
                               </a>
                            </td>
                        </tr>
                          @endforeach
                      </tbody>
                    </table>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection


