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
                @if($id_plantilla == 0)
                  <a href="{{ route('idioma.index') }}" class="btn btn-xs btn-info">Idioma: Todos </a>
                  <a href="{{ route('curso.show',0)}}"  class="btn btn-xs btn-success">Curso: Todos </a>
                  <a href="{{ route('nivel.show',0) }}" class="btn btn-xs btn-warning">Niveles: Todos</a>
                  <a href="{{ route('leccion.show',0) }}" class="btn btn-xs btn-danger">Curso: Todos</a>
                  <a href="{{ route('plantilla.show',0) }}" class="btn btn-xs btn-default">Plantillas: Todas</a>

                @else
                  <a href="{{ route('idioma.index') }}" class="btn btn-xs btn-info">Idioma: {{$idioma->nombre}} </a>
                  <a href="{{ route('curso.show',$idioma->id_idioma)}}" class="btn btn-xs btn-success">Curso: {{$curso->nombre}}</a>
                  <a href="{{ route('nivel.show',$curso->id_curso)}}" class="btn btn-xs btn-warning">Niveles: {{$nivel->nombre}}</a>
                  <a href="{{ route('leccion.show',$nivel->id_nivel)}}" class="btn btn-xs btn-danger">Lecciones: {{$leccion->nombre}}</a>
                  <a href="{{ route('plantilla.show',$leccion->id_leccion) }}" class="btn btn-xs btn-default">Plantillas: {{$plantilla->nombre}}</a>
                @endif
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Roles Usuarios </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                      <form method="GET" action="{{ route('cr-c') }}">
                    <input name="_method" type="hidden" value="GET">
                    <input name="id_plantilla" type="hidden" value="{{ $id_plantilla }}">
                        <button type="submit" class="btn btn-info btn-xs""><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Administrar"></i></button>
                      </form>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	@if(!is_null($contenido))
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
	                       	<th>IdHtml.</th>
                          <th>Leccion</th>
                          <th>Plantilla</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descrip.</th>
                          <th>Ruta</th>
                          <th>Parrafo</th>
                          <th>Tiempo</th>
                          <th>Activo</th>
	            			      <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($contenido as $item)
                            <tr>
                            <td>{{ $item->idhtml}} </td>
                            <td>{{ $item->leccion}} </td>  
                            <td>{{ $item->plantilla}} </td>
                            <td>{{ $item->nombre}} </td>
                            <td>{{ $item->tipo}} </td>
                            <td>{{ $item->descripcion}}</td>
                            <td>{{ $item->ruta}}</td>
                            <td>{{ $item->parrafo}}</td>
                            <td>{{ $item->tiempo}}</td>
                             <td>
                                @if($item->activo)
                                  Habilitado                          
                                @else
                                  Deshabilitado
                                @endif
                            </td>
                            <td style="text-align:center" width="100px">
                                 <a href="{{ route('contenido.edit',$item->id_contenido) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
                                <i class="fa fa-pencil"></i>
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