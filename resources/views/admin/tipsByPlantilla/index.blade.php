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
                    <h2>Listado de tips por plantilla</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                       
                        <a href="{{ route('creartipsbyp') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                        
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   @if(!is_null($tipsbyplantilla))
                    <table id="datatable-responsive" class="table list table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>Plantilla</th>                        
                        <th>Tips</th>
                        <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($tipsbyplantilla as $item)
                            <tr>               
                            <td>{{ $item->nombreplantilla}} </td>
                            <td>{{ $item->nombretips}} </td> 
                            <td style="text-align:center" width="100px">
                             
                              <a href="{{ route('tipsbyplantilla.edit',$item->id_tipsByP) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar">
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