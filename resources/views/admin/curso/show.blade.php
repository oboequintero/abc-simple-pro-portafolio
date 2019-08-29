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
                <input name="id_idioma" type="hidden" value="{{ $id_idioma }}">
                @if($id_idioma == 0)
                  <a href="{{ route('idioma.show',0) }}" class="btn btn-xs btn-info">Idioma: Todos </a>
                  
                @else
                  <a href="{{ route('idioma.show',$idioma->id_idioma) }}" class="btn btn-xs btn-info">Idioma: {{$idioma->nombre}} </a>
                  
                @endif
                  <a href="{{ route('curso.show',$id_idioma) }}" class="btn btn-xs btn-success">Curso: Todos</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Cursos </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                      <form  method="GET" action="{{ route('crear-c') }}">
                        <input name="_method" type="hidden" value="GET">
						            <input name="id_idioma" type="hidden" value="{{ $id_idioma }}">
                        <button type="submit" class="btn btn-info btn-xs""><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Leccion"></i></button>
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
                        <th>Precio</th>
                        <th>Estado</th>
            						<th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                            <tr>
                            <td>{{ $row->codigo }}</td>
              							<td>{{ $row->nombre }}</td>
              							<td>{{ $row->descripcion }}</td>
              							<td>{{ $row->precio }}</td>>
                							<td>@if ($row->activo == 1)
                									Habilitado
                								  @endif
                								  @if ($row->activo == 0)
                									Deshabilitado
                								  @endif	
                							</td>
                            <td style="text-align:center" width="100px">
                               <a href="{{ route('curso.edit',$row->id_curso) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Curso">
                                <i class="fa fa-pencil"></i>
                               </a>
                               <a href="{{ route('nivel.show',$row->id_curso) }}"class="btn btn-success btn-xs"  data-toggle="tooltip" title="Lista">
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