@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Editar de Nivel
        <small>Nivel</small>
      </h1>
      <ol class="breadcrumb">
    @if($id == 0)
        <li><a href="{{ route('idioma.index') }}">Idioma: Todos</a></li>
        <li><a href="{{ route('curso.index') }}">Cursos: Todos</a></li>
        @else
        <li><a href="{{ route('idioma.index') }}">Idioma: {{$idioma->nombre}} </a></li>
        <li><a href="{{ route('curso.index')}}">Curso: {{$curso->nombre}}</a></li>
		@endif
        <li class="active"><a href="{{ route('nivel.index') }}">Niveles: Todos</a></li>
        <li><a>
				<form id="form_paquete" action="{{route('nivel.index')}}" method="GET">
                                        
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
																																	  
					<button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Niveles"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
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
	              <h3 class="box-title">Editar de Nivel</h3>
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
                <form role="form" method="post" action="{{ route('nivel.update', $nivel->id_nivel ) }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <input name="id_nivel" type="hidden" value="{{ $id }}">
	              <div class="box-body">
		            <!-- <div class="form-group">
		                <label>Curso</label>
		                <select class="form-control select2" name="lista_id_curso" style="width: 100%;">
		                @foreach($data as $row)
		                  @if ($nivel->id_curso == $row->id_curso)
							
							<option selected="selected" value={{$row->id_curso}}>{{$row->nombre}}</option>
								
							@else
							<option value="{{ $row->id_curso }}">{{$row->nombre}}</option>
							@endif
						@endforeach
		                </select>
		            </div> -->
		            <div class="form-group">
	                  <label for="exampleInputEmail1">Curso</label>
	                  <input type="text" name="lista_id_curso" class="form-control" id="exampleInputEmail1" value="{{ $curso->nombre }}" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Código</label>
	                  <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" value="{{ $nivel->codigo }}"readonly>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Nombre</label>
	                  <input type="text" name="nombre_nivel" class="form-control" id="exampleInputEmail1" value="{{ $nivel->nombre }}" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Descripción</label>
	                  <input type="text" name="descri_nivel" class="form-control" id="exampleInputEmail1" value="{{ $nivel->descripcion }}" required>
	                </div>
		             <div class="form-group">
		               <label>Estado</label>
		               <select class="form-control select2" name="activo_nivel" style="width: 100%;">
		               	@if ($nivel->activo == 1)
			                <option selected="selected">Seleccione una Opcion</option>
			                <option value="1" selected="selected">Habilitado</option>
						  	<option value="0">Deshabilitado</option>
						@endif
        				@if ($nivel->activo == 0)
			                <option selected="selected">Seleccione una Opcion</option>
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
