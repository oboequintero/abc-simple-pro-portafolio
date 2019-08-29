@extends('adminlte::layouts.app')
@section('main-content')<!-- page content -->
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
                    <h2>Lista de Categorias </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('nivel.create') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix">
                        
                         @foreach ($categorias->chunk(4) as $items)
            <div class="row">
            
                @foreach ($items as $categoria)
                <input type="hidden" id="categoria_id" name="categoria" value="{{$categoria->id_categoria}}"/>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <a href="{{ url('shop', [$categoria->id_categoria]) }}"></a>
                                <a href="{{ url('shop', [$categoria->id_categoria]) }}"><h3>{{ $categoria->nombre_categoria }}</h3>
                                
                                </a>
                               
                               



                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                  
                @endforeach
            </div> <!-- end row -->    
         
        @endforeach

                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection


<html>

    

   