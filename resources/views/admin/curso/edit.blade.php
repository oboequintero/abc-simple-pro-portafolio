@extends('admin.header')

@section('main-content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">

              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">@if($id)Idioma: {{$nombre_idioma}} @else Idioma: Todos @endif</a>
        <a href="{{ route('curso.show',$id) }}" class="btn btn-lg btn-success">Cursos: Todos</a>
                  <div class="x_title">
                    <h2>Editar Curso </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{ url:(admin/curso,$curso->id_curso  )}}" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_nivel" class="form-control"  value="{{ $curso->id_nivel }}">
                      <div  class="form-group">
	                      <label>Seleccione el Curso</label>
		                      <select name="idplantilla" class="form-control">
		                      <option> </option>
		                        @foreach($idioma as $row)
		                       	 @if ($curso->id_idioma == $row->id_idioma)
		                          <option value="{{$row->id_idioma}}">{{$row->nombre}}</option>
		                         @else
		                          <option value="{{$row->id_idioma}}">{{$row->nombre}}</option>
		                         @endif
		                        @endforeach
		                      </select>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $curso->codigo }}" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Curso</label>
                            <input type="text" class="form-control" name="nombre_curso" id="nombreCurso"  value="{{ $curso->nombre }}" placeholder="Curso" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                           <label for="int">Descripcion</label>
                          <textarea type="text" class="form-control" name="descri_curso" value="{{ $curso->descripcion }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Precio Curso</label>
                            <input type="text" class="form-control" name="precio_curso" id="preciocurso"  value="{{ $curso->nombre }}" placeholder="Curso" required maxlength="20"/>
                        </div>
                        </div>
                        <div class="form-grou">
                         <label for="varchar">Estado de la Curso</label>
                         <select name="activo_curso" class="form-control">
							@if ($curso->activo == 1)
			                  <option value="1" selected="selected">Habilitado</option>
			                  <option value="0">Deshabilitado</option>
			        		@endif
			        		@if ($curso->activo == 0)
			                  <option value="0" selected="selected">Deshabilitado</option>
			                  <option value="1">Habilitado</option>
						    @endif
			             </select>
                        </div>
                          <script>
                          CKEDITOR.replace('descri_curso');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('curso.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
