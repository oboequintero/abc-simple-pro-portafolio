@extends('adminlte::layouts.app')
@section('main-content')

       
       <!--form id="form_paquete" action="{{route('paquete.index')}}" method="GET">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Paquetes"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
       </form-->

<section id="section-content-header" class="content-header">
      <h1>
        Editar Paquetes
        <!--small>Preview</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a >
				<form id="form_paquete" action="{{route('paquete.index')}}" method="GET">
                                        
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
																																	  
					<button type="submit" class="btn btn-primary btn btn-xs" data-toggle="tooltip" title="Regresar a Paquetes"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
				</form>
			</a>
		</li>
      </ol>
</section> <!--<section id="section-content-header"-->


<section id="section-contenent" class="content">       
       <div id="div1" class="row">
            <div id="div2" class="col-xs-12"> 
                <div id="div3" class="box box-primary"> 
                    <div id="div4" class="box-header"> 
                        <h3 class="box-title">Modificar datos</h3>   
					</div>	<!--div id="div4" class="box-header"-->

                    <div id="box-body_1" class="box-body">	
                                                                        
                        <div id="div_msg" class="{{$_class}}" style="{{$_display}}">
                                {{$_error_msg}}
                        </div> 
                                                                          
                            <form id="idformopcion" method="POST" action="{{url('paquete')}}/{{$_id_paquete}}">
                                 <input name="_method" type="hidden" value="PUT">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                 <div id="div-edit-1" class="well well-sm">
                                            
                                            <input type="hidden" name="idpaquete" value="{{$_id_paquete}}">
                                            
                                            <div id="div-edit-2" class="form-group">
                                                    <label for="exampleInputEmail">CÓDIGO</label>                                                    
                                                    
                                                    <input class="form-control mayuscula" type="text" name="codigo_paquete"  placeholder="CÓDIGO" value="{{ $_codigo }}" readonly>
                                            </div>  <!--div id="div-edit-2"-->
                                            
                                            <div id="div-edit-3" class="form-group">
                                                    <label for="exampleInputEmail">NOMBRE</label>                                                    
                                                    
                                                    <input class="form-control mayuscula" type="text" id="idnombre"  name="nombre_paquete"  placeholder="Nombre del paquete" value="{{$_nombre}}" required>
                                            </div> <!--div id="div-edit-3"-->
                                            
                                            <div id="div-edit-4" class="form-group">
                                                    <label>DESCRIPCIÓN</label>                                                    
                                                    
                                                    <input class="form-control mayuscula" type="text" id="iddescrip"  name="descrip_paquete"  placeholder="Descripción del paquete" value="{{$_descripcion}}" required>                  
                                            </div> <!--div id="div-edit-4" class="form-group"-->

                                            <div id="div-edit-5" class="form-group">
												  <label for="exampleInputEmail">Imagen</label>																												  	
                                                  <input id="file-upload" name="ruta" onchange='cambiar()' type="file" style='display: none;'/>
                                                  <div id="info">{{$_ruta}}</div> 

                                                  <label for="file-upload" class="subir">
														<i class="fas fa-cloud-upload-alt"></i> Subir archivo
												  </label>
                                                  
											</div> <!--div id="div-edit-5" class="form-group"-->

											<div id="div-edit-6" class="form-group">
												 <label for="exampleInputEmail">Precio</label>																		
												 <input type="number" id="idprecio" min="0" name="precio" class="form-control" placeholder="PRECIO" value="{{$_precio}}" required>
											</div> <!--div id="div-edit-6" class="form-group"-->

                                            <div id="div-edit-7" class="form-group">
                                                <label for="exampleInputEmail">ACTIVO</label>
                                                <select name="status" class="form-control">                                                                                        
                                                    @if($_activo)
                                                        <option value="1" selected="selected">SI</option>              
                                                        <option value="0"> NO</option>
                                                    @else                        
                                                        <option value="1"> SI</option>
                                                        <option value="0" selected="selected">NO</option>
                                                    @endif  
                                                </select>
                                            </div> <!--div id="div-edit-5" class="form-group"-->
                                                                                            
                                 </div> <!--Fin div id="div-edit1" class="well well-sm"-->
                                    <button class="btn btn-md btn-primary" type="submit" >Actualizar</button>
                            </form>                                              
                        
                    </div> <!--div id="box-body_1" class="box-body"-->
				</div> <!--div id="div3" class="box"--> 
            </div> <!--div id="div2"-->    
        </div> <!--div id="div1"-->   
</section><!--section id="section-contenent"--> 

@endsection
    