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
                    <h2>Editar plantilla</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{ url:(admin/plantilla, $plantilla->plantilla) }}" enctype="multipart/form-data">
                    	<input name="_method" type="hidden" value="PUT">
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						            <input type="hidden" name="id_leccion" class="form-control"  value="{{ $plantilla->id_leccion }}">
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" value="{{ $plantilla->codigo }}" name="codigo" id="codigo" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre plantilla</label>
                            <input type="text" class="form-control" value="{{ $plantilla->nombre }}}" name="nombre_plantilla" id="nombre_plantilla" placeholder="plantilla" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="int">Descripcion</label>
                              <input type="text" maxlength="500" value="{{ $plantilla->descripcion }}" class="form-control" name="descri_plantilla" id="descri_plantilla">
                              </input>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail">TIPO PLANTILLA</label>
                           <select name="tipo_plantilla" class="form-control">
                            @foreach($tipo_p as $row)
                              @if ($plantilla->tipo_plantilla == $row->id_tipo)
                                <option selected="selected" value="{{$row->id_tipo}}">{{$row->nombre}}</option>
                              @else
                                <option value="{{$row->id_tipo}}">{{$row->nombre}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>  
                        <div class="form-group">
                            <label for="varchar">Pagina</label>
                            <input type="text" class="form-control" value="{{ $plantilla->pagina }}}" name="pag_plantilla" id="nombre_plantilla" placeholder="plantilla" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                          <label for="varchar">Estatus</label>
                            <select name="activo_plantilla" class="form-control">
              						    @if ($plantilla->activo == 1)
              		                  <option value="1" selected="selected">Habilitado</option>
              		                  <option value="0">Deshabilitado</option>
              		        		@endif
              		        		@if ($plantilla->activo == 0)
              		                  <option value="0" selected="selected">Deshabilitado</option>
              		                  <option value="1">Habilitado</option>
              								@endif
              						</select>
                         </div>
                        <script>
                          CKEDITOR.replace('descri_nivel');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('plantilla.show',$plantilla->id_nivel) }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
