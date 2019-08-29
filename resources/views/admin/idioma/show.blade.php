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
                  <a href="{{ route('idioma.show',0) }}" class="btn btn-xs btn-info" >Idioma: Todos</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de NIVEL </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('nivel.create') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if($data)
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                            <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                            <tr>
                              <td>{{ $row->nombre }}</td>
                            <td>{{ $row->descripcion }}</td>
                            <td>@if ($row->activo == 1)
                                  Habilitado
                                @endif
                                @if ($row->activo == 0)
                                  Deshabolitado
                              @endif  
                            </td>
                            <td style="text-align:center" width="100px">
                              <a href="{{ route('idioma.edit',$row->id_idioma) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
                                <i class="fa fa-pencil"></i>
                                  </a>
                               <a href="{{ route('curso.show',$row->id_idioma) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Cuerso Nivel" >
                                <i class="glyphicon glyphicon-book"></i>
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