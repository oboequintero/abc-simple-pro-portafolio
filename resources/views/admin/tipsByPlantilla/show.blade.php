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
                    <h2>Ver Tips de Plantilla</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table">
                        <tr><td>Id TipsByP</td><td> {{$tipsbyplantilla->nombretips}}</td></tr>
                        <tr><td>Id Tips</td><td>{{$tipsbyplantilla->nombreplantilla}}</td></tr>
                        <tr><td></td><td><a href="{{ route('tipsbyplantilla.index') }}" class="btn btn-default">Cancelar</a></td></tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection