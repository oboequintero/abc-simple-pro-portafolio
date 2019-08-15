@extends('adminlte::layouts.app')
@section('main-content')

  <section id="section-content-header" class="content-header">
      <h1>
       Registro de Nivel
       <small>Registro</small>
        <!--small>Preview</small-->
      </h1>
      <ol class="breadcrumb">
        @if($id_curso == 0)
            <li><a href="{{ route('idioma.index') }}">Idioma: Todos</a></li>
            <li><a href="{{ route('curso.index') }}">Cursos: Todos</a></li>
        @else
            <li><a href="{{ route('idioma.index') }}">Idioma: {{$idioma->nombre}} </a></li>
            <li><a href="{{ route('curso.index')}}">Curso: {{$curso->nombre}}</a></li>
		@endif
            <li class="active"><a href="{{ route('nivel.index'  ) }}">Niveles: Todos</a></li>
      
           <li><a>
				<form id="form_paquete" action="{{route('nivel.index')}}" method="GET">
                                        
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
																																	  
					<button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar a Niveles"><i class="glyphicon glyphicon-chevron-left"></i></button>                                                                            
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
                        <h3 class="box-title">Nuevo Nivel</h3>   
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
				
												<form method="post" action="{{ url('nivel')}}">						
														<input type="hidden" name="_token" value="{{ csrf_token() }}">

														<input name="id_curso" type="hidden" value="{{ $id_curso }}">
	            
														
<div class="well well-sm">
<div class="box-body">
	            @if($id_curso==0) 
		             <div class="form-group">
		                <label>Curso</label>
		                <select class="form-control select2" name="lista_id_curso" style="width: 100%;">
		                  @foreach($data as $row)
							<option value="{{ $row->id_curso }}">{{$row->nombre}}</option>
						  @endforeach
		                </select>
		            </div>
		        @endif
		            
	              


														
																<div class="form-group">
																	<label for="exampleInputEmail">Código</label>
																	<input type="text" name="codigo" class="form-control mayuscula" placeholder="Ingrese el Código" value="{{$_cod}}"  required>									
																	
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail">Nombre</label>
																	<input type="text" name="nombre_nivel" class="form-control mayuscula" placeholder="Ingrese el Nombre" value="{{$_nomb}}" required>
																</div>			
																<div class="form-group">
																<label for="exampleInputEmail">Descripción</label>
																	<input type="text" name="descri_nivel" class="form-control mayuscula" placeholder="Ingrese la Descripción" value="{{$_descrip}}" required>
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
		               <label>Estado</label>
		               <select class="form-control select2" name="activo_nivel" style="width: 100%;">
			                <option selected="selected">Seleccione una Opcion</option>
			                <option value="1" selected="selected">Habilitado</option>
						  	<option value="0">Deshabilitado</option>
		               </select>
		            </div>
	              
																
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

