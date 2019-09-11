@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Registro de curso

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('idioma.index') }}">@if($id)Idioma: {{$nombre_idioma}} @else Idioma: Todos @endif</a></li>
        <li><a href="{{ route('curso.index') }}">Cursos: Todos</a></li>
        <li class="active">Registro de Cursos</li>
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
                <h3 class="box-title">Registro de curso</h3>
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
                <form role="form" method="post" action="{{ route('crear-curso') }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="GET">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input name="id_idioma" type="hidden" value="{{ $id }}">

                <div class="box-body">
                  @if($id==0)
                 <div class="form-group">
                    <label>Idioma</label>
                    <select class="form-control select2" name="lista_id_idioma" style="width: 100%;">
                      @foreach($idioma as $row)
              <option>{{$row->nombre}}</option>
              @endforeach
                    </select>
                </div>
                @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Codigo</label>
                      <input type="text" name="codigo" class="form-control"
                           id="id_codigo" placeholder="Ingrese el código" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" name="nombre_curso" class="form-control"
                           id="id_nombre" placeholder="Ingrese el Nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Precio</label>
                      <input type="number" name="precio_curso" class="form-control"
                            id="id_precio" placeholder="Ingrese el precio"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Descripción</label>
                      <input type="text" name="descri_curso" class="form-control"
                            id="id_descri" placeholder="Ingrese la descripción" required>
                  </div>

                   <div class="form-group">
                                          <label for="exampleInputEmail">Imagen</label>
                                  <input id="file-upload" name="ruta" onchange='cambiar()' type="file" style='display: none;'/>
                                  <div id="info"></div>

                                  <label for="file-upload" class="subir">
                                    <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                                  </label>
                                </div>
                 <div class="form-group">
                   <label>Estado</label>
                   <select class="form-control select2" name="activo_curso" style="width: 100%;">
                      <option selected="selected">Seleccione una Opcion</option>
                      <option value="1" selected="selected">SI</option>
                <option value="0">NO</option>
                   </select>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn-lg btn-primary">Registrar</button>
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
