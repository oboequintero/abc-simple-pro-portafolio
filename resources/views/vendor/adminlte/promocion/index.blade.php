@extends('adminlte::layouts.app')
@section('main-content')
<section class="content-header">
        <h1>
          Promociones
          <small>Lista</small>
        </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Promociones Registradas</h3>
                  <div class="col-md-1">
                      <form  method="get" action="{{ route('crear-promo') }}">
                          <input name="_method" type="hidden" value="get">
                          <button type="submit" class="btn btn-xs btn-primary"
                          data-toggle="tooltip" title="Ingresar Promociones">
                          <i class="glyphicon glyphicon-plus"></i></button>
                      </form>
                  </div>
              </div>
              <!-- /.box-header -->
          <div class="box-body">

          @if(!is_null($promocion))
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Promoción</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th style="text-align:center;">Precio</th>
                        <th>Activo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($promocion as $item)
                  <tr  id="detail">
                    <td>{{ $item->id_promocion}} </td>
                    <td>{{ $item->codigo}} </td>
                    <td>{{ $item->nombre}} </td>
                    <td>{{ $item->descripcion}} </td>
                    <td style="text-align:right;">{{  number_format($item->precio,2)  }}</td>
                    <td  style="text-align:center;  ">
                        <a href="#"
                            onclick="Modificar({{ $item->identidad }})">
                            <input  type="checkbox" data-toggle="toggle"
                            @if ($item->activo == 1)
                              checked
                            @endif
                            data-size="mini" >
                        </a>
                    </td>
                    <td style="width:100px;">
                        <a href="{{ route('promocion.edit',$item->id_promocion) }}" class="btn btn-xs btn-info">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a class="btn btn-xs">
                            <form  method="post" action="{{ route('lista_c') }}">
                               <input name="_method" type="hidden" value="post">
                               <input name="id_promocion" type="hidden" value="{{ $item->id_promocion }}">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <button type="submit"  class="btn btn-xs btn-success" data-toggle="tooltip" title="Ir a Paquetes por Promoción" >
                                 <i class="glyphicon glyphicon-book"></i>
                               </button>
                           </form>
                         </a>
                        <a href="#" class="btn btn-xs btn-warning">
                            <i class="glyphicon glyphicon-stats"></i>
                        </a>
                    </td>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
<script type="text/javascript">
function Eliminar(id,i) {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
    var parametros = {
        "identidad" : id,
        'token': "token"
        };
    var opcion = confirm("Está seguro de Eliminar?");
       if (opcion == true) {
        $.ajax({
            data:  parametros,
            url:   'elimi_pr',
            type:  'post',
            async:  false,
            dataType: "json",
        error: function() {
               alert('Ha surgido un error');
        },
        success:  function (data) {
            $("#span").html(data.datos);
            document.getElementsByTagName("table")[0].setAttribute("id","tabla");
            document.getElementById("tabla").deleteRow(i);
            alert('Elemento eliminado correctamente');
        }
        });
       }
}
</script>
@endsection


