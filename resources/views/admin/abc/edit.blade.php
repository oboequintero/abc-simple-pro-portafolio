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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Abcedario</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url('abc')}}/{{$abc->id_abc}}" enctype="multipart/form-data">
                       {{url('abc')}}
                       {{$abc->id_abc}}
                    	<input name="_method" type="hidden" value="PUT">
						          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label for="varchar">ID</label>
                          <input type="text" class="form-control" name="idabc" id="id_abc" value="{{$abc->id_abc}}" readonly/>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Nombre</label>
                          <input type="text" class="form-control" name="nombre" id="codigo" required value="{{ $abc->nombre }}"/>
                      </div>
                      <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea type="text" maxlength="500" class="form-control" name="descripcion" id="descripcion" value="{{ $abc->descripcion }}">
                            </textarea>
                        </div>                    
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                          <select name="status" class="form-control" id="status">
                          	@if ($abc->activo == 1)
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                            @endif
        					          @if ($abc->activo == 0)
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                            @endif
                          </select> 
                         </div>
                        <script>
                          CKEDITOR.replace('descri_idioma');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('idioma.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection