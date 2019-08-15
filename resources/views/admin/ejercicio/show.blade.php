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
                    <h2>Lista de Lecciones </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <form  method="GET" action="{{ route('crear-ejercicio') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="GET">
                        <input name="id_examen" type="hidden" value="{{ $id }}">
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
                        <th>ID Ejercicio</th>
                        <th>Codigo Ejercicio</th>
                        <th>Descrip. Ej</th>
                        <th>Descripcion Tipo Ej.</th>
                        <th>Tipo Ej</th>
                        <th>Activo</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $row)
                            <tr>
                            <td>{{ $row->id_ejercicio }}</td>
                            <td>{{ $row->codigo }}</td>
                            <td>{{ $row->descripcion_e }}</td>
                            <td>{{ $row->descripcion_t }}</td>
                            <td>{{ $row->tipo }}</td>
              							<td>@if ($row->activo_L == 1)
              									Habilitado
              								  @endif
              								  @if ($row->activo_L == 0)
              									Deshabilitado
              								  @endif	
              							</td>
                            <td style="text-align:center" width="100px">
                               <a href="{{ route('edit-e',[$id,$row->id_ejercicio]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar Leccion">
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