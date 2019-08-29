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
              <a href="#" class="btn btn-lg btn-primary">Registro de Cursos</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro de Cursoddddd </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  method="post" action="{{url:(admin/curso)}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						          <input name="id_idioma" type="hidden" value="{{ $id }}">
          		      	@if($id==0)
                        <div class="form-group">
                          <label for="varchar">Selecione el Idioma</label>
                          <select name="lista_id_nivel" class="form-control" >
                    	@foreach($idioma as $row)
                            <option>{{$row->nombre}}</option>
						          @endforeach
                          </select>
                         </div>
	      			        @endif
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre Curso</label>
                            <input type="text" class="form-control" name="nombre_curso" id="nombrecurso" placeholder="Curso" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Precio Curso</label>
                            <input type="text" class="form-control" name="precio_curso" id="nombrecurso" placeholder="Precio $" required maxlength="20"/>
                        </div>
                            <div class="form-group">
                                <label for="int">Descripcion</label>
                              <textarea type="text" class="form-control" name="descri_curso" id="descri_curso"></textarea>
                            </div>
                        </div>
                        <div class="form-grou">
                          <label for="varchar">Estado de Curso</label>
                          <select name="activo_curso" class="form-control" id="activo_curso">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select>
                        </div>
                          <script>
                          CKEDITOR.replace('descri_curso');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button>
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
