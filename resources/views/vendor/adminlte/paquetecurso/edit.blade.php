
@extends('layout')

<html>
    <title>AbcSimple</title>
    
    <div class="container-fluid">
            <h3> Editar Paquete </h3>
            </br>
  
            <body>
                <form id="idformopcion" method="POST" action="{{url('paquete')}}/{{$paquetes->id_paquete}}">                                                        
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="idpaquete" value="{{$paquetes->id_paquete}}">

                        <div class="form-group">
                                <label for="exampleInputEmail">CÓDIGO</label>
                                </br>
                                <input class="form-control" type="text" name="codigo"  placeholder="CÓDIGO" value="{{ $paquetes->codigo }}" readonly>
                        </div>  
                        
                        <div class="form-group">
                                <label for="exampleInputEmail">NOMBRE</label>
                                </br>
                                <input class="form-control" type="text" id="idnombre"  name="nombre"  placeholder="Nombre del paquete" value="{{$paquetes->nombre}}" />
                        </div>
                        </br>
                        <div class="form-group">
                                <label>DESCRIPCIÓN</label>
                                </br>
                                <input class="form-control" type="text" id="iddescrip"  name="descripcion"  placeholder="Descripción del paquete" value="{{$paquetes->descripcion}}"/>                  
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="exampleInputEmail">ACTIVO</label>
                            <select name="status" class="form-control">                                    
                                @if($paquetes->activo)
                                    <option value="1" selected="selected">SI</option>              
                                    <option value="0"> NO</option>
                                @else                        
                                    <option value="1"> SI</option>
                                    <option value="0" selected="selected">NO</option>
                                @endif  
                            </select>
                        </div>


                        </br></br>
                        <input id="btt_Enviar" type="submit" value="Actualizar"/>
                                
                </form>
            </body>
    </div
</html>