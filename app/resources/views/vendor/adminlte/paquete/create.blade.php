@extends('adminlte::layouts.app')
@section('main-content')


<section id="section-content-header" class="content-header">
      <h1>
       Registro de Paquetes
        <!--small>Preview</small-->
      </h1>
      <ol class="breadcrumb">
        <li><a >
				<form id="form_paquete" action="{{route('paquete.index')}}" method="GET">
                                        
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
																																	  
					<button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Paquetes"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
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
                        <h3 class="box-title">Nuevo Paquete</h3>   
										</div>	<!--div id="div4"-->	

										<div id="box-body_1" class="box-body">	
													<!--Bloque que muestra u oculta mensaje de error-->
													@if(!empty($error_msg))
														<!--div id="div_msg" class="alert alert-danger" style="display:block"-->
														<div id="div_msg" class="{{$_class}}" style="display:block">
																{{$error_msg}}
														</div> <!--div id="div_msg"-->
													@else  
														<div id="div_msg" class="{{$_class}}" style="display:none">
															Mensaje de alerta                
														</div> <!--div id="div_msg2"-->
													@endif
												
												<!--Fin Bloque que muestra u oculta mensaje de error-->
				
												<form method="post" action="{{ url('paquete')}}">						
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														
														<input type="hidden" id="Registrar" name="registrarpaq" value="15">

														<div class="well well-sm">
																<div class="form-group">
																	<label for="exampleInputEmail">CÓDIGO</label>
																	<input type="text" name="codigo_paquete" class="form-control mayuscula" placeholder="CÓDIGO PAQUETE" value="{{$_cod}}"  required>									
																	
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail">NOMBRE PAQUETE</label>
																	<input type="text" name="nombre_paquete" class="form-control mayuscula" placeholder="NOMBRE PAQUETE" value="{{$_nomb}}" required>
																</div>			
																<div class="form-group">
																<label for="exampleInputEmail">DESCRIPCIÓN</label>
																	<input type="text" name="descrip_paquete" class="form-control mayuscula" placeholder="DESCRIPCIÓN" value="{{$_descrip}}" required>
																</div>
																
																<div class="form-group">
              														<label for="exampleInputEmail">Imagen</label>																												  	
																	<input id="file-upload" name="ruta" onchange='cambiar()' type="file" style='display: none;'/>
																	<div id="info">{{$_ruta}}</div>
																	
																	<label for="file-upload" class="subir">
																		<i class="fas fa-cloud-upload-alt"></i> Subir archivo
																	</label>																	
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail">Precio</label>																		
																	 <input type="number" id="idprecio" min="0" name="precio" class="form-control" placeholder="PRECIO" value="{{$_precio}}" required>
																</div>
																
																<div class="form-group">
																	<select name="activo_paquete" class="form-control">
																			<option value="1" selected="selected">SI</option>
																			<option value="0">NO</option>
																	</select>
																</div>
																<div class="col-lg-12 espacio"></div>
																
														</div> <!--div class="well well-sm"-->	
														
														<button id="1" class="btn btn-md btn-primary registrar" type="submit" >Registrar</button>													
														&nbsp;&nbsp;
														<button id="2" class="btn btn-md btn-primary registrar" type="submit" >Registrar y Continuar</button>
														
														
												</form>			
										</div>	<!--div id="box-body_1" class="box-body"-->	
				</div> <!--div id="div3" class="box"--> 								
			</div> <!--div id="div2" class="col-xs-12"--> 
		</div> <!--div id="div1" class="row"-->
</section><!--section id="section-contenent"-->



	<script type="text/javascript" language="JavaScript">

		function cambiar(){
			var pdrs = document.getElementById('file-upload').files[0].name;
			document.getElementById('info').innerHTML = pdrs;
		}
				
		$(function(){
			
			$(".registrar").on({click:    
            
				function(event){                               			
					//alert("dd");
					
					$("#Registrar").val($(this).attr("id"));															
				}
			});
		
		});
	</script>


@endsection




	