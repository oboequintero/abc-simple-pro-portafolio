@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
        Editar Cursos
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('idioma.index') }}"><i class="fa fa-dashboard"></i> @if($id)Idioma: {{$nombre_idioma}} @else Idioma: Todos @endif</a></li>
        <li><a href="{{ route('curso.index') }}">Cursos: Todos</a></li>
        <li class="active">Editar Curso</li>
       <li><a >
        <form id="form_curso" action="{{route('curso.index')}}" method="GET">
                                        
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    
          <button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Cursos"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
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
	              <h3 class="box-title">Editar de curso</h3>
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
                <form role="form" method="post" action="{{ route('curso.update', $curso->id_curso ) }}"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input name="id_idioma" type="hidden" value="{{ $id }}">

	              <div class="box-body">
		             <!--<div class="form-group">
		                <label>Idioma</label>
		                <select class="form-control select2" name="lista_id_idioma" style="width: 100%;">
		                 @foreach($idioma as $row)
								@if ($curso->id_idioma == $row->id_idioma)
									<option selected="selected" value="{{$row->id_idioma}}" >{{$row->nombre}}</option>
								@else
									<option value="{{$row->id_idioma}}">{{$row->nombre}}</option>
								@endif
							@endforeach
		                </select> 
		            </div>-->

		             <div class="form-group">
	                  <label for="exampleInputEmail1">Idioma</label>
	                  <input type="text" name="lista_id_idioma" class="form-control" id="exampleInputEmail1" value="{{ $nombre_idioma }}" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Codigo</label>
	                  <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" value="{{ $curso->codigo }}" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Nombre</label>
	                  <input type="text" name="nombre_curso" class="form-control" id="exampleInputEmail1"  value="{{ $curso->nombre }}" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Precio</label>
	                  <input type="text" name="precio_curso" class="form-control" id="exampleInputEmail1" value="{{ $curso->precio }}" required>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">descrpcion</label>
	                  <input type="text" name="descri_curso" class="form-control" id="exampleInputEmail1" value="{{ $curso->descripcion }}"required>
	                </div>


		             <div class="form-group">
		               <label>Estado</label>
		               <select class="form-control select2" name="activo_curso" style="width: 100%;">
			                @if ($curso->activo == 1)
                				<option value="1" selected="selected">SI</option>
                 				<option value="0">NO</option>
        					@endif
        					@if ($curso->activo == 0)
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
