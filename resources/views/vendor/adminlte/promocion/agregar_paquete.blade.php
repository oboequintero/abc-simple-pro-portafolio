@extends('layout')
<html>
	<div class="container-fluid">
		<h1>Agregar Paquete a Promocion </h1>
			
		<hr>
		<form method="post" action="/promocion/">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input name="id_promocion" type="hidden" value="{{ $id }}">
			
			
             <div  class="form-group">
				<label>SELECCIONE EL PAQUETE A AGREGAR</label>
				<select name="lista_id_paquete" class="form-control">
					@foreach($paquete as $row)
						<option  value={{$row->id_paquete}}>{{$row->codigo}}</option>
					@endforeach
				</select>
			 </div>

						<div class="col-lg-12 espacio"></div>
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit" >Agregar</button>
			</div>
		</form>
	</div>
</html>