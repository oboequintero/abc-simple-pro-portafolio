@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Registro de Tipo Tarjeta
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('idioma.show',0) }}">Idiomas</a></li>
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
	              <h3 class="box-title">Registro Tipo Tarjeta</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
            <form role="form"  method="post" action="{{ route('crear_tarjeta') }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="GET">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              <div class="box-body">
	                
				<div class="form-group">
				<label for="exampleInputEmail">NOMBRE</label>
				<input type="text" name="nombre" class="form-control" placeholder="NOMBRE">
				
	                </div>
	                 <div class="form-group">
		               <label>Estado</label>
		               <select class="form-control select2" name="activo" style="width: 100%;">
			                <option selected="selected">Seleccione una Opcion</option>
			                <option value="1" selected="selected">Habilitado</option>
						  	<option value="0">Deshabilitado</option>
		               </select>
		            </div>
	              </div>
	              <!-- /.box-body -->
	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Registrar</button>
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