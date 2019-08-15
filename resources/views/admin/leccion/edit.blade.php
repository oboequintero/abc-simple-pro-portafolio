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
                @if($id == 0)
                  <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">Idioma: Todos </a>
                  <a href="{{ route('curso.show',0)}}"  class="btn btn-lg btn-success">Curso: Todos </a>
                  <a href="{{ route('nivel.show',0) }}" class="btn btn-lg btn-warning">Niveles: Todos</a>
                @else
                  <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">Idioma: {{$idioma->nombre}} </a>
                  <a href="{{ route('curso.show',$idioma->id_idioma)}}" class="btn btn-lg btn-success">Curso: {{$curso->nombre}}</a>
                  <a href="{{ route('nivel.show',$curso->id_curso)}}" class="btn btn-lg btn-warning">Nivel: {{$nivel->nombre}}</a>
                @endif
                <a href="{{ route('leccion.show', $leccion->id_nivel) }}" class="btn btn-lg btn-danger">Lecciones: Todas</a>
                <a href="#" class="btn btn-lg btn-primary">Editar Leccion</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Lección </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{ url:(admin/leccion,$leccion->id_leccion) }}" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_nivel" class="form-control"  value="{{ $leccion->id_nivel }}">
                        <label>Seleccione el Nivel</label>
                        <select name="lista_id_nivel" class="form-control">
                          @foreach($data as $row)
                            @if ($leccion->id_nivel == $row->id_nivel)
                              <option selected="selected" value="{{$row->id_nivel}}">{{$row->nombre}}</option>
                            @else
                              <option value="{{$row->id_nivel}}">{{$row->nombre}}</option>
                            @endif
                          @endforeach
                        </select>
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $leccion->codigo }}" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Lección</label>
                            <input type="text" class="form-control" name="nombre_leccion" id="nombreleccion"  value="{{ $leccion->nombre }}" placeholder="Lección" required maxlength="20"/>
                        </div>
                            <div class="form-group">
                               <label for="int">Descripcion</label>
                              <textarea type="text" class="form-control" name="descri_leccion" value="{{ $leccion->descripcion }}" id="descrileccion">
                              </textarea>
                            </div>
                        </div>
                        <div class="form-grou">
                         <label for="varchar">Estado de la Leccion</label>
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
                          <script>
                          CKEDITOR.replace('descri_leccion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('leccion.show',$leccion->id_nivel) }}" class="btn btn-default">Cancelar</a>
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
