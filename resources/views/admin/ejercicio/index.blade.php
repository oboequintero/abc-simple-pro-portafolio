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
                  <a href="{{ route('ejercicio.create') }}" class="btn btn-xs btn-info" >Registrar Ejercicio</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listado de Ejercicios </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('nivel.create') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     @if(!is_null($test))
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Id Ejercicio</th>                        
                            <th>Id Tipo Ejercicio</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Puntaje</th>
                            <th>Activo</th>
                            <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                        <tr>
                            <td>{{ $item->id_ejercicio}} </td>
                            <td>{{ $item->id_tipo_ejercicio}} </td>
                            <td>{{ $item->codigo}} </td>
                            <td>{{ $item->descripcion}} </td>
                            <td>{{ $item->puntaje}} </td>
                            <td>@if ($row->activo == 1)
                                  Habilitado
                                @endif
                                @if ($row->activo == 0)
                                  Deshabolitado
                              @endif  
                            </td>
                            <td style="text-align:center" width="100px">
                              <a href="{{ route('edit-e', [0, $item->id_ejercicio])}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
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