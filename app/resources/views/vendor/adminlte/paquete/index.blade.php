@extends('adminlte::layouts.app')
@section('main-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <section id="section-content-header" class="content-header">
      <h1>
        Listado de Paquetes
        <!--small>Lista</small -->
      </h1>
      <ol class="breadcrumb">
         <li>
            <div id="divbuscar3" class="form-group">
                <form action="{{ action('PaqueteController@buscarpaquetes')}}" method="post">
                        <input name="_method" type="hidden" value="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                </form>
            </div> <!--div id="divbuscar3"-->
         </li>
      </ol>
    </section> <!--id="section-content-header"-->

    <!-- Main content -->
    <section id="section-contenent" class="content">
        <div id="div1" class="row">
            <div id="div2" class="col-xs-12">
                <div id="div3" class="box box-primary">
                    <div id="div4" class="box-header">                       
                        <div id="div5" class="col-xs-1 col-md-1">
                                <form  method="GET" action="{{ route('paquete.create') }}">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Agregar Paquete" ><i class="glyphicon glyphicon-plus"></i></button>

                                </form>
                        </div> <!--div id="div5"-->                        
                    </div> <!--div id="div4"-->

                    <div id="box-body_1" class="box-body">
                         <h4 class="box-title">Paquetes Registrados</h3>
                         <!--Bloque que muestra u oculta mensaje de error de erro-->
                         @if(!empty($error_msg))
                              <div id="div_msg" class="alert alert-danger" style="display:block">
                                    {{$error_msg}}
                              </div> <!--div id="div_msg"-->
                         @else
                              <div id="div_msg" class="alert alert-danger" style="display:none">
                                   Mensaje de alerta
                              </div> <!--div id="div_msg2"-->
                         @endif
                         <!--Fin Bloque que muestra u oculta mensaje de error de erro-->

                         @if(!is_null($paquetes))

                                <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Código</th>
                                             <th>Nombre</th>
                                             <th>Descripción</th>
                                             <th>Imagen</th>
                                             <th>precio</th>
                                             <th>Activo</th>
                                             <th>Acción</th>
                                         </tr>
                                     </thead>
                                     <tbody id="tbodysort">
                                           <?php $rowcount = 0; ?>  
                                           
                                           @if(empty($paquetes))
                                               <strong style= "font-weight: bold;">Búqueda sin resultados </strong>
                                           @else
                                               @foreach($paquetes as $item)
                                                    <tr data-paq= "{{$item->id_paquete}}">

                                                        <td> {{$item->codigo}}</td>
                                                        <td> {{$item->nombre}}       </td>
                                                        <td> {{$item->descripcion }} </td>
                                                        <td> {{$item->ruta }} </td>
                                                        <td> {{$item->precio }} </td>

                                                        <td>@if ($item->activo == 1)
                                                                    SI
                                                                @else
                                                                    NO
                                                                @endif
                                                        </td>

                                                        <td style="width:100%;" class="btn btn-xs">
                                                            <a class="btn btn-xs">
                                                                <form id="form_paquete" action="{{route('paquete.edit', -1)}}" method="post">
                                                                        <input name="_method" type="hidden" value="GET">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                        <input type="hidden" name="id_paq"  value="{{$item->id_paquete}}">

                                                                        <button type="submit" class="btn btn-xs btn-info" data-toggle="tooltip" title="Editar Paquete"><i class="glyphicon glyphicon-pencil"></i></button>

                                                                </form>
                                                            </a>

                                                            <a class="btn btn-xs">
                                                                <form id="form_cursosbypaquete" action="{{route('cursosbyidioma')}}" method="post">
                                                                            <input name="_method" type="hidden" value="GET">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                            <input type="hidden" name="cod_paq" type="hidden" value="{{$item->codigo}}">
                                                                            <input type="hidden" name="nomb_paq" type="hidden" value="{{$item->nombre}}">
                                                                            <input type="hidden" name="id_paq"  value="{{$item->id_paquete}}">
                                                                            <input type="hidden" name="id_idioma"  value="0">

                                                                            <button type="submit" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Contenido Paquete"><i class="glyphicon glyphicon-education"></i></button>

                                                                </form>
                                                            </a>

                                                            <a class="btn btn-xs">
                                                              <button data-idpaq='{{$item->id_paquete}}' data-paq= '{{$item->nombre}}' class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Eliminar Paquete" ><i class="glyphicon glyphicon-remove"></i></button>
                                                            </a>

                                                        </td>

                                                    </tr> <!--tr data-paq= "{{$item->id_paquete}}" class="column1 alert alert-success"-->
                                                    <?php $rowcount += 1; ?>  
                                               @endforeach {{--@foreach($paquetes as $item)--}}
                                           @endif {{--@if(empty($paquetes))--}}
                                           {{$rowcount}}

                                     </tbody> <!--tbody id="tbodysort"-->
                                </table> {{----table id="tbl_paquetes"--}}
                         @endif {{--@if(!is_null($paquetes))--}}

                    </div> <!--div id="box-body_1"-->
                </div> <!--div id="div3"-->
            </div> <!--div id="div2"-->
        </div>  <!--div id="div1"-->
  </section> <!--section id="section-contenent"-->


  <!--BLOQUE DE CODIGO javascript/jquery-->

  <script type="text/javascript" language="JavaScript">

        //$("#tbl_paquetes tbody").sortable();

        var data_r = new Object();
        var Obj_r  = new Object();
        var orden;

        Obj_r.div   = 'div_msg';



        $("#tbodysort").disableSelection();
        //$('#tbl_paquetes1 tbody').sortable({
        $('#tbodysort').sortable({
                    revert: true,
                    opacity: 0.6,
                    cursor: 'move',
                    axis:		'y',
                    placeholder: "ui-state-highlight",
                    start: function(event, ui) {
                        ui.item.startPos = ui.item.index();

                    },
                    stop: function(event, ui){

                    },
                    update: function(event, ui) {

                        data_r.orden  = ui.item.parent().sortable('toArray').toString();
                        data_r.posc_ini = ui.item.startPos + 1;
                        data_r.posc_fin = ui.item.index() + 1;

                        EjecutarAjaxNew(data_r, 'reordenar', 'post', Obj_r, reordenafila);
                    }
        });


        /**
         * Autor         : Arístides Cortesía
         * Descripción   : Función que realiza el llamado al ajax para eliminar un paquete
         * Parámetros    :
         *      _obj     : Recibe los objetos que contienen la información de la data enviar al ajax.
         */
        function EliminaPaquete(_obj){

                EjecutarAjaxNew(_obj.data, 'eliminandopaquete', 'post', _obj.obj, destroy_paq);

        };

        $(function(){

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });


            $('.btn-danger').on({click:
                    function (event)
                    {
                        event.preventDefault();


                        //Limpiar y ocultar el div de mensaje de errores.
                        mostrar('div_msg', "", true, "alert alert-danger", false, 0, false);

                        var Obj_Params = new Object();
                        var data       = new Object();
                        var obj_aux    = new Object();

                        data.id  = $(this).data('idpaq');
                        data.paq = $(this).data('paq');

                        obj_aux.div    = 'div_msg';

                        obj_aux.this   = this;

                        Obj_Params.data = data;
                        Obj_Params.obj  = obj_aux;

                        confirmar(event, "Eliminar paquete " + $(this).data('paq'), Obj_Params, EliminaPaquete);

                    }//function (event)
            }); //$('.btn-danger').on({click:


        });//$(function()

  </script>

@endsection



