@extends('adminlte::layouts.app')
@section('main-content')<!-- page content -->
<html>
<head>

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

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <a href="{{ route('idioma.show',0) }}" class="btn btn-xs btn-info" >Idioma: Todos</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a href="{{ route('nivel.create') }}"  aria-expanded="false"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Registrar Elemento"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix">
                         @foreach ($products->chunk(4) as $items)
            <div class="row">
          
                @foreach ($items as $product)
                  <tr> 
                <input type="hidden" id="pro_id" name="pro_id" value="{{$product->id}}"/>




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
                  
                @endforeach
            </div> <!-- end row -->    
         
        @endforeach

                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection


<html>