@extends('layout')

<html>
<div class="container-fluid">
    <h1>Lista de PAQUETES</h1>
    <form  method="GET" action="{{ route('agregar_paquete') }}">
		<input name="_method" type="hidden" value="GET">
		<input name="id_promocion" type="hidden" value="{{ $id }}">
		<button type="submit" class="btn btn-lg btn-primary"> + </button>
	</form>

	<div class="table-responsive">
		@if($data)
			<table class="table">
				<thead>
					<tr>
					<th>ID Paquete</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Activo</th>
					
						
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($data as $row)
			
					<tr>
					    <td>{{ $row->id_paquete }}</td>
					    <td>{{ $row->codigo }}</td>
					    <td>{{ $row->descripcion }}</td>

						<td>@if ($row->activo == 1)
                      SI
                    @endif
                    @if ($row->activo == 0)
                      NO
                    @endif  
						</td>
						
						 <td style="width:30px;">
                  <a href="{{ route('edit-p-p',[$id,$row->id_pr_pa]) }}" class="btn btn-info">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                </td>
                </tr>
				</tbody>
				@endforeach 
			</table>
		@endif	
	</div>
	</div>
</html>