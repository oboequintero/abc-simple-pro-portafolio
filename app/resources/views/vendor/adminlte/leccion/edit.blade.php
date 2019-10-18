@extends('adminlte::layouts.app')
@section('main-content')
    <section class="content-header">
      <h1>
       Editar de Lección
        <small>Lección</small>
      </h1>
    <ol class="breadcrumb">
		@if($id == 0)
	    	<li><a href="{{ route('idioma.index') }}" >Idioma: Todos </a></li>
			<li><a href="{{ route('curso.index')}}"  >Curso: Todos </a></li>
			<li><a href="{{ route('nivel.show') }}" >Niveles: Todos</a></li>
		@else
			<li><a href="{{ route('idioma.index') }}" >Idioma: {{$idioma->nombre}} </a></li>
			<li><a href="{{ route('curso.index')}}" >Curso: {{$curso->nombre}}</a></li>
			<li><a href="{{ route('nivel.index')}}" >Nivel: {{$nivel->nombre}}</a></li>
		@endif
			<li><a href="{{ route('leccion.index') }}" >Lecciones: Todas</a></li>
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
                        <h3 class="box-title">Editar de Leccion</h3>
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
                    <form method="post" action="{{ route('leccion.update', $leccion->id_leccion ) }}"
                        accept-charset="UTF-8" enctype="multipart/form-data">
					    <input name="_method" type="hidden" value="PUT">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <input type="hidden" name="id_nivel" class="form-control"  value="{{ $leccion->id_nivel }}">

					    <input type="hidden" name="id_leccion" class="form-control"  value="{{ $leccion->id_leccion }}">

					    <div  class="form-group">
							<label>Nivel</label>
							<select name="lista_id_nivel" class="form-control">
								@foreach($data as $row)
									@if ($leccion->id_nivel == $row->id_nivel)
										<option selected="selected" value={{$row->id_nivel}}>{{$row->nombre}}</option>
									@else
										<option value={{$row->id_nivel}}>{{$row->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					    <div class="form-group">
						    <label for="exampleInputEmail">Código</label>
						    <input type="text" name="codigo" class="form-control" placeholder="Código" value="{{ $leccion->codigo }}">
					    </div>
					    <div class="form-group">
						    <label for="exampleInputEmail">Nombre</label>
						    <input type="text" name="nombre_leccion" class="form-control" placeholder="Nombre" value="{{ $leccion->nombre }}" >
					    </div>
					    <div class="form-group">
						    <label for="exampleInputEmail">Descripción</label>
						    <input type="text" name="descri_leccion" class="form-control" placeholder="Descripción"  value="{{ $leccion->descripcion }}">
					    </div>
					    <div class="form-group">
						    <label for="exampleInputEmail">Activo</label>
						    <select name="activo_leccion" class="form-control">
							    @if ($leccion->activo == 1)
                  				    <option value="1" selected="selected">Habilitado</option>
                  				    <option value="0">Deshabilitado</option>
        					    @endif
        					    @if ($leccion->activo == 0)
                  				    <option value="0" selected="selected">Deshabilitado</option>
                 				    <option value="1">Habilitado</option>
							    @endif
						    </select>
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
