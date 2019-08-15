@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Registro de Limite Transacciones
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
	              <h3 class="box-title">Registro Limite Transacciones</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
            <form role="form"  method="post" action="{{ route('crear_limite') }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="GET">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Limite</label>
	                  <input type="text" name="limite" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el Limite">
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
