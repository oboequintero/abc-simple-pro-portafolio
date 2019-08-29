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
                <div class="panel panel-group">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      @if($data_i)
                      <div class="row">
                        @foreach($data_i as $row)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                            <img src={{ asset('/storage/'.$row->ruta) }} alt="...">
                            <div class="caption">
                              <h3>{{ $row->nombre }}</h3>
                                <p>{{ $row->descripcion }}</p>
                                <p>
                                  <form action="{{ route('buscapro_c')}}" method="get">
                                    <input id="idbuscacurso" type="hidden" name="b_curso" value="{{ $row->id_idioma }}"  />
                                    <a href="#" class="btn btn-primary" id="button_1">Paquetes, Promociones y Cursos</a> 
                                  </form>  
                                </p>
                            </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
                                @endif      
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-1 col-md-11 ">
                          <ul>                            
                            <form action="{{ route('buscacurso')}}" method="post">
                              <input name="_method" type="hidden" value="GET">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input id="idbuscacurso" type="text" name="b_curso"  placeholder="Curso a buscar" />
                              <button type="submit" class="btn  btn-primary" data-toggle="tooltip" title="Buscar Curso" ><i class="glyphicon glyphicon-search"></i></button>
                            </form>
                          </ul>
                        </div>
                      </div>
                    </div>  
                    <div class="table-responsive">
                                @if($data)
                          <div class="row">
                                        @foreach($data as $row)
                            <div class=" col-md-2">
                                <div class="thumbnail">
                                <img src={{ asset('/storage/'.$row->ruta) }} alt="...">
                                <div class="caption">
                                  <h5>{{ $row->nombre }}</h5>
                                <p>{{ $row->descripcion }}</p>
                                <p>Precio: {{ $row->precio }}</p>
                                    <p>
                                                     <a href="#" class="btn btn-primary" role="button">Comprar</a> 
                                                     <a href="#" class="btn btn-default" role="button">Demo</a>
                                                    </p>
                                </div>
                                </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif  
                        </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection