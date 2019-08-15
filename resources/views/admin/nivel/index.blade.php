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
                    <h2>Lista de NIVEL </h2>
                    @if($id_curso == 0)
                      <a href="{{ route('idioma.show',0) }}" class="btn btn-lg btn-info">Idioma: Todos </a>
                      <a href="{{ route('curso.show',0)}}"  class="btn btn-lg btn-success">Curso: Todos </a>
                    @else
                      <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">Idioma: {{$idioma->nombre}} </a>
                      <a href="{{ route('curso.show',$curso->id_idioma)}}" class="btn btn-lg btn-success">Curso: {{$curso->nombre}}</a>
                    @endif
                      <a href="{{ route('nivel.show',$id_curso) }}" class="btn btn-lg btn-warning">Niveles: Todos</a>
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
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estatus</th>
                            <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                            <tr>
                            <td>{{ $row->codigo }}</td>
                            <td>{{ $row->nombre }}</td>
                            <td>{{ $row->descripcion }}</td>
                            <td>@if ($row->activo == 1)
                                Habilitado
                                @endif
                                @if ($row->activo == 0)
                                Deshabilitado
                                @endif  
                            </td>
                            <td style="text-align:center" width="100px">
                              <a href="{{ route('nivel.edit',$row->id_nivel) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Nivel">
                                <i class="fa fa-pencil"></i>
                               </a>
                               <a href="{{ route('leccion.show',$row->id_nivel) }}"class="btn btn-success btn-xs"  data-toggle="tooltip" title="Agrear Leccion">
                                <i class="fa fa-list"></i></a>
                          
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