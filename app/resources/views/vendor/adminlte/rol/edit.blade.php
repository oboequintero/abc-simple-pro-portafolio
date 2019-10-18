@extends('layout')
<html>
	<div class="container-fluid">
		<h1>Editar ROL</h1>
			<h4><a href="{{ route('rol.index') }}">Listar ROLES</a></h4>
		<hr>
		<form method="post" action="/rol/{{ $rol->id }}">
			<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label for="exampleInputEmail">NOMBRE</label>
				<input type="text" name="nombre" class="form-control" placeholder="NOMBRE" value="{{ $rol->name }}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">SLUG</label>
				<input type="text" name="slug" class="form-control" placeholder="SLUG" value="{{ $rol->slug }}" >
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">DESCRIPCIÓN</label>
				<input type="text" name="descri_rol" class="form-control" placeholder="DESCRIPCIÓN"  value="{{ $rol->description }}">
			</div>
			<div class="col-lg-12 espacio"></div>
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit" >Actualizar</button>
			</div>
		</form>
	</div>
</html>