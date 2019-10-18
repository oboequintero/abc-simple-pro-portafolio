@extends('layout')
<html>
  <title>AbcSimple</title>
 
  <div class="container-fluid">
  <h3>
     Detalles del paquete {{$paquetes->nombre}}     
     
     </br>
  </h3>
  
  </div>
  <div class="container-fluid">
      <div class="table-responsive">
           <table class="table">
              <thead>
                <tr>                                                      
                  <th>Código</th>
                  <th>Nombre</th>                  
                  <th>Desccripción</th>                  
                  <th>Activo</th>                                    
                </tr>
              </thead>

              <tbody>                  
                  
                        <tr>                                                    
                            <td>{{$paquetes->codigo}}</td>                     
                            <td>{{$paquetes->nombre}}</td>
                            <td>{{$paquetes->descripcion}}</td>                                                                            
                            <td>@if ($paquetes->activo == 1)
                                    SI
                                @else
                                    NO
                                @endif	
				                		</td>                        
                        </tr>                                  
              </tbody>            

           </table>
      </div>
  </div>
</html>
