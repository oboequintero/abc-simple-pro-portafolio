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
                    <h2>Editar  Examen</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url('admin/examen')}}{{ $test->id_examen }}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input name="id_examen" type="hidden" value="{{ $id }}">
                        <div class="form-group">
                          <label>SELECCIONE LA LECCION</label>
                            <select name="lista_id_leccion" class="form-control" >
                               @foreach($leccion as $row)
                                    @if ($test->id_leccion == $row->id_leccion)
                                        <option selected="selected" value={{$row->id_leccion}}>{{$row->codigo}}</option>
                                    @else
                                       ($test->id_leccion == $row->id_leccion)
                                        <option  value={{$row->id_leccion}}>{{$row->codigo}}</option>
                                    @endif
                                @endforeach
                            </select>
                         </div>
                      <div  class="form-group">
                        <label>SELECCIONE EL TIPO DE EXAMEN</label>
                        <select name="lista_id_tipo_examen" class="form-control">
                           @foreach($tipo as $row)
                              @if ($test->id_tipo_examen == $row->id_tipo_examen)
                                  <option selected="selected" value="{{$row->id_tipo_examen}}">{{$row->descripcion}}</option>
                              @else
                                   <option  value="{{$row->id_tipo_examen}}">{{$row->descripcion}}</option>
                              @endif
                          @endforeach
                        </select>
                      </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Examen</label>
                            <input type="text" class="form-control" name="nombre" id="codigo" placeholder="Nombre Examen" value="{{ $test->nombre }}/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo" value="{{ $test->codigo }}/>
                        </div>
                      <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea type="text" maxlength="500" class="form-control" name="descripcion" id="descripcion" value="{{ $test->descripcion }}>
                            </textarea>
                        </div>                    
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                         <select name="activo" class="form-control">
                          @if ($test->activo == 1)
                              <option value="1" selected="selected">Habilitado</option>
                              <option value="0">Deshabilitado</option>
                            @endif
                            @if ($test->activo == 0)
                              <option value="0" selected="selected">Deshabilitado</option>
                              <option value="1">Habilitado</option>
                          @endif
                        </select> 
                         </div>
                        <script>
                          CKEDITOR.replace('descripcion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('examen.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection