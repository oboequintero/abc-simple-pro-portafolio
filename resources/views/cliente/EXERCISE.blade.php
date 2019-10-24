@extends('componentes.footer3')
@extends('componentes.headerlogout1')
@section('content')
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-lg-1 div-nav-menu">
        <nav class="navmenu" style="padding-top:25px;">
        <ul>
        <li class="has-subnav">
        <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" style="margin-top:5px;" src=""></i>
        <span class="nav-text">
        <input type="hidden" id="clienteUser" value="">
        </span>
        </a>
        </li>
        <hr>
        <form name="nivel" method="post" action="">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="post">
        <input name="usuario" type="hidden" value="">
        <li class="has-subnav">
        </li>
        </form>
        <li class="has-subnav">
        <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono15.png"></i>
        <span class="nav-text">
        Mis Regalos
        </span>
        </a>
        <ul class="collapse list-unstyled" id="z">
        </ul>
        </li>
        </ul>
        <hr>
        </nav>
        </div>

        <div class="tele col-xl-5 col-lg-2">
        <div class="ejercice"> 
        <div class="section-row-dibujo">
        <div class="row"> 

        <div class="col-lg-12 ">
        <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 " style="margin-top:30px;">
        <a class="btn btn-danger btn-lg" href="">audio</a>
        <img src="/assets_f/src/img/logo.png" class="logo" width="50%" >
        </div>
        <div class="col-lg-2" style="margin-top:30px;">
        <h2 class=""style="color:#d21e62; margin-top:10px;">cat  /kät/ gato</h2>
        </div>
        </div>

        <div class="container" style="margin-top:30px;">
        <div class="input-group" style="padding-bottom:20px;">
        <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="Ese cat era de mi tía Pepa" disabled>
        </div>
        <div class="input-group" style="padding-bottom:20px;">
        <input id="last_name" class="form-control" type="text"  placeholder="Apellido" name="last_name" value="Uy no, un cat de plástico , no no." disabled>
        </div>
        <div class="input-group" style="padding-bottom:20px;">
        <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="Quiero un cat mami" disabled>
        </div>
        <div class=" text-center"style="margin-top:30px;">
        <a class="btn btn-danger btn-lg" href="">audio</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</section>
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
@endsection