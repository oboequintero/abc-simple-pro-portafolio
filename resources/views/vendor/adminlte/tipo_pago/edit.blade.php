@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Limite Transacciones
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('tipo_pago.index') }}">Tipo Pago</a></li>
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
	              <h3 class="box-title">Registro de Producto</h3>
	            </div>
	            <!-- /.box-header -->
	            <!--  -->
                <form role="form"  method="post" action="{{ route('tipo_pago.update', $data->id_t_pago ) }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	              <div class="box-body">
	               <div class="form-group">
				<label for="exampleInputEmail">CÓDIGO</label>
				<input type="text" name="codigo" class="form-control" placeholder="CÓDIGO" value="{{ $data->codigo }}" >
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">NOMBRE</label>
				<input type="text" name="nombre" class="form-control" placeholder="NOMBRE"  value="{{ $data->nombre }}">
			</div>
			  <div class="form-group">
		               <label>Estado</label>
		               <select class="form-control select2" name="activo" style="width: 100%;">
			                <option selected="selected">Seleccione una Opcion</option>
			               @if ($data->activo == 1)
                				<option value="1" selected="selected">Habilitado</option>
                 				<option value="0">Deshabilitado</option>
        					@endif
        					@if ($data->activo == 0)
                				<option value="0" selected="selected">Deshabilitado</option>
                  				<option value="1">Habilitado</option>
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
