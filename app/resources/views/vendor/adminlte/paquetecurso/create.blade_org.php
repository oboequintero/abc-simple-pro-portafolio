@extends('adminlte::layouts.app')
@section('main-content')

        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        <section id="section-content-header" class="content-header">
            <h1>
                Asociar Cursos a Paquetes
                <!--small>Preview</small-->
            </h1>
            <ol class="breadcrumb">
                <li><a >
                        <form id="form_paquete" action="{{route('paquete.index')}}" method="GET">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Regresar"><i class="glyphicon glyphicon-chevron-left"></i></button>

                        </form>

                    </a>
                </li>
            </ol>
        </section> <!--<section id="section-content-header"-->


        <section id="section-contenent" class="content">
                <div id="div1" class="row">
                    <div id="div2" class="col-xs-12">
                        <div id="div3" class="box box-primary">
                            <div id="div4" class="box-header">
                                <h3 class="box-title">Asociar</h3>
                            </div>	<!--div id="div4"-->

                            <div id="box-body_1" class="box-body">

                                    <form id="form-cursosbyidioma" action="{{ route('cursosbyidioma')}}" method="POST">
                                            <input name="_method" type="hidden" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <input type="hidden" name="id_paq" value="{{$_id_paq}}">


                                            <div id="div-class-well-1" class="well well-sm">
                                                <div id="div-row1" class="row">
                                                    <div class="col-xs-5">
                                                        <div class="input-group ">
                                                            <label for="exampleFormControlFile1" class="input-group-addon">Código</label>                                                            
                                                            <input type="text" id="id_cod_paq" name="cod_paq" class="form-control" value = "{{$_cod_paq}}" readonly>
                                                        </div>    
                                                    </div>                                                    
                                                    <div class="col-xs-6">
                                                        <div class="input-group">
                                                            <label for="exampleFormControlFile1" class="input-group-addon">Nombre Paquete</label>                                                            
                                                            <input type="text" id="id_nomb_paq" name="nomb_paq" class="form-control" value = "{{$_paquete}}" readonly>
                                                        </div>    
                                                    </div>
                                                    
                                                </div> <!--div id="div-row1"-->
                                                <br>
                                                <div id="div-row2" class="row">
                                                    <div class="col-xs-5">
                                                        <div class="input-group">
                                                            <label for="exampleFormControlFile1" class="input-group-addon">Idioma</label>
                                                            <select id="select_idioma" name="id_idioma" class="form-control" placeholder="Idioma">
                                                                    <option value="0" selected> Todos </option>
                                                                    @foreach($_idiomas as $item)

                                                                        @if($item->id_idioma == $_id_idioma)
                                                                            <option value="{{$item->id_idioma}}" selected="selected"> {{$item->idioma}} </option>
                                                                        @else
                                                                            <option value="{{$item->id_idioma}}"> {{$item->idioma}}</option>
                                                                        @endif
                                                                    @endforeach

                                                            </select>
                                                        </div> <!--Fin div class="input-group"-->
                                                    </div> <!--Findiv class="col-xs-3"-->

                                                    <div class="col-xs-3">
                                                        <div class="input-group">
                                                            <label for="exampleFormControlFile1" class="input-group-addon">Tipos</label>
                                                            <select id="select_tipo_cursos" name="select-tipo-cursos" class="form-control" placeholder="Curso">
                                                                    <option value="0" selected> Todos </option>
                                                                    <option value="1"> Asociados </option>
                                                                    <option value="2"> No Asociados </option>
                                                            </select>
                                                        </div> <!-- Findiv class="input-group"-->    
                                                    </div> <!--div class="col-xs-3"-->

                                                    <div class="col-xs-3">
                                                        <div class="input-group">
                                                            <label for="exampleFormControlFile1" class="input-group-addon">Status</label>
                                                            <select id="select_status_cursos" name="select-status-cursos" class="form-control" placeholder="Curso">
                                                                    <option value="0" selected> Todos </option>
                                                                    <option value="1"> Habilitado </option>
                                                                    <option value="2"> Deshabilitado </option>
                                                            </select>
                                                        </div> <!--div class="input-group"-->    
                                                    </div>

                                                </div> <!--div id="div-row2" class="row"-->
                                            </div> <!--div id="div-class-well-1"-->
                                    </form> <!--<form id="form-cursosbyidioma"-->

                                    <form id="form-asocia-curso" method="POST" action="{{ url('paquetecurso')}}">

                                            <input name="_method" type="hidden" value="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <input type='hidden', name='_id_paq' value="{{$_id_paq}}">

                                            @if(!($_error_msg == ""))
                                                <div id="div_msg" class="alert alert-danger" style="display:block" >
                                                    {{$_error_msg}}
                                                </div>
                                            @else
                                                <div id="div_msg" class="alert alert-danger" style="display:none" >

                                                </div>
                                            @endif

                                            <div id="div_cursos" class="table-responsive" >
                                                @if(!is_null($cursosasociados))
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr id="encabezado">
                                                                <th scope="row">Código</th>
                                                                <th>Curso</th>
                                                                <th>Idioma</th>                                                                                                                                   
                                                                <th>Agregar <br/> Quitar
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    Habilitado
                                                                </th>                                                                 
                                                            </tr>
                                                            
                                                        </thead>

                                                        <tbody >          
                                                            <?php $rowcount = 0; ?>                                                    
                                                            @if(empty($cursosasociados))
                                                                <strong style= "font-weight: bold;">Búqueda sin resultados </strong>
                                                            @else
                                                                @foreach($cursosasociados as $item)                                                                   
                                                                    <tr data-fila="{{$item->id_paq_curso}}" id="tr{{$item->id_curso}}" style="background-color:#{{$item->color}}" class="{{$item->asociado}}">
                                                                        <!--td style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">{{ $item->codigo}}</td-->
                                                                        <td>{{ $item->codigo}}</td>
                                                                        <td>{{ $item->curso}}</td>
                                                                        <td>{{ $item->idioma}} </td>                                                                         
                                                                        
                                                                        <!--td style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"-->
                                                                        <td>
                                                                            <div class="form-check">

                                                                                @if ($item->asociado === 1)                                                                                    
                                                                                    <button type="button" data-idcurso='{{$item->id_curso}}' data-curso= '{{$item->curso}}' class="btn btn-xs btn-danger glyphicon glyphicon-minus asosia-curso-db asociado" ></button>                                                                                                                                                                                
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    @if ($item->activo === 1)                                                                                                                                                                                                                                                                                    
                                                                                         <button type="button" id="chk{{$item->id_curso}}" name="{{$item->id_curso}}" class="btn btn-primary btn-xs btn-activa" > On </button>
                                                                                    @else                                                                                                                                                                                       
                                                                                         <button type="button" id="chk{{$item->id_curso}}" name="{{$item->id_curso}}" class="btn btn-secondary btn-xs btn-activa"> Off</button>
                                                                                     @endif                                                                                        
                                                                                    
                                                                                @else                                                                                    
                                                                                    <button type="button" data-idcurso='{{$item->id_curso}}' data-curso= '{{$item->curso}}' class="btn btn-xs btn-info glyphicon glyphicon-plus asosia-curso-db"></button>                                                                                    
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    <button type="button" id="chk{{$item->id_curso}}" name="{{$item->id_curso}}" class="btn btn-secondary btn-xs btn-activa">Off</button>
                                                                                @endif
                                                                            </div>
                                                                        </td>                                                                                                                                                
                                                                    </tr>
                                                                    <?php $rowcount += 1; ?>  
                                                                @endforeach                                                                
                                                            @endif
                                                            {{$rowcount}}
                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div> <!--div id="div_cursos"-->

                                    </form> <!--Fin Form id="form-asocia-curso"-->

                            <div id="box-body_1" class="box-body"> <!--div id="box-body_1" class="box-body"-->
                        </div> <!--div id="div3" class="box"-->
                    </div> <!--div id="div2" class="col-xs-12"-->
                </div> <!--div id="div1" class="row"-->
        </section><!--section id="section-contenent"-->


        <script type="text/javascript" language="JavaScript">
                        /***
                         Autor         : Arístides Cortesía
                        Descripción   : Función que permite actualizar el status del curso asociado al paquete.
                                        Indica si el curso está asociado o no.
                        Parámetros    :
                        _data        : Recibe, en formato json toda la información
                                        correspondiente al estado actual del checkbox.
                        _obj         : Recibe todos los elementos a afectar o datos a mostrar.
                        ***/
                        function refrech_statusapaquetecurso(_data, _obj){
                            
                            if(_data['_ok'] === 0)

                            {                                   
                                //Eliminar la fila deshabilitada
                               //
                                if(!($("#select_status_cursos").val() == 0)){                                    
                                    destroy_paq(_data, _obj);
                                    
                                    if($("#tbl_cursos tr").length == 1){
                                        $("#select_status_cursos").val("0").change();
                                    }                                                                       
                                }

                                //Actualizar el texto del botón.
                                $(_obj.this).html(_data['_flag']);

                                //alert(_data['_flag']);                                                               
                                if(_data['_flag'] === "On"){
                                    $(_obj.this).addClass('btn-primary').removeClass('btn-secondary');
                                    //$(_obj.this).attr({title: "Activado"});
                                }
                                else{
                                    $(_obj.this).addClass('btn-secondary').removeClass('btn-primary');                                    
                                    //$(_obj.this).attr({title: "Desactivado"});
                                }
                                
                                mostrar(_obj.div, _data["_msg"], true, "alert alert-info", true, 500, true);
                                
                            }    
                            else{                                 
                                mostrar(_obj.div, _data["_msg"], true, "alert alert-danger", true, 0, false);
                            }
                        }

                        /***
                         Autor         : Arístides Cortesía
                        Descripción   : Función que permite actualizar el row para indicar si el curso se ha asociado o no.
                        Parámetros    :
                        _data        : Recibe, en formato json toda la información
                                        correspondiente al estado actual del checkbox.
                        _obj         : Recibe todos los elementos a afectar o datos a mostrar.
                        ***/
                        function refresh_asociar(_data, _obj){
                            var color;                            
                           
                            if(_data['_ok'] === 0){

                                color = "#" + _data["_color"];
                               
                                ///////////////////////
                                if(!($("#select_tipo_cursos").val() == 0)){                                    
                                    destroy_paq(_data, _obj);
                                    
                                    if($("#tbl_cursos tr").length == 1){
                                        $("#select_tipo_cursos").val("0").change();
                                    }                                                                       
                                }
                                ///////////////////////////
                                $(_obj.this).closest('tr').css("backgroundColor", color); 
                                                                
                                if($(_obj.this).hasClass( "btn-info" )){
                                    $(_obj.this).addClass('btn-danger glyphicon-minus').removeClass('btn-info glyphicon-plus');
                                    
                                    $(_obj.this).closest('tr').addClass('1').removeClass('0');  

                                    $("#" + _obj.chk).addClass('btn-primary').removeClass('btn-secondary');  
                                    $("#" + _obj.chk).html('On');

                                }
                                else{
                                    $(_obj.this).addClass('btn-info glyphicon-plus').removeClass('btn-danger glyphicon-minus asociado');                                    
                                    
                                    $(_obj.this).closest('tr').addClass('0').removeClass('1');  
                                                                    
                                    $("#" + _obj.chk).addClass('btn-secondary').removeClass('btn-primary');
                                    $("#" + _obj.chk).html('Off');
                                }                                

                            }
                            else{
                                mostrar(_obj.div, _data["_msg"], true, "alert alert-danger", true, 0, false);
                            }

                        }

                        
                        function click_checkbox(chkbox, e){
                        var data = new Object();
                        var Obj_Params = new Object();
                        var chk;
                        var row;
                        var span;
                        var color_asociado    = "background-color:#CCFFFF";
                        var status_actual;
                            
                                                                                                               
                            mostrar('div_msg', "", true, "", false, 0, false);
                            
                            //Si está asociado
                            if($(e).closest('tr').hasClass("1"))
                            {                                                                  
                                    //Indicar el id del paquete
                                    data.idpaquete = "{{$_id_paq}}";

                                    chk = document.getElementById(chkbox);

                                    data.idcurso   = chk.name;

                                    if($(e).hasClass( "btn-primary" )){ 
                                        status_actual = 1;
                                        
                                        //Desactivar
                                        data.activo  = 0;
                                    }
                                    else{                                        
                                        status_actual = 0;
                                        
                                        //Activar
                                        data.activo  = 1;
                                    }

                                    if(!(data.idpaquete === "") && !(data.idcurso === "")){

                                        Obj_Params.div  = "div_msg";
                                        Obj_Params.this  = e;

                                        Obj_Params.status_actual = status_actual;

                                        EjecutarAjaxNew(data, 'activarpaquetecurso', 'post', Obj_Params, refrech_statusapaquetecurso);

                                    }
                                    else{
                                        //Poner el div visible y asignarle nuevo contenido                                        
                                        mostrar('div_msg', "Adventencia: El Id del paquete o el Id del curso están vacíos", true, "alert alert-danger", true, 0, false);
                                    }
                            } //Fin if($(e).closest('tr').attr("style") === color_asociado)
                           else{                                
                                mostrar('div_msg', "Adventencia: Curso no asociado.", true, "alert alert-warning", true, 0, false);
                            }
                        }  // Fin clik_checkbox()
                       
                        
                        //////////////////////////////////////////////
                        //Autor: Arístides Cortesía
                        //Descripción: Función que permite dibujar los checkbox y datos obtenidos de la
                        //             petición ajax del combobox idiomas
                        //datos: Recibe los datos a ser dibujado en la pantalla.
                        //objs : Recibe los objetos a modificar según la respuesta datos['_ok'].
                        function peticion_selectbox(datos, objs){

                            if(datos['_ok'] === 0)
                            {
                                var tr    = "";
                                var label = "";
                                var input = "";
                                var span  = "";
                                var aux   = "";
                                var btt   = "";
                                var tipo_cursos = "";
                                var habilitados = "";
                                var tabla_name;
                                

                                    tabla_name = '#example1';                                                                                       

                                    tipo_cursos = $("#select_tipo_cursos").val();
                                    habilitados = $("#select_status_cursos").val();

                                    for (item in datos._msg)
                                    {
                                        aux =  'chk'+ datos._msg[item].id_curso;
                                        
                                        if(datos._msg[item].asociado)
                                        {
                                                //Si elpaquete está habilitado
                                                if(datos._msg[item].activo)
                                                {                                                                                                        
                                                    input = '<button type="button" id="'+ aux +'" name="'+ datos._msg[item].id_curso +'" class="btn btn-primary btn-xs btn-activa">On</button>';
                                                }
                                                else{//Si el curso está deshabilitado
                                                                                                      
                                                    input = '<button type="button" id="'+ aux +'" name="'+ datos._msg[item].id_curso +'" class="btn btn-secondary btn-xs btn-activa">Off</button>';
                                                }

                                                btt  = '<button data-idcurso="'+ datos._msg[item].id_curso +'" data-curso= "'+ datos._msg[item].id_paquete +'" class="btn btn-xs btn-danger glyphicon glyphicon-minus asosia-curso-db" type="button"></button>'
                                                btt += '&nbsp;&nbsp;'

                                                span  = '<span id="span'+ datos._msg[item].id_curso +'"></span>'
                                        }
                                        else{                                                
                                                input = '<button type="button" id="'+ aux +'" name="'+ datos._msg[item].curso +'" class="btn btn-secondary btn-xs btn-activa">Off</button>';

                                                btt   = '<button data-idcurso="'+ datos._msg[item].id_curso +'" data-curso= "'+ datos._msg[item].curso +'" class="btn btn-xs btn-info glyphicon glyphicon-plus asosia-curso-db" type="button"></button>';
                                                btt += '&nbsp;&nbsp;'

                                                span = '<span id="span'+ datos._msg[item].id_curso +'"></span>'

                                        } // Fin if(datos._msg[item].asociado)

                                        label = '<label>' + input + '</label>'

                                        tr = '<tr  data-fila="'+ datos._msg[item].id_paq_curso + '" style= "background-color:#' + datos._msg[item].color + '" id="tr' + datos._msg[item].id_curso  +'" class="'+ datos._msg[item].asociado +'">'                                        

                                        tr += '<td>' + datos._msg[item].codigo + '</td>'
                                        tr += '<td>' + datos._msg[item].curso + '</td>'
                                        tr += '<td>' + datos._msg[item].idioma + '</td>'
                                        
                                        tr += '<td>' + btt + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + label + '</td>'
                                        tr += '</tr>';
                                                                                
                                        if(tipo_cursos != 0) 
                                        {                                           
                                            if((tipo_cursos == 1) && (datos._msg[item].asociado))
                                            {                            
                                                if((datos._msg[item].activo) && (habilitados == 1))
                                                {                                                                                                       
                                                    $(tabla_name)).append(tr);                                                                                                                           
                                                }
                                                else
                                                if((!(datos._msg[item].activo == null) && (!datos._msg[item].activo)) && (habilitados == 2))
                                                {                                                                                                        
                                                    $(tabla_name).append(tr);                                                   
                                                } 
                                                else
                                                if(habilitados == 0)
                                                {                                                                                                        
                                                    $(tabla_name).append(tr);                                                   
                                                }                               
                                                    
                                                
                                            } // Fin if((tipo_cursos == 1) && (datos._msg[item].asociado))                                           
                                            else
                                            if((tipo_cursos == 2) && (!datos._msg[item].asociado))
                                            {                                                                                                                        
                                                $(tabla_name).append(tr);                                                   
                                            }
                                             
                                        } //Fin if(tipo_cursos != 0) 
                                        else
                                        {                                             
                                            if((datos._msg[item].activo) && (habilitados == 1))
                                            {                                                                                                                                                    
                                                $(tabla_name).append(tr);                                                   
                                            }
                                            else
                                            if((!(datos._msg[item].activo == null) && (!datos._msg[item].activo)) && (habilitados == 2))
                                            {                                                   
                                                $(tabla_name).append(tr);                                                   
                                            } 
                                            else
                                            if(habilitados == 0)
                                            {                                                                                                    
                                                $(tabla_name).append(tr);                                                   
                                            }                                         
                                        
                                        }
                                        
                                                                                
                                        tr    = "";
                                        label = "";
                                        input = "";
                                        span  = "";
                                        aux   = "";
                                        btt   = "";


                                    }//fin for (item in datos._msg)
                                                                    
                            }//Fin if(datos['_ok'] === 0)
                            else{
                                mostrar(objs.div, datos["_msg"], true, "alert alert-danger", true, 0, false);
                            }

                        }//Fin peticion_selectbox

                        //////////////////////////////////////////////
                        /**
                         * Autor: Arístides Cortesía
                         * Decripción: Función que realiza la llamada al ajax que elimina el curso del paquete
                         * Parámetros:
                         * _obj: Recibe los objetos que serán enviados a la función ajax.
                         *  */
                        function elimina_paquetecurso(_obj){

                            EjecutarAjaxNew(_obj.data, 'eliminarpaquetecurso', 'post', _obj.obj, refresh_asociar);
                        }

                        /**
                         * Autor: Arístides Cortesía
                         * Decripción: Función que realiza la llamada al ajax que agrega el curso al paquete
                         * Parámetros:
                         * _obj: Recibe los objetos que serán enviados a la función ajax.
                         *  */
                        function agrega_paquetecurso(_obj){

                           EjecutarAjaxNew(_obj.data, 'agregarpaquetecurso', 'post', _obj.obj, refresh_asociar);

                        }

                       
                        
                        //Funciones que se ejecutan una vez que se ha cargado el DOM
                        //$( document ).ready(function() {
                        $(function() {

                                $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                });


                                $('#select_idioma, #select_tipo_cursos, #select_status_cursos').on({change:
                                        function (event)
                                        {
                                                event.preventDefault();
                                                
                                                var data = new Object();
                                                var Obj_Params = new Object();

                                                //Limpiar contenido del div
                                                mostrar('div_msg', "", true, "", false, 0, false);                                               

                                                limpiar_tabla('example1', -1); 
                                                
                                                //Indicar el id del paquete
                                                data.idpaquete = "{{$_id_paq}}";

                                                data.idcurso   = $("#select_idioma").val();

                                                if($("#select_tipo_cursos").val() == 2)
                                                {
                                                    $("#select_status_cursos").prop("disabled", true);
                                                }
                                                else{
                                                    $("#select_status_cursos").prop("disabled", false);
                                                }
                                            
                                                if(!(data.idpaquete === "") && !(data.idcurso === "")){

                                                    Obj_Params.div  = "div_msg";

                                                    EjecutarAjaxNew(data, 'miscursos', 'post', Obj_Params, peticion_selectbox);
                                                }

                                        }//fin function(event)
                                });//Fin $('#select_idioma').on({change:
                                
                                //Destruir todos los tooltip al cargar el dom.
                                //$("[data-toggle='tooltip']").tooltip('destroy');
                                
                                //Establecer el tiempo de aprecer y desaparecer el tooltip
                               // $("[data-toggle='tooltip']").tooltip({delay: 500});
                                
                                //Capturar click de los botones para activar o desactivar cursos
                                //$('#tbl_cursos').on('click', '.btn-activa', function(event){
                                $('#example1').on('click', '.btn-activa', function(event){                                
                                    
                                    click_checkbox($(this).attr("id"), this);
                                    
                                   // $("[data-toggle='tooltip']").tooltip('destroy');                                                                        

                                });
                              
                                $('#example1').on('click', "tr", function(event){
                                    // alert("333333");
                                     alert($(this).attr("id"));

                                     //$('#example1').prop()
                                                                      
                                });

                                //Capturar click de los botones para asociar o desasociar cursos
                                //$('#tbl_cursos').on('click', '.asosia-curso-db', function(event){
                                $('#example1').on('click', '.asosia-curso-db', function(event){

                                    var Obj_Params = new Object();
                                    var data       = new Object();
                                    var obj_aux    = new Object();

                                    event.preventDefault();    
                                                                        
                                     //Limpiar y ocultar el div de mensaje de errores.
                                     mostrar('div_msg', "", true, "alert alert-danger", false, 0, false);

                                     data.idpaquete   = {{$_id_paq}};
                                     data.idcurso     = $(this).data('idcurso');
                                     data.curso       = $(this).data('curso');
                                     data.idpaqcurso  = $(this).data('idpaqcurso');

                                     obj_aux.div      = 'div_msg';

                                     //Identificación del objeto que activa y desactiva el curso.
                                     obj_aux.chk      = "chk" + data.idcurso;

                                     obj_aux.this     = this;                                     

                                     if($(this).hasClass( "btn-info" )){
                                        data.asociar     = true;
                                        Obj_Params.data  = data;
                                        Obj_Params.obj   = obj_aux;
                                        
                                        confirmar(event, "Asociar " +  $(this).data('curso')  + " al paquete " + $("#id_nomb_paq").val(), "", Obj_Params, agrega_paquetecurso);
                                     }
                                     else
                                     if($(this).hasClass( "btn-danger" )){
                                       data.asociar     = false;
                                       Obj_Params.data  = data;
                                       Obj_Params.obj   = obj_aux;
                                       confirmar(event, "Desasociar " +  $(this).data('curso')  + " del paquete " + $("#id_nomb_paq").val(), "Una vez aceptada la operación será irreversible.", Obj_Params, elimina_paquetecurso);
                                     }
                    
                                    ///////////////////////////////

                                });  //Fin $('#tbl_cursos').on('click', '.asosia-curso-db', function(event){

                        }); //Fin $( document ).ready(function()

        </script>
@endsection

