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
                        
                         @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif


        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->nombre }}</p>
        
<div id="alert" class="alert alert-info"></div>
        <h1>{{ $product->nombre }}</h1>

      
        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/' . $product->imagen) }}" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>${{ $product->precio }}</h3>

           @if ($producto_adquirido == NULL)
            
                
  {!! Form::open(['route' => ['addProduct', $product->id], 
                                    'method' => 'POST']) !!}


                                    <a href="#" class="btn-cart" title="Agregar al Carrito"><button>
                                        <span class="glyphicon glyphicon-shopping-cart"></span>Agregar!</button></a>
                                    
                                <div  class="alerta"></div>

                                    {{ Form::hidden('price', $product->precio)}}
                                    {{  Form::hidden('name', $product->nombre)}}
                                    

                                    {!! Form::close() !!}
                                
                 <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->nombre }}">
                    <input type="hidden" name="price" value="{{ $product->precio }}">
                    <input type="submit" class="btn btn-primary btn-lg" value="Comprar">
                </form>                                  

                <form action="{{ url('/wishlist') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->nombre }}">
                    <input type="hidden" name="price" value="{{ $product->precio }}">
                    <input type="submit" class="btn btn-primary btn-lg" value="Wishlist">
                </form>
            @else
             <button type="hidden" class="btn btn-danger btn-sm" id="cartBtn"> Producto Adquirido</button>
            @endif
                <br><br>

                {{ $product->descripcion }}
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
       <!-- /page content -->
@endsection


<html>

    

   


 