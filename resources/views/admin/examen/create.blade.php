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
                <h4><a href="{{ route('examen.index') }}" class="btn btn-xs btn-primary ">Listar Ejercicios</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de Examen</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url('admin/examen')}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input name="id_examen" type="hidden" value="{{ $id }}">
                      @if($id_nivel==0)
                        <div class="form-group">
                          <label for="varchar">SELECCIONE EL CODIGO DE LA LECCIÓN</label>
                          <select name="lista_id_leccion" class="form-control" >
                          @foreach($leccion as $row)
                            <option>{{$row->id_leccion}}</option>
                          @endforeach
                          </select> 
                         </div>
                      @endif
                      <div  class="form-group">
                        <label>SELECCIONE TIPO EXAMEN</label>
                        <select name="lista_id_tipo_examen" class="form-control">
                          @foreach($id_t as $row)
                            <option  value="{{ $row->id_tipo_examen }}">{{$row->descripcion}}</option>
                          @endforeach
                        </select>
                       </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Examen</label>
                            <input type="text" class="form-control" name="nombre" id="codigo" placeholder="Nombre Examen" required />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo" required />
                        </div>
                      <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea type="text" maxlength="500" class="form-control" name="descripcion" id="descripcion">
                            </textarea>
                        </div>                    
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                          <select name="activo" class="form-control" id="activo">
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
                        <a href="{{ route('ejercicio.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection