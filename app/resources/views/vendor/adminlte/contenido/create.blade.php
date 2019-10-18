@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
        <h1>
         Registro de Contenido
        </h1>
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
                <form role="form"  method="post" action="{{ route('crear_co') }}"
                        accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="id_plantilla" type="hidden" value="{{ $id }}">
                    <div class="container-fluid">
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
                        <input class="form-control" id="idnombre" type="text" name="nombre"  placeholder="Nombre Contenido" >
                    </div>
                    <div  class="form-group">
                    <label>id Html</label>
                        <input class="form-control" id="idhtml" type="text" name="idhtml"  placeholder="Referencia en Lamina HTML" />
                    </div>
                    <div  class="form-group">
                    <label>TIPO CONTENIDO</label>
                        <select name="tipo_contenido" class="form-control">
                        @foreach($tipo_contenido as $row)
                            <option value="{{$row->id_tipo_con}}"> {{$row->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Tamaño de Letra</label>
                        <input class="form-control" id="tamano" type="number" name="tamano"  placeholder="Introduzca el Tamaño de la Letra" />
                    </div>
                    <div  class="form-group">
                    <label>Descripción</label>
                        <input class="form-control" id="iddescripcion" type="text" name="descripcion"  placeholder="Descripción Contenido" />
                    </div>
                    <div  class="form-group">
                    <label>Ruta</label>
                    <div class="file-loading">
                        <input id="input-b1" name="input-b1" type="file" class="file">
                    </div>
                    </div>
                    <div  class="form-group">
                    <label>Parrafo</label>
                        <input class="form-control" type="text" placeholder="Parrafo asociado al contenido" id="idparrafo" name="parrafo" >
                    </div>
                    <div class="form-group">
                    <label>Tiempo</label>
                        <input class="form-control" id="idtiempo" type="text" name="tiempo"  placeholder="tiempo" >
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" selected="selected">SI</option>
                        <option value="0"> NO</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <div class="col-md-4 col-md-offset-4 " >
					  <button class="btn btn-lg btn-primary btn-block" type="submit" >Registrar</button>
                    </div>
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
@endsection
