@extends('adminlte::layouts.app')
@section('main-content')
<html>
<section class="content-header">
	 <h1>Editar Plantillas</h1>
    <ol class="breadcrumb">
      @if($id_leccion == 0)
        <li><a href="{{ route('idioma.index') }}" ></i>Idioma: Todos </a></li>
        <li><a href="{{ route('curso.index') }}" ></i>Curso: Todos </a></li>
        <li><a href="{{ route('nivel.index') }}" ></i>Niveles: Todos </a></li>
        <li><a href="{{ route('leccion.index') }}" ></i>Lecciones: Todos </a></li>

      @else
        <li><a href="{{ route('idioma.index') }}">Idioma: {{$idioma->nombre}} </a></li>
        <li><a href="{{ route('curso.index',$idioma->id_idioma)}}">Curso: {{$curso->nombre}}</a></li>
        <li><a href="{{ route('nivel.index',$curso->id_curso)}}">Niveles: {{$nivel->nombre}}</a></li>
        <li><a href="{{ route('leccion.index',$nivel->id_nivel)}}">Lecciones: {{$leccion1->nombre}}</a></li>
      @endif
         <li>
        <a href="{{ route('plantilla.index',$id) }}">Plantillas: Todas</a>
        </li>
    </ol>
	
  </section>
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
	<form method="post" action="{{ route('plantilla.update', $plantilla->id_plantilla ) }}">
	
		<input name="_method" type="hidden" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="id_leccion" class="form-control"  value="{{ $plantilla->id_leccion }}">

		<input type="hidden" name="id_plantilla" class="form-control"  value="{{ $plantilla->id_plantilla }}">

        <div class="form-group">
		                <label>Lección</label>
		                <select class="form-control select2" name="lista_id_leccion" style="width: 100%;">
		                 @foreach($data as $row)
								@if ($leccion->id_leccion == $row->id_leccion)
									<option selected="selected" value={{$row->id_leccion}}>{{$row->nombre}}</option>
								@else
									<option value="{{$row->id_leccion}}">{{$row->nombre}}</option>
								@endif
							@endforeach
		                </select>
		            </div>


		<div class="form-group">
			<label for="exampleInputEmail">Código</label>
			<input type="text" name="codigo" class="form-control" placeholder="CÓDIGO" value="{{ $plantilla->codigo }}" readonly>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Nombre</label>
			<input type="text" name="nombre_plantilla" class="form-control" placeholder="NOMBRE" value="{{ $plantilla->nombre }}" >
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Descripción</label>
			<input type="text" name="descri_plantilla" class="form-control" placeholder="DESCRIPCIÓN"  value="{{ $plantilla->descripcion }}">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail">Tipo Plantilla</label>
			<select name="tipo_plantilla" class="form-control">
				@foreach($tipo_p as $row)
					@if ($plantilla->tipo_plantilla == $row->id_tipo)
						<option selected="selected" value={{$row->id_tipo}}>{{$row->nombre}}</option>
					@else
						<option value={{$row->id_tipo}}>{{$row->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>	
		<div class="form-group">
			<label for="exampleInputEmail">Página</label>
			<input type="text" name="pag_plantilla" class="form-control" placeholder="PÁGINA" value="{{ $plantilla->pagina }}" >
		</div>
		<div class="form-group">
				<label for="exampleInputEmail">Activo</label>
				<select name="activo_plantilla" class="form-control">
				@if ($plantilla->activo == 1)
                  <option value="1" selected="selected">SI</option>
                  <option value="0">NO</option>
        		@endif
        		@if ($plantilla->activo == 0)
                  <option value="0" selected="selected">NO</option>
                  <option value="1">SI</option>
						@endif
				</select>
		</div>	 
		<div class="col-lg-12 espacio"></div>
		<div class="col-md-4 col-md-offset-4">
			<button class="btn btn-lg btn-primary btn-block" type="submit" >Actualizar</button>
		</div>
	</form>

</div>
</html>
@endsection