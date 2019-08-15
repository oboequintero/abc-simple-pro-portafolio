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
                    <h2>Editar Nivel</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  id="idForm_Tips" method="POST" action="{{url('tips')}}/{{$tips->id_tips}}"enctype="multipart/form-data">
			              </br></br>
			              <input name="_method" type="hidden" value="PUT">
			              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="varchar">Nombre </label>
                            <input id="idnombre" type="text" name="nombre" value="{{$tips->nombre}}" class="form-control" required maxlength="20"/>
                        </div>
                        <div class="form-grou">
                            <div class="form-group">
                                <label for="int">Descripcion</label>
                              <textarea id="iddescripcion" type="text" name="descripcion" value="{{$tips->descripcion}}" class="form-control">
                              </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                           <select name="status" class="form-control">              
			                      <option></option>
			                      @if($tips->activo)
			                        <option value="1" selected="selected">Habilitado</option>              
			                        <option value="0"> Deshabilitado</option>
			                      @else                        
			                        <option value="1"> Habilitado</option>
			                        <option value="0" selected="selected">Deshabilitado</option>
			                      @endif  
			                </select>
                         </div>
                        <script>
                          CKEDITOR.replace('iddescripcion');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('tips.index') }}" class="btn btn-default">Cancelar</a>
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

