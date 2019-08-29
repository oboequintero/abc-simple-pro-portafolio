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
                    <h2>Editar Nivel</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{url('admin/nivel->id_nivel')}}" enctype="multipart/form-data">
                    	<input name="_method" type="hidden" value="PUT">
						          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" value="{{ $nivel->codigo }}" name="codigo" id="codigo" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Nivel</label>
                            <input type="text" class="form-control" value="{{ $nivel->nombre }}" name="nombre_nivel" id="nombre_nivel" placeholder="Nivel" required maxlength="20"/>
                        </div>
                        <div class="form-grou">
                            <div class="form-group">
                                <label for="int">Descripcion</label>
                              <input type="text" maxlength="500" value="{{ $nivel->descripcion }}" class="form-control" name="descri_nivel" id="descri_nivel" placeholder="Descripcion">
                              </input>
                            </div>
                        </div>
                        <div class="form-grou">
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                          <select name="activo_nivel" class="form-control" id="activo_nivel">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select> 
                         </div>
                        </div>
                        <script>
                          CKEDITOR.replace('descri_nivel');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('nivel.index') }}" class="btn btn-default">Cancelar</a>
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