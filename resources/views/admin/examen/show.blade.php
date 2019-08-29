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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de EXAMEN </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <form  method="GET" action="{{ route('crear-examen') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="GET">
                        <input name="id_leccion" type="hidden" value="{{ $id }}">
                        <button type="submit" class="btn btn-info btn-xs""><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar ejercicio a este Examen"></i></button>
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
                         <th>Id Examen</th>                        
                        <th>Id Leccion</th>
                        <th>Codigo Examen</th>
                        <th>Codigo Leccion</th>
                        <th>Tipo Examen</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Activo</th>
                        <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                            <tr>
                            <td>{{ $row->id_examen }}</td>
                            <td>{{ $row->id_leccion }}</td>
                            <td>{{ $row->codigo_E }}</td>
                            <td>{{ $row->codigo_L }}</td>
                            <td>{{ $row->descripcion_T }}</td>
                            <td>{{ $row->nombre_E }}</td>
                            <td>{{ $row->descripcion_E }}</td>
              							<td>@if ($row->activo_E == 1)
              									Habilitado
              								  @endif
              								  @if ($row->activo_E == 0)
              									Deshabilitado
              								  @endif	
              							</td>
                            <td style="text-align:center" width="100px">
                               <a href="{{ route('examen.edit',$row->id_examen) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Leccion">
                                <i class="fa fa-pencil"></i>
                               </a>
                               <a href="{{ route('ejercicio.show',$row->id_examen) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Leccion">
                                <i class="glyphicon glyphicon-th-list"></i>
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