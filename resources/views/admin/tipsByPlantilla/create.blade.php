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
                    <h2>Registrar Plantillas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form   id="idForm_Plantilla" method="POST" action="{{ url('tipsbyplantilla')}}" enctype="multipart/form-data">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label for="varchar">Selecione la Plantilla</label>
                          <select name="idplantilla" class="form-control" >
                           @foreach($plantillas as $row)
                            <option value="{{$row->id_plantilla}}">{{$row->nombreplantilla}}</option>
                           @endforeach
                          </select> 
                         </div>   
                         <div class="form-group">
                          <label for="varchar">Selecione el Tips</label>
                          <select name="idtips" class="form-control" >
                           @foreach($tips as $row)
                            <option value="{{$row->id_tips}}">{{$row->nombretips}}</option>
                           @endforeach
                          </select> 
                         </div> 
                        <div class="col-xs-12 text-center">
                            <br><br>
                        <button type="submit" class="btn btn-primary">Registrar</button> 
                        <a href="{{ route('tipsbyplantilla.index') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection