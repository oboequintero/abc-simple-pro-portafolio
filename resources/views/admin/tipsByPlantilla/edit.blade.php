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
                    <h2>Editar Tips de Plantillas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form  id="idForm_Plantilla" method="POST" action="{{url('tipsbyp')}}/{{$tipsbyplantilla[0]->id_tipsByP}}" enctype="multipart/form-data">                           
                  </br></br>
                  <input name="_method" type="hidden" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="idtipsbyp" value="{{$tipsbyplantilla[0]->id_tipsByP}}">
                        <div class="form-group">
                            <label for="varchar">Plantilla</label>
                            <input id="idplantilla" type="text" name="plantilla"  placeholder="Nombre Plantilla" value="{{$tipsbyplantilla[0]->nombreplantilla}}" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tips</label>
                            <input id="idnombretips" type="text" name="tips"  placeholder="Nombre Tips" value="{{$tipsbyplantilla[0]->nombretips}}" />
                        </div>
                        <div class="form-group">
                          <label for="varchar">SELECCIONE TIPS</label>
                          <select name="idtips" class="form-control" >
                           @foreach($plantillas as $row)
                            <option value="{{$row->id_tips}}">{{$row->tips}}</option>
                           @endforeach
                          </select> 
                         </div>   
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Actualizar</button> 
                        <a href="{{ route('tipsbyplantilla.index') }}" class="btn btn-default">Cancelar</a>
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