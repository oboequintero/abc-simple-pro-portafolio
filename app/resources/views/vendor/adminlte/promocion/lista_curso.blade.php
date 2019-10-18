@extends('adminlte::layouts.app')
@section('main-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<section class="content-header">
        <h1>
          Lista de Paquetes por Promocion
        </h1>
</section>
<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                  <div class="col-xs-1 col-md-1">
                  </div>
            </div>
<!-- /.box-header -->

<div class="box-body ">
        <div class="well well-sm col-xs-4 ">
            <div class="input-group ">
                <span class="input-group-addon">Código</span>
                <input type="text" class="form-control" id="i_n_promo" name="n_promo" value="{{$promo->codigo}}" readonly >
                <input type="hidden" class="form-control" id="id_promo" name="name_promo" value="{{$promo->id_promocion}}">
            </div>
        </div>
        <div class="well well-sm col-xs-5 ">
            <div class=" input-group">
                <span class="input-group-addon">Nombre</span>
                <input type="text" class="form-control" id="i_n_promo" name="n_promo" value="{{$promo->nombre}}" readonly >
            </div>
        </div>
        <div class="well well-sm col-xs-3 ">
            <div class=" input-group " style="text-align:center">
                <span class="input-group-addon">$</span>
                <input id="id_precio" type="number" name="precio" class="form-control"
                 style="text-align:center" value="{{$promo->precio}}"
                 placeholder="Total promoción"  onkeyup="Descuento()">
            </div>
        </div>

        <div class="well well-sm col-xs-2 text-center ">
            <label>Activo  :</label>
            <input id="activo" style="text-align:right" value="{{$promo->activo}}" type="checkbox" data-toggle="toggle"
                @if($promo->activo == 1) checked @endif >
        </div>

        <div class="well well-sm col-xs-2 text-center ">
            <label>Free  :</label>
            <input id="free" style="text-align:right" value="{{$promo->gratis}}"  type="checkbox" data-toggle="toggle"
                data-onstyle="success" @if($promo->gratis == 1) checked @endif >
        </div>

        <div class="well well-sm col-xs-5 ">
            <div class=" input-group">
                <span class="input-group-addon">Total Paquetes</span>
                <input type="number" class="form-control" id="total_p" name="n_promo" style="text-align:center" value="{{$totalpaquetes[0]->precio}}" readonly >
            </div>
        </div>

        <div class="well well-sm col-xs-3 ">
            <div class=" input-group">
                <span class="input-group-addon">% Descuento</span>
                <input type="text" id="percent" class="form-control" style="text-align:center" value="{{$descuento}}"  readonly>
            </div>
        </div>
   <!--<div class="well well-xs">
        <div class="row">
             <div id="div_msg" class="alert alert-danger" style="display:none" >

             </div>

             <div class="col-xs-3">
                 <label>SELECCIONE UN CURSO:</label>
             </div>
             <div class="col-xs-6">
                <select id="id_lista_curso" name="lista_curso" class="form-control" onchange="cambio()">
                    @foreach($curso as $row)
                        <option value="{{$row->id_curso}}"> {{$row->nombre}}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-xs-1">
                               <button type="submit" class="btn  btn-sm btn-primary" data-toggle="tooltip" title="Agregar curso" style="width:150px;"
                               onclick="Agregar(1)">
                   <i class="glyphicon glyphicon-plus"></i>Agregar Curso</button>
             </div>

         </div>
    -->
        <div class="well well-sm col-xs-8 ">
          <div class=" input-group">
                <span class="input-group-addon">Seleccione</span>
            <select id="id_lista_paquete" name="lista_paquete" class="form-control" >
                @foreach($paquete as $row)
                    <option value="{{$row->id_paquete}}"> {{$row->nombre}}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="well well-sm col-md-2 text-center ">
            <button class="btn btn-md btn-success" data-toggle="tooltip" title="Agregar paquete"
                onclick="Agregar(2)">
             <i class="glyphicon glyphicon-plus"></i></button>
        </div>
        <div class="well well-sm col-md-2 text-center ">
            <button  class="btn btn-md btn-primary " data-toggle="tooltip" title="Guardar cambios Promoción"
                onclick="Modificar_promo()">
             <i class="glyphicon glyphicon-floppy-disk"></i></button>
        </div>

    </div>


  <table id="example" class="table table-bordered table-striped" >

        <thead>
            <tr>
              <th>Id</th>
              <th>Código</th>
              <th>Nombre</th>
              <th style="text-align:center;">Precio</th>
              <th style="text-align:center; width:135px">Activo-Promo</th>
              <th>Acción</th>
            </tr>
        </thead>
        @if($data)
        <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{ $row->identidad}}</td>
            <td>{{ $row->codigo }}</td>
            <td>{{ $row->nombre }}</td>
            <td style="text-align:right;">{{ number_format($row->precio, 2) }}</td>
            <td  style="text-align:center;  ">
                <a href="#"
                    onclick="Modificar({{ $row->identidad }})">
                    <input  type="checkbox" data-toggle="toggle"
                    @if ($row->activo == 1)
                      checked
                    @endif
                    data-size="mini" >
                </a>
            </td>
            <td style="width:30px; text-align:center;  ">
                <a href="#" id='ref-eliminar' class="btn btn-xs btn-danger"
                    onclick="Eliminar({{ $row->identidad }},this.parentNode.parentNode.rowIndex)">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
          </tr>
        </tbody>
        @endforeach
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
            'identidad' : id,
            'token': "token"
            };

      var opcion = confirm("Está seguro de Eliminar?");
        if (opcion === true) {
        $.ajax({
                data:  parametros,
                url:   'elimi_promo',
                type:  'post',
                async:  true,
                dataType: "json",
                error: function(data) {
                    alert('Ha surgido un error');
                },
                success:  function (data) {
                    document.getElementsByTagName("table")[0].setAttribute("id","example");
                    document.getElementById("example").deleteRow(i);

                    $("#percent").val(data.descuento);
                    $("#total_p ").val(data.total_p);

                    swal('Elemento eliminado correctamente');
                }
            });
          }
    }

    function Modificar(id) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
        var parametros = {
            'identidad' :id,
            'token': "token"
            };

        $.ajax({
                data:  parametros,
                url:   'mod_pro_pa',
                type:  'post',
                async:  true,
                dataType: "json",
                error: function(data) {
                    alert('Ha surgido un error');
                },
                success:  function (data) {
                    $("#percent").val(data.descuento);
                    $("#total_p ").val(data.total_p);

                }
            });

    }

    function Modificar_promo() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });

       var parametros = {
            'identidad': $('#id_promo').val(),
            'free' : $("#free").val(),
            'activo' : $("#activo").val(),
            'precio' : $("#id_precio").val(),
            'token': "token"
            };
        $.ajax({
            data:  parametros,
            url:   'mod_pro',
            type:  'post',
            async:  true,
            dataType: "json",
            error: function(data) {
                swal('Ha surgido un error');
            },
            success:  function (data) {
                swal('Promoción modificada exitosamente');
            }
        });
    }

    function Agregar (tipo) {

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });

          if (tipo==1) {
            identidad= $('#id_lista_curso').val();
            }
          if (tipo==2) {
            identidad= $('#id_lista_paquete').val();
          }

          var parametros = {
            "id_p"      : $('#id_promo').val(),
            "identidad" : identidad,
            "tipo"      : tipo,
            'token': "token"
            };
           $.ajax({
               data:  parametros,
               url:   'buscar_p',
               type:  'post',
               async:  true,
               dataType: "json",
           error: function() {
                  alert('Ha surgido un error');
           },
           success:  function (data) {
            var trHTML = '';
            if(tipo==1){
                if (data.id==0) {
                    trHTML += '<tbody><tr>'
                    + '<td>' + data.id_tabla + '</td>'
                    + '<td>' + data.data.codigo + '</td>'
                    + '<td>' + data.data.nombre +'</td>'
                    + '<td style="text-align:right;">' + data.data.precio +'</td>'
                    + '<td style="text-align:center; "><a href="#"onclick="Modificar('+ data.id_tabla +')"><input  type="checkbox" data-toggle="toggle" checked data-size="mini" ></a></td>'
                    + '<td style="width:30px; text-align:center; "><a href="#" class="btn btn-xs btn-danger onclick="Eliminar('+ data.id_tabla +',this.parentNode.parentNode.rowIndex)"><i class="glyphicon glyphicon-remove"></i></a></td></tr>  </tbody>';
                    $('#example').append(trHTML);
                    $("[data-toggle='toggle']").bootstrapToggle('destroy')
                    $("[data-toggle='toggle']").bootstrapToggle();
                } else {
                    swal('EL curso ya existe para esa promoción');
                }
            }
            if(tipo==2){
                if (data.id==0) {
                    trHTML += '<tbody><tr>'
                    + '<td>' + data.id_tabla + '</td>'
                    + '<td>' + data.data.codigo + '</td>'
                    + '<td>' + data.data.nombre +'</td>'
                    + '<td style="text-align:right;">' + data.data.precio +'</td>'
                    + '<td style="text-align:center; "><a href="#"onclick="Modificar('+ data.id_tabla +')"> <input  type="checkbox" data-toggle="toggle" checked data-size="mini" ></a></td>'
                    + '<td style="width:30px; text-align:center; "><button class="btn btn-xs btn-danger" onclick="Eliminar('+ data.id_tabla +',this.parentNode.parentNode.rowIndex)"><i class="glyphicon glyphicon-remove"></i></button></td></tr>  </tbody>';
                    $('#example').append(trHTML);
                    $("#percent").val(data.descuento);
                    $("#total_p ").val(data.total_p);
                    $("[data-toggle='toggle']").bootstrapToggle('destroy')
                    $("[data-toggle='toggle']").bootstrapToggle();
                } else {
                    swal('EL paquete ya existe para esa promoción');
                }
               }
           }
       });
      }

    function Descuento() {
        var precio  = $("#id_precio").val();
        var total_p = $("#total_p").val();
        var n       = (total_p-precio)/total_p*100;
        var num     = n.toFixed(2)
        $("#percent").val(num);

    }
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });

         $( "#id_precio" ).click(function() {
            Descuento();
            });
        $( "#free" ).change(function() {
            if ($("#free").val()==0) {
                $("#free").val(1);
            }
            else{
                $("#free").val(0);
            }
        });
        $( "#activo" ).change(function() {
            if ($("#activo").val()==0) {
                $("#activo").val(1);
            }
            else{
                $("#activo").val(0);
            }
        });
    });


</script>

@endsection
