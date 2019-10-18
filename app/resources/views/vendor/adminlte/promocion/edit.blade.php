@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Editar de Promoción
        <small>Anterior</small>
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
	              <h3 class="box-title">Editar de Promoción</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
                <form role="form" method="post"
                action="{{ route('promocion.update', $promociones->id_promocion ) }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    			<div class="form-group">
			    	<label for="exampleInputEmail1">CÓDIGO</label>
			    	<input type="text" name="codigo" class="form-control" placeholder="CÓDIGO" value="{{ $promociones->codigo }}" readonly>
			    </div>
			    <div class="form-group">
				    <label for="exampleInputEmail1">NOMBRE</label>
				    <input type="text" name="nombre" class="form-control" placeholder="NOMBRE" value="{{ $promociones->nombre }}" required>
			    </div>
			    <div class="form-group">
				    <label for="exampleInputEmail1">DESCRIPCIÓN</label>
				    <input type="text" name="descripcion" class="form-control" placeholder="DESCRIPCIÓN"  value="{{ $promociones->descripcion }}" required>
			    </div>
			    <div class="form-group">
				    <label for="exampleInputEmail1">PRECIO</label>
				    <input type="number" name="precio" class="form-control" placeholder="PRECIO"  value="{{ $promociones->precio }}" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
			            <div class="form-group">
				            <label for="exampleInputEmail1">FECHA INICIO</label>
				            <input type="date" name="fecha_i" class="form-control"   value="{{ $fecha->fecha_i }}"required>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
			            <div class="form-group">
				            <label for="exampleInputEmail1">FECHA FIN</label>
				            <input type="date" name="fecha_f" class="form-control"   value="{{ $fecha->fecha_f }}" required>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                </div>
			    <div class="form-group">
				    <label for="exampleInputEmail">ACTIVO</label>
				    <select name="activo" class="form-control">
					    @if ($promociones->activo == 1)
                	    	<option value="1" selected="selected">SI</option>
                 	    	<option value="0">NO</option>
        			    @endif
        			    @if ($promociones->activo == 0)
                	    	<option value="0" selected="selected">NO</option>
                  		    <option value="1">SI</option>
					    @endif
                    </select>
                 </div>
                 <div class="box-footer">
                        <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>
                </div>
             </form>
        </div>
        <!-- /.box-body -->

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
