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
                    <h2>Registrar Abcedario</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url('admin/abc')}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="varchar">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="codigo" placeholder="Nombre" required />
                        </div>
                      <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea type="text" maxlength="500" class="form-control" name="descripcion" id="descrileccion">
                            </textarea>
                        </div>                    
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                          <select name="status" class="form-control" id="status">value="{{ $data->nombre }}"
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select> 
                         </div>
                        <script>
                          CKEDITOR.replace('descripcion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('abc.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection