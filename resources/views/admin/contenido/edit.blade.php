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
                    <h2>Registrar Contenido</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="POST" action="/contenido/{{$contenido->id_contenido}}" enctype="multipart/form-data">
                     <input name="_method" type="hidden" value="PUT">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{csrf_field()}}
                        <div  class="form-group">
                              <label>SELECCIONE PLANTILLA</label>      
                              <select name="idplantilla" class="form-control">
                              <option> </option>
                                @foreach($plantillas as $row)
                                  <option value="{{$row->id_plantilla}}"> {{$row->plantilla}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                             <label>Nombre</label></br>
                             <input type="text" class="form-control" name="nombre"  placeholder="Nombre Contenido" value="{{$contenido->nombre}}" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tipo de Contenido</label>
                            <<input type="text" class="form-control" name="tipo"  placeholder="Tipo" value="{{$contenido->tipo}}"  />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Ruta</label>
                            <<input id="input-b1" name="input-b1" type="file" class="file" accept="image/*" value="{{$contenido->ruta}}"  />
                        </div>
                         <!--<div class="col-xs-12" id="video" style="display: none">
                            <div class="form-group">
                                <label for="int">Video</label>
                                <input type="text" class="form-control" name="video" id="video" placeholder="Video"  maxlength="500"/>
                            </div>
                        </div>
                        <div class="col-xs-12" id="imagen">
                            <div class="form-group">
                                <label for="varchar">Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="file" accept="image/*" />
                          </div>
                       </div>-->
                        <div class="form-group">
                          <label>Descripción</label></br>
                          <textarea type="text" class="form-control" type="text" id="descripcion" name="descripcion"  placeholder="Descripción Contenido" value="{{$contenido->descripcion}}"/>
                        </div>
                        <div class="form-group">
                         <label>Parrafo</label>
                         <textarea type="text" class="form-control" type="text" name="parrafo"  placeholder="Parrafo asociado al contenido" value="{{$contenido->parrafo}}" />
                        </div>  
                        <div class="form-group">
                          <label>Tiempo</label>
                          <input type="text" class="form-control" type="text" name="tiempo"  placeholder="tiempo"  value="{{$contenido->tiempo}}"/>
                        </div>                  
                        <div class="form-group">
                          <label for="varchar">Estado</label>
                          <select name="activo_nivel" class="form-control" id="activo_nivel">
                             @if($contenido->activo)
                            <option value="1" selected="selected">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                             @else
                             <option value="1" selected="selected">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                            @endif
                          </select> 
                         </div>
                        <script>
                          CKEDITOR.replace('parrafo');
                          CKEDITOR.replace('descripcion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('contenido.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<script>
$('#tipo').change(function(){
  if($('#tipo').val() == 'video'){
    $('#video').show();
$('#imagen').hide();
  }
  else{
    $('#video').hide();
    $('#imagen').show();}});

</script>
@endsection