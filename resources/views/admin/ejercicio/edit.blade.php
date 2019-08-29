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
                <h4><a href="{{ route('ejercicio.show',$id) }} " class="btn btn-xs primary ">Listar Ejercicios</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de Ejercicio</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url('admin/ejercicio')}}{{ $test->id_ejercicio }}" enctype="multipart/form-data">
                      <input name="_method" type="hidden" value="PUT">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                      <input type="hidden"  name="id_examen"  value="{{ $id_examen }}">
                     @if($id_examen != 0)
                      <div  class="form-group">
                        <label>SELECCIONE CODIGO DEL EXAMEN</label>
                        <select name="lista_id_examen" class="form-control" >
                          @foreach($examen as $row)
                              @if ($id_examen == $row->id_examen)
                                  <option selected="selected" value="{{$row->id_examen}}">{{$row->codigo}}</option>
                              @else
                                  <option  value="{{$row->id_examen}}">{{$row->codigo}}</option>
                              @endif
                          @endforeach
                        </select>
                      </div>
                      @endif
                     @if($id_examen == 0)
                        <div  class="form-group">
                          <label>SELECCIONE TIPO EJERCICIO</label>
                          <select name="lista_id_tipo_ejercicio" class="form-control" >
                            @foreach($tipo as $row)
                                @if ($test->id_tipo_ejercicio == $row->id_tipo_ejercicio)
                                    <option selected="selected" value="{{$row->id_tipo_ejercicio}}">{{$row->tipo}}</option>
                                @else
                                   
                                   <option value="{{$row->id_tipo_ejercicio}}">{{$row->tipo}}</option>
                                @endif
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo"  value="{{ $test->codigo }}" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Puntaje</label>
                            <input type="text" class="form-control" name="puntaje" id="codigo" placeholder="Puntaje"  value="{{ $test->puntaje }}" />
                        </div>
                      <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea type="text" maxlength="500" class="form-control" name="descripcion" id="descripcion" value="{{ $test->descripcion }}">
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
                         @endif
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