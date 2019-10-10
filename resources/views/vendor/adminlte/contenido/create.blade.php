
@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
        <h1>
         Registro de Contenido Insert
        </h1>
        <ol class="breadcrumb">
            
                <li><a href="{{ route('idioma.index') }}" >Idioma: Todos</a></li>
                <li><a href="{{ route('curso.index')}}"  >Curso: Todos </a></li>
                <li><a href="{{ route('nivel.index') }}" >Niveles: Todos</a></li>
                <li><a href="{{ route('leccion.index') }}" >Lecciones: Todos</a></li>
                <li><a href="{{ route('plantilla.index') }}" >Plantillas: Todas</a></li>
                <li><a >
                <form id="form_contenido" action="{{route('contenido.index')}}" method="GET">
                                        
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    
                 <button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Contenido"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
                 </form>
                 </a></li>   
      </ol>
    </section>
     <!-- Main content -->
    <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Registro de Contenido</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                   <!--Bloque que muestra u oculta mensaje de error-->
                          @if(!empty($error_msg))
                            <!--div id="div_msg" class="alert alert-danger" style="display:block"-->
                            <div id="div_msg" class="{{$_class}}" style="display:block">
                                {{$error_msg}}
                            </div> <!--div id="div_msg"-->
                          @else  
                            <div id="div_msg" class="{{$_class}}" style="display:none">
                              Mensaje de alerta                
                            </div> <!--div id="div_msg2"-->
                          @endif
                        
                        <!--Fin Bloque que muestra u oculta mensaje de error-->
                <form role="form"  method="post" action="{{ route('crear_co') }}"
                        accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                    <div class="container-fluid">
                        <input name="id" type="hidden" value="{{ $id }}">
                      
                      
                        @if($id==0)  
                            <div  class="form-group">
                                <label>SELECCIONE PLANTILLA</label>
                            <select name="idplantilla" class="form-control">
                            <option> </option>
                            @foreach($plantillas as $row)
                                <option value="{{$row->id_plantilla}}"> {{$row->plantilla}}</option>
                            @endforeach
                            </select>
                            </div>
                        @endif
                    <div  class="form-group">
                    <label>Nombre</label>
                        <input class="form-control" id="idnombre" type="text" name="nombre"  placeholder="Nombre Contenido" value="{{$_nomb}}" >
                    </div>
                    <div  class="form-group">
                    <label>id Html</label>
                        <input class="form-control" id="idhtml" type="text" name="idhtml"  placeholder="Referencia en Lamina HTML" value="{{$_idhtml}}" />
                    </div>
                    
                     <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail">TIPO CONTENIDO</label>
                                  <select name="tipo_contenido" class="form-control">
                        @foreach($tipo_contenido as $row)
                            <option value="{{$row->id_tipo_con}}"> {{$row->nombre}}</option>
                        @endforeach
                        </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail">¿Fin de Sección?</label>
                                    <div class="text-left" style="margin-left: 8% ;">
                                        <input id="fin_s_id" name="fin_s" style="text-align:center" type="checkbox" data-toggle="toggle" value="{{$_fin}}">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-md-6">
                                    <label>Tamaño de Letra:</label>
                                    <input class="form-control" id="idtipo" type="number" name="tamano"  placeholder="Introduzca el Tamaño de la Letra" value="{{$_tamano}}" required/>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label>Color:</label>
                                    <div class="text-left" style="margin-left: 8% ;margin-top:2%;">
                                        <input name="color" type="color"  />
                                    </div>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label>¿negrita?</label>
                                    <div class="text-left" style="margin-left: 8% ;">
                                            <input id="negrita_id" name="negrita" style="text-align:center" type="checkbox" data-toggle="toggle">
                                           
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Descripción</label>
                                <input class="form-control" id="iddescripcion" type="text" name="descripcion"  placeholder="Descripción Contenido" value="{{$_descrip}}" required/>
                            </div>
                    <div  class="form-group">
                    <label>Ruta</label>
                    <div class="file-loading">
                        <input id="input-b1" name="input-b1" type="file" class="file">
                    </div>
                    </div>
                    <div  class="form-group">
                    <label>Parrafo</label>
                        <input class="form-control" type="text" placeholder="Parrafo asociado al contenido" id="idparrafo" name="parrafo" value="{{$_parrafo}}" required>
                    </div>
                    <div class="form-group">
                    <label>Tiempo</label>
                        <input class="form-control" id="idtiempo" type="number" name="tiempo"  placeholder="tiempo" value="{{$_tiempo}}" required>
                    </div>
                    <div class="form-group">
                    <label>Margen Superior</label>
                        <input class="form-control" id="margen_superior" type="number" name="margen_superior" placeholder="Margen Superior" value="{{$_margen_superior}}" required>
                    </div>
                    <div class="form-group">
                    <label>Margen Izquierdo</label>
                        <input class="form-control" id="margen_inferior" type="number" name="margen_inferior"  placeholder="Margen Izquierdo" value="{{$_margen_inferior}}" required>
                    </div>
                    <div class="form-group">
                        <label>Estatus</label>
                    <select name="status" class="form-control">
                        <option value="1" selected="selected">SI</option>
                        <option value="0"> NO</option>
                    </select>
                    </div>
                    <div class="box-footer">
                                    <button type="submit" class="btn-lg btn-primary">Registrar</button>
                                </div>
            </div>
     </form>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</div>
<!--/.col (left) -->

</div>
<!-- /.row -->
</section>
<script>
    $(document).ready(function () {
        $( "#fin_s_id" ).change(function() {
             
            /* alert($("#fin_s_id").val()); */
            if ($("#fin_s_id").val()=="on" || $("#fin_s_id").val()==0 ) {
               /* alert("cambiando el valor a 1"); */
                $("#fin_s_id").val(1);
            }
            else{
            /*alert("cambiando el valor a 0"); */
                $("#fin_s_id").val(0);
            }
        });
        $( "#negrita_id" ).change(function() {
            if ($("#negrita_id").val()=="on" || $("#fin_s_id").val()==0 ) {
             /*   alert("cambiando el valor a 1"); */
                $("#negrita_id").val(1);
            }
            else{
              /*  alert("cambiando el valor a 0"); */
                $("#negrita_id").val(0);
            }
        });
    });
</script>
@endsection
