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
                    <form method="POST" action="{{ url('contenido')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="id_plantilla" type="hidden" value="{{ $id }}">
                      <div class="container-fluid">
                       @if($id==0)        
                        <div  class="form-group">
                            <label>Seleccione la Plantilla</label>
                            </br>         
                            <select name="idplantilla" class="form-control">
                            <option> </option>
                              @foreach($plantillas as $row)
                                <option value="{{$row->id_plantilla}}"> {{$row->plantilla}}</option>
                              @endforeach
                            </select>
                        </div>
                       @endif 
                        <div class="form-group">
                             <label>Nombre</label></br>
                             <input type="text" class="form-control" name="nombre"  placeholder="Nombre Contenido" />
                        </div>
                        <div class="form-group">
                             <label>ID Html</label></br>
                             <input class="form-control"id="idhtml" type="text" name="idhtml" placeholder="Referencia en Lamina HTML" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tipo de Contenido</label>
                            <<input type="text" class="form-control" name="tipo"  placeholder="Tipo" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Ruta</label>
                            <<input id="input-b1" name="input-b1" type="file" class="file" accept="image/*" />
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
                          <textarea type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción Contenido" />
                        </div>
                        <div class="form-group">
                         <label>Parrafo</label>
                         <textarea class="form-control" type="text" placeholder="Parrafo asociado al contenido" id="idparrafo" name="parrafo" />
                        </div>  
                        <div class="form-group">
                          <label>Tiempo</label>
                          <input class="form-control"id="idtiempo" type="text" name="tiempo"  placeholder="tiempo" />
                        </div>                  
                        <div class="form-group">
                          <label for="varchar">Estado</label>
                          <select name="status" class="form-control" id="status">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select> 
                         </div>
                        <script>
                          CKEDITOR.replace('parrafo');
                          CKEDITOR.replace('descripcion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('contenido.show',0) }}" class="btn btn-default">Cancelar</a>
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