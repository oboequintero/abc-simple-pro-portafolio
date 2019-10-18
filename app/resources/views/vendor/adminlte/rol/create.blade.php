@extends('layout')
<html>
	<div class="container-fluid">
		<h1>Registro de Roles</h1>
		<h4><a href="{{ route('rol.index') }}">Listar Roles</a></h4>
		<hr>
		<form method="post" action="/rol/">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label for="exampleInputEmail">NOMBRE</label>
				<input type="text" name="nombre" class="form-control" placeholder="NOMBRE">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">SLUG</label>
				<input type="text" name="slug" class="form-control" placeholder="SLUG">
			</div>
			<div class="form-group">
			<label for="exampleInputEmail">DESCRIPCIÓN</label>
				<input type="text" name="descri_rol" class="form-control" placeholder="DESCRIPCIÓN">
			</div>
			<div class="col-lg-12 espacio"></div>
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit" >Registrar</button>
			</div>
		</form>
	</div>
</html>