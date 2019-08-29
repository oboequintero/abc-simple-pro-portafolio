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
                    <h2>Registrar tips</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="idForm_Tips" method="POST" action="{{ url('tips')}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        			
        				        <div class="form-group">
                            <label for="varchar">Nombre</label>
                            <input id="IdNombreTips" type="text" name="nombre"  placeholder="nombre" class="form-control" required maxlength="20"/>
                        </div> 
        				        <div class="form-group">
                          <label for="int">Descripcion</label>
                            <textarea id="IdDescripcionTips" type="text" name="descripcion" placeholder="Descripcion" maxlength="500" class="form-control">
                            </textarea>
                        </div> 
                        <div class="form-group">
                          <label for="varchar">Estado del Nivel</label>
                           <select name="status" class="form-control"> 
                              <option value="1" selected="selected">Habilitado</option>              
                              <option value="0"> Deshabilitado</option>  
                            </select>
                         </div>
                        <script>
                          CKEDITOR.replace('IdDescripcionTips');
                        </script>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('tips.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
