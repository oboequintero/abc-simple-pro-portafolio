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
                    <h2>Registrar Plantilla</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="{{url:(admin/plantilla)}}" enctype="multipart/form-data">
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						            <input name="id_leccion" type="hidden" value="{{ $id }}">
                        @if($id==0)
                        <div  class="form-group">
                          <label>SELECCIONE EL CODIGO DE LECCION</label>
                          <select name="lista_id_leccion" class="form-control">
                            @foreach($leccion as $row)
                              <option value="{{$row->id_leccion}}">{{$row->codigo}}</option>
                            @endforeach
                          </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="varchar">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nombre plantilla</label>
                            <input type="text" class="form-control" name="nombre_plantilla" id="nombre_plantilla" placeholder="plantilla" required maxlength="20"/>
                        </div>
                        <div class="form-group">
                            <label for="int">Descripcion</label>
                              <textarea type="text" maxlength="500" class="form-control" name="descri_plantilla" >
                              </textarea>
                        </div>        
                        <div class="form-group">
                          <label>SELECCIONE EL TIPO DE PLANTILLA</label>
                          <select name="tipo_plantilla" class="form-control">
                            @foreach($tipo_p as $row)
                              <option>{{$row->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Pagina</label>
                            <input type="text" class="form-control" name="pag_plantilla" id="pag_plantilla" placeholder="Pagina" required maxlength="20"/>
                        </div>              
                        <div class="form-group">
                          <label for="varchar">Estado del plantilla</label>
                          <select name="activo_plantilla" class="form-control" id="activo_plantilla">
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitar</option>
                          </select> 
                         </div>
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('plantilla.show',$id) }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

