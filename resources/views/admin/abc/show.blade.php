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
                    <h2>Ver Detalle Abecedario</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table">
                        <tr><td>ID</td><td>{{$abc->idabc}}</td></tr>
                        <tr><td>Nombre</td><td>{{$abc->nombre}}</td></tr>
                        <tr><td>Descripcion</td><td>{{$abc->descripcion}}</td></tr>
                        <tr>
                        <tr><td></td><td><a href="{{ route('abc.index') }}" class="btn btn-default">Cancelar</a></td></tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @endsection