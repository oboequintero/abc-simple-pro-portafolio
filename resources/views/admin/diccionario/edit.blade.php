edit.blade.php@extends('admin.header')

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
                    <h2>Editar Palabra de Diccionario de {{$data->idioma}} </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{url('diccionario')}}/{{$data->id_diccionario}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input class="form-control" id="ididioma" type="hidden" name="ididioma" value="{{$data->id_idioma}}" readonly"/>
                        </div> 
                        <div class="form-group">
                            <label for="varchar">Palabra</label>
                            <input type="text" class="form-control" name="palabra" id="palabra" value="{{$data->palabra}}"required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Traduccion</label>
                            <input type="text" class="form-control" name="traduccion" id="traduccion" value="{{$data->traduccion}}" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Ruta Audio</label>
                            <input type="file" accept="file_extension|audio/*|video/*|image/*|media_type" class="form-control" name="rutaaudio" id="rutaaudio" value="{{$data->rutaaudio}}"" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Ruta Video</label>
                            <input type="file" accept="file_extension|audio/*|video/*|image/*|media_type" class="form-control" name="rutavideo" id="rutavideo" value="{{$data->rutavideo}}" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Ruta Imagen</label>
                            <input type="file" accept="file_extension|audio/*|video/*|image/*|media_type" id="imagen" class="file" name="rutaimagen" id="rutaimagen" value="{{$data->rutaimagen}}" required maxlength="20"/>
                        </div>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('diccionario.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection