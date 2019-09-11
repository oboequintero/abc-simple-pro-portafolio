@extends('layout')
<html>
<head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript">

    function getTimeAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

        var time = $.ajax({

            url: 'time.php', //indicamos la ruta donde se genera la hora
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false     //ponemos el parámetro asyn a falso
        }).responseText;

        //actualizamos el div que nos mostrará la hora actual
        document.getElementById("myWatch").innerHTML = "La fecha que hemos obtenido de time.php vía AJAX es: "+time;
    }

    //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeAJAX,1000);

</script>




<script src="/assets/js/jquery-3.3.1.min.js"></script>
<meta name="_token" content="{{ csrf_token() }}">

 <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> 


  <script>
    $(document).ready(function(){
    $('#alert').hide();
    $(".btn-cart").click(function(e){
        e.preventDefault();
        if (!confirm("¿Está seguro de agregar al Carrito?")) {
            return false;
        }
        var row     = $(this).parents('tr');
        var form    = $(this).parents('form');
        var url     = form.attr('action');

                
        $('#alert').show();
        $.post(url, form.serialize(), function(){
            $('#alert').html("Almacenado correctamente");

            row.fadeOut();
            
        }).fail(function(){
            $('#alert').html("algo salió mal");
        });
    });
    $(".btn-off-cart").click(function(e){
        e.preventDefault();
        if (!confirm("¿Está seguro de eliminar del Carrito?")) {
            return false;
        }
        var row     = $(this).parents('tr');
        var form    = $(this).parents('form');
        var url     = form.attr('action');

                
        $('#alert').show();
        $.post(url, form.serialize(), function(){
            row.fadeOut();


         
        }).fail(function(){
            $('#alert').html("algo salió mal");
        });
    });
});      
   </script>     
</head>

<div class="container-fluid">
    <?php $countP=0;?>
            <div id="alert" class="alert alert-info"></div>
    <div id='myWatch'></div>

        
    <div class="btn-toolbar" role="toolbar"> 
        <div class="btn-group"> 
           
                        

      
    </button>
    
  </div> 
</div>

    
            @foreach ($products->chunk(4) as $items)
            <div class="row">
          
                @foreach ($items as $product)
                  <tr> 
                <input type="hidden" id="pro_id<?php echo $countP; ?>" name="pro_id" value="{{$product->id}}"/>




                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center">


                                <a href="{{ url('product-c', [$product->id_categoria, $product->id])}}"><h3>{{ $product->nombre }}</h3>
                                <p>COD: {{ $product->codigo }}</p>
                                <p>${{ $product->precio }}</p>
                                </a>
                     @if ($product->valor == 1) <!-- Si usuario tiene almenos una  compra -->
                         <!-- Si el id del prducto es igual a alguno en la lista de venta segun el usuario -->
                        

                         <button type="hidden" class="btn btn-danger btn-sm" id="cartBtn">    <span class="glyphicon glyphicon-education" title="Producto Adquirido"></span> 
                  Adquirido</button>

                                     
                                
                            
                    @elseif ($product->valor == 0) <!-- Si usuario no ha hecho ninguna compra -->          
                    
                    <td width="20px">
                                    {!! Form::open(['route' => ['addProduct', $product->id], 
                                    'method' => 'POST']) !!}


                                    <a href="#" class="btn-cart" title="Agregar al Carrito"><button>
                                        <span class="glyphicon glyphicon-shopping-cart"></span>Agregar</button></a>
                                    
                                <div  class="alerta"></div>

                                    {{ Form::hidden('price', $product->precio)}}
                                    {{  Form::hidden('name', $product->nombre)}}
                                    

                                    {!! Form::close() !!}
                                
                                   </td>
                            </tr> 
                                                      
                    @endif

                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                  <?php $countP++?> 
                @endforeach
            </div> <!-- end row -->    
         
        @endforeach

    </div> <!-- end container -->



</html>