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
                @if($id_nivel == 0)
                  <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">Idioma: Todos </a>
                  <a href="{{ route('curso.show',0)}}"  class="btn btn-lg btn-success">Curso: Todos </a>
                  <a href="{{ route('nivel.show',0) }}" class="btn btn-lg btn-warning">Niveles: Todos</a>
                @else
                  <a href="{{ route('idioma.index') }}" class="btn btn-lg btn-info">Idioma: {{$idioma->nombre}} </a>
                  <a href="{{ route('curso.show',$idioma->id_idioma)}}" class="btn btn-lg btn-success">Curso: {{$curso->nombre}}</a>
                  <a href="{{ route('nivel.show',$curso->id_curso)}}" class="btn btn-lg btn-warning">Nivel: {{$nivel->nombre}}</a>
                @endif
                <a href="{{ route('leccion.show',$id_nivel) }}" class="btn btn-lg btn-danger">Lecciones: Todas</a>
                <a href="#" class="btn btn-lg btn-primary">Registro de Nivel</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de Lección </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{URL:(admin/leccion)}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">   
                      <input name="id_nivel" type="hidden" value="{{ $id_nivel }}">
          						@if($id_nivel==0)
                        <div class="form-group">
                          <label for="varchar">Selecione el Nivel</label>
                          <select name="lista_id_nivel" class="form-control" >
                           @foreach($nivel as $row)
                            <option>{{$row->codigo}}</option>
							             @endforeach
                          </select> 
                         </div>
	      				     @endif
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Lección</label>
                            <input type="text" class="form-control" name="nombre_leccion" id="nombreleccion" placeholder="Lección" required maxlength="20"/>
                        </div>
                            <div class="form-group">
                                <label for="int">Descripcion</label>
                              <textarea type="text" class="form-control" name="descri_leccion" id="descri_leccion"></textarea>
                            </div>
                        </div>
                        <div class="form-grou">
                          <label for="varchar">Estado de Leccion</label>
                          <select name="activo_leccion" class="form-control" id="activo_leccion">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select> 
                        </div>
                          <script>
                          CKEDITOR.replace('descri_leccion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('leccion.show',$id) }}" class="btn btn-default">Cancelar</a>
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
