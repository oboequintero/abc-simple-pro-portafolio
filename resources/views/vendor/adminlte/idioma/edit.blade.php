@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Editar Idiomas
        <small>Preview</small>
      </h1>
     <ol class="breadcrumb">
        <li><a >
        <form id="form_paquete" action="{{route('idioma.index')}}" method="GET">
                                        
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    
          <button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Idiomas"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
        </form>
      </a>
    </li>
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
                <h3 class="box-title">Editar de Idioma</h3>
              </div>
              <!-- /.box-header -->
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
                <form role="form" method="post" action="{{ route('idioma.update', $idioma->id_idioma ) }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input name="id_idioma" type="hidden" value="{{ $id }}">

                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre_idioma" class="form-control" id="exampleInputEmail1"  value="{{ $idioma->nombre }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">descripcion</label>
                    <input type="text" name="descrip_idioma" class="form-control" id="exampleInputEmail1" value="{{ $idioma->descripcion }}"required>
                  </div>


                 <div class="form-group">
                   <label>Estado</label>
                   <select class="form-control select2" name="activo_idioma" style="width: 100%;">
                      @if ($idioma->activo == 1)
                        <option value="1" selected="selected">SI</option>
                        <option value="0">NO</option>
                  @endif
                  @if ($idioma->activo == 0)
                        <option value="0" selected="selected">NO</option>
                          <option value="1">SI</option>
              @endif
                   </select>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
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
@endsection
