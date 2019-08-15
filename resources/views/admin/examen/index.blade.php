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
                    <h2>Listado de EXAMEN </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('examen.create') }}}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     @if(!is_null($test))
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Id Examen</th>                        
                            <th>Tipo Examen</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Activo</th>
                            <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                        <tr>
                            <td>{{ $item->id_examen}} </td>
                            <td>{{ $item->id_leccion}} </td>
                            <td>{{ $item->codigo}} </td>
                            <td>{{ $item->nombre}} </td>
                            <td>{{ $item->descripcion}} </td>
                            <td>@if ($row->activo == 1)
                                  Habilitado
                                @endif
                                @if ($row->activo == 0)
                                  Deshabolitado
                              @endif  
                            </td>
                            <td style="text-align:center" width="100px">
                              <a href="{{ route('examen.edit',$item->id_examen) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
                                <i class="fa fa-pencil"></i>
                               </a>
                                <a href="{{ route('ejercicio.show',$item->id_examen) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
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