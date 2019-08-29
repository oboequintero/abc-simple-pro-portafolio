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
                    @if(!is_null($abc))
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Id Tips</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Ruta</th>
                            <th>Activo</th>
                            <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($abc as $item)
                          <tr>
                            <td>{{$item->id_abc}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->ruta}}</td>
                            <td>@if ($item->activo == 1)
                                  Habilitado
                                @endif
                                @if ($item->activo == 0)
                                  Deshabolitado
                              @endif  
                            </td>
                            <td style="text-align:center" width="100px">
                              <a href="{{ route('abc.edit', $item->id_abc)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Item">
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