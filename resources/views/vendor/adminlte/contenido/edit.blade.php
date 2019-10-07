@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Contenidos
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
            @if($id_plantilla == 0)
                <li><a href="{{ route('idioma.index') }}" >Idioma: Todos </a></li>
                <li><a href="{{ route('curso.index')}}"  >Curso: Todos </a></li>
                <li><a href="{{ route('nivel.index') }}" >Niveles: Todos</a></li>
                <li><a href="{{ route('leccion.index') }}" >Lecciones: Todos</a></li>
                <li><a href="{{ route('plantilla.index') }}" >Plantillas: Todas</a></li>
            @else
                <li><a href="{{ route('idioma.index') }}" >Idioma: {{$idioma->nombre}} </a></li>
                <li><a href="{{ route('curso.index')}}" >Curso: {{$curso->nombre}}</a></li>
                <li><a href="{{ route('nivel.index')}}" >Niveles: {{$nivel->nombre}}</a></li>
                <li><a href="{{ route('leccion.index')}}" >Lecciones: {{$leccion->nombre}}</a></li>
                <li><a href="{{ route('plantilla.index') }}" >Plantillas: {{$plantilla->nombre}}</a></li>
            @endif
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
                        <h3 class="box-title">Editar Contenido</h3>
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
             
                <!-- form start -->
                    <form id="idForm_Contenido" method="post"
                        action="{{ route('contenido.update', $contenido->id_contenido ) }}"
                        accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container-fluid">

                            <input type="hidden"  name="id_contenido" class="form-control"  value="{{ $contenido->id_contenido }}">
                            <div class="form-group">
                            <label>Id Plantilla</label>
                                <input class="form-control" id="Id Plantilla" type="text" name="idplantilla"  placeholder="Id Plantilla" value="{{$contenido->id_plantilla}}" readonly/>
                            </div>
                            <div class="form-group">
                            <label>Nombre</label>
                                <input class="form-control" id="idnombre" type="text" name="nombre"  placeholder="nombre" value="{{$contenido->nombre}}" required/>
                            </div>
                            <div class="form-group">
                            <label>id Html</label>
                                <input class="form-control" id="idhtml" type="text" name="idhtml"  placeholder="Referencia en Plantilla HTML" value="{{$contenido->idhtml}}" required/>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail">TIPO CONTENIDO</label>
                                    <select name="tipo_contenido" class="form-control">
                                        @foreach($tipo_c as $row)
                                            @if ($contenido->id_tipo_con == $row->id_tipo_con)
                                                <option selected="selected" value={{$row->id_tipo_con}}>{{$row->nombre}}</option>
                                            @else
                                                <option value={{$row->id_tipo_con}}>{{$row->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail">¿Fin de Sección?</label>
                                    <div class="text-left" style="margin-left: 8% ;">
                                        <input id="fin_s_id" name="fin_s" style="text-align:center" value="{{$contenido->fin_s}}" type="checkbox" data-toggle="toggle"
                                        @if($contenido->fin_s == 1) checked @endif >
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-md-6">
                                    <label>Tamaño de Letra:</label>
                                    <input class="form-control" id="idtipo" type="number" name="tamano"  placeholder="Introduzca el Tamaño de la Letra" value="{{$contenido->tamano}}" required/>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label>Color:</label>
                                    <div class="text-left" style="margin-left: 8% ;margin-top:2%;">
                                        <input name="color" type="color" value="{{$contenido->color}}" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label>¿negrita?</label>
                                    <div class="text-left" style="margin-left: 8% ;">
                                            <input id="negrita_id" name="negrita" style="text-align:center" value="{{$contenido->negrita}}" type="checkbox" data-toggle="toggle"
                                            @if($contenido->negrita == 1) checked @endif >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label>Descripción</label>
                                <input class="form-control" id="iddescripcion" type="text" name="descripcion"  placeholder="Descripción Contenido" value="{{$contenido->descripcion}}" required/>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="well well-sm col-xs-3 ">
                                        <label>Ruta</label>
                                        <input id="input-t1" name="input-t1" type="text" class="file" value="{{$contenido->ruta}}">
                                    </div>
                                    <div class="well well-sm file-loading col-xs-4 text-center">
                                            <div>
                                                    <label>Imagen/Video Actual</label>
                                            </div>

                                            @if ( $contenido->id_tipo_con == 1)
                                                <video width="100" height="100" controls src={{ asset('/storage/contenido/'.$contenido->ruta) }}>
                                                </video>
                                            @endif
                                            @if ($contenido->id_tipo_con == 3)
                                                <img src={{ asset('/storage/contenido/'.$contenido->ruta) }} height="100" width="100">
                                            @endif
                                    </div>
                                    <div class="well well-sm file-loading col-xs-5">
                                        <label>Archivo</label>
                                        <input id="input-b1" name="input-b1" type="file" class="file" value="{{$contenido->ruta}}">
                                    </div>
                                    <div class="well well-sm file-loading col-xs-4 text-center">
                                            <div>
                                                    <label>Imagen/Video Nuevo</label>
                                            </div>
                                            @if ( $contenido->id_tipo_con == 1)
                                                <video width="100" height="100" controls src={{ asset('/storage/contenido/'.$contenido->ruta) }}>
                                                </video>
                                            @endif
                                            @if ($contenido->id_tipo_con == 3)
                                                <img src={{ asset('/storage/contenido/'.$contenido->ruta) }} height="100" width="100">
                                            @endif
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiempo</label>
                                    <input class="form-control" id="idtiempo" type="text" name="tiempo"  placeholder="tiempo" value="{{$contenido->tiempo}}"required/ >
                            </div>
                            <div class="form-group">
                                <label>Párrafo</label>
                                <input class="form-control" id="idparrafo" type="text" name="parrafo"  placeholder="Parrafo asociado al contenido" value="{{$contenido->parrafo}}" required/>
                            </div>
                             <div class="form-group">
                             <label>Margen Superior</label>
                             <input class="form-control" id="margen_superior" type="number" name="margen_superior" value="{{$contenido->margen_superior}}" placeholder="Margen Superior"  required>
                             </div>
                            <div class="form-group">
                            <label>Margen Izquierdo</label>
                            <input class="form-control" id="margen_inferior" type="number" name="margen_inferior" value="{{$contenido->margen_inferior}}" placeholder="Margen Izquierdo" required>
                            </div>
                            <div class="form-group">
                                <label>Estatus</label>
                                <select name="status" class="form-control">
                                <option></option>
                                    @if($contenido->activo)
                                        <option value="1" selected="selected">SI</option>
                                        <option value="0"> NO</option>
                                    @else
                                        <option value="1"> SI</option>
                                        <option value="0" selected="selected">NO</option>
                                    @endif
                                </select>
                            </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn-lg btn-primary">Actualizar</button>
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
            if ($("#fin_s_id").val()==1) {
                $("#fin_s_id").val(0);
            }
            else{
                $("#fin_s_id").val(1);
            }
        });
        $( "#negrita_id" ).change(function() {
            if ($("#negrita_id").val()==0) {
                $("#negrita_id").val(1);
            }
            else{
                $("#negrita_id").val(0);
            }
        });
    });
</script>
@endsection
