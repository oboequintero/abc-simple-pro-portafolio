@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Registro de Promoción

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
	              <h3 class="box-title">Registro de Promoción</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
          <form role="form" method="post"action="{{ route('crear_pr') }}"
            accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="box-body">
			    <div class="form-group">
			    	<label for="exampleInputEmail1">CODIGO PROMOCIÓN</label>
                    <input type="text" name="codigo" class="form-control" id="exampleInputEmail1"
                        style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                        placeholder="CODIGO DEL PROMOCIÓN" required>
			    </div>
			    <div class="form-group">
			    	<label for="exampleInputEmail1">NOMBRE PROMOCIÓN</label>
			    	<input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="NOMBRE PROMOCIÓN" required>
			    </div>
			    <div class="form-group">
			    <label for="exampleInputEmail1">DESCRIPCIÓN</label>
			    	<input type="text" name="descripcion" class="form-control" placeholder="DESCRIPCIÓN" required>
			    </div>
			    <div class="form-group">
			    <label for="exampleInputEmail1">PRECIO</label>
			    	<input type="number" min="0" name="precio" class="form-control" id="exampleInputEmail1" placeholder="PRECIO" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">FECHA INICIO</label>
                            <input type="date" name="fecha_i" class="form-control" id="exampleInputEmail1" required>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">FECHA FIN</label>
                            <input type="date" name="fecha_f" class="form-control" id="exampleInputEmail1"  required>
                         </div>
                    </div>
                    <div class="col-md-8"></div>
                </div>
			    <div class="form-group">
                    <label for="exampleInputEmail1">ACTIVO</label>
			    	<select name="activo" class="form-control">
			    		<option value="1" selected="selected">SI</option>
			    		<option value="0">NO</option>
                    </select>
			    </div>
                  <!-- /.box-body -->
                <div class="box-footer">
                        <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
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
