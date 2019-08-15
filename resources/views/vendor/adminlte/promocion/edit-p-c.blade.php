@extends('layout')
<html>
	<div class="container-fluid">
		<h1>Editar PROMOCIÓN CURSO</h1>
			<h4><a href="{{ route('lista_curso',$id_promocion) }}">PROMOCIÓN CURSO</a></h4>
		<hr>
		<form method="post" action="/promocion/{{ $id_pr_c }}">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
	        
	        <input type="hidden"  name="id_promocion"  value="{{ $id_promocion }}">
			
			
			<div  class="form-group">
				<label>SELECCIONE CODIGO DEL CURSO</label>
				<select name="lista_id_curso" class="form-control" >
					

					 @foreach($cursos as $row)
                                    @if ($promocion_curso->id_curso == $row->id_curso)
                                        <option selected="selected" value={{$row->id_curso}}>{{$row->codigo}}</option>
                                    @else
                                       
                                        <option  value={{$row->id_curso}}>{{$row->codigo}}</option>
                                    @endif
                                @endforeach
				</select>
			</div>
			
           
			<div class="form-group">
				<label for="exampleInputEmail">ACTIVO</label>
				<select name="activo" class="form-control">
					@if ($promocion_curso->activo == 1)
                		<option value="1" selected="selected">SI</option>
                 		<option value="0">NO</option>
        			@endif
        			@if ($promocion_curso->activo == 0)
                		<option value="0" selected="selected">NO</option>
                  		<option value="1">SI</option>
					@endif
				</select>
			</div>	 
		
			<div class="col-lg-12 espacio"></div>
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit" >Actualizar</button>
			</div>

		</form>
	</div>
</html>