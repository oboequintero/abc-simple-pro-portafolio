@extends('componentes.footer3')
@extends('componentes.headerlogout1')
@section('content')
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="row">
            <div class="col-xl-2 col-lg-3"></div>

            <div class="tele col-xl-8 col-lg-3">
                <div class="ejercice">
                    <div class="section-row-dibujo">

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 ">
                                <div class="row">
                                    <div class="col-xl-1 col-lg-1"></div>
                                    <div class="col-xl-5 col-lg-5 " style="margin-top:30px;">
                                        <a class="" href=""><img src="/assets_f/src/img/sonido.png" class="logo" width="15%"></a>&nbsp;&nbsp;&nbsp;
                                        <img src="/assets_f/src/img/gato.png" class="logo" width="40%">
                                    </div>
                                    <div class="col-xl-6 col-lg-6" style="margin-top:60px;">
                                        <h2 class=""style="color:#d21e62; margin-top:10px;">cat /kät/ gato</h2>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-10" style="margin-top:30px;">
                                    <div class="input-group" style="padding-bottom:20px;">
                                        <input id="" class="form-control" type="text" placeholder="" style="font-size:1.5rem;" name="" value="Ese cat era de mi tía Pepa" disabled>
                                    </div>
                                    <div class="input-group" style="padding-bottom:20px;">
                                        <input id="" class="form-control" type="text"  placeholder="" style="font-size:1.5rem;" name="" value="Uy no, un cat de plástico , no no." disabled>
                                    </div>
                                    <div class="input-group" style="padding-bottom:20px;">
                                        <input id="" class="form-control" type="text" placeholder="" style="font-size:1.5rem;" name="" value="Quiero un cat mami" disabled>
                                    </div>
                                    <div class=" text-center"style="padding-top:30px;">
                                        <a class="" href=""><img src="/assets_f/src/img/sonido.png" class="logo" width="5%"></a>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <div class="conta sig-atras-video">
                <div class="row barra-prog">
                    <div class="col-1 col-lg-1">
                        <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                    </div>
                    <div class="col-10 col-lg-10 d-none d-md-block">
                        <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                70%
                            </div>
                        </div>
                    </div>
                    <div class="col-10 d-md-none " >
                        <div class="progress barraprogreso">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                        </div>
                    </div>
                    <div class="col-1 col-lg-1">
                        <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 1++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 2++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
            <nav class="navmenu" style="padding-top:25px;">
                <ul>
                    <li class="has-subnav">
                        <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" src=""></i>
                            <span class="nav-text">
                            <input type="hidden" id="clienteUser" value="">
                            </span>
                        </a>
                    </li>
                    <hr>
                    <form name="nivel" method="post" action="">
                    </form>
                    <li class="has-subnav">
                    <a  href="#z" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="./img/icono15.png"></i>
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="tele col-xl-8 col-lg-2">
            <div class="ejercice">
                <div class="section-row-dibujo">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 " style="margin-top:30px;">
                                    <img src="/assets_f/src/img/prof.png" class="logo" width="35%" >
                                    <a class="" href=""><img src="/assets_f/src/img/sonido.png" class="logo" width="20%"></a>
                                </div>
                                <div class="col-xl-7 col-lg-7" style="margin-top:30px;">
                                    <h5 class=""style="color:#d21e62; margin-top:10px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia numquam vitae placeat doloremque eius, itaque facilis ad voluptas autem rerum error, vel mollitia a necessitatibus amet nemo nam harum commodi!</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2 col-lg-1">
                                    <img src="/assets_f/src/img/gato.png" class="logo" style="margin-top:30px;" width="100%" >
                                </div>
                                <div class="col-xl-9" style="margin-top:30px;">
                                    <div class="input-group" style="padding-bottom:10px;">
                                        <input style="font-size:1.5rem;" id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                                    </div>
                                    <div class="input-group" style="padding-bottom:10px;">
                                        <input style="font-size:1.5rem;" id="" class="form-control" type="text"  placeholder="rellenar aca" name="texto" value="" >
                                    </div>
                                    <div class="input-group" style="padding-bottom:10px;">
                                        <input style="font-size:1.5rem;" id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                                    </div>
                                    <div class="input-group" style="padding-bottom:10px;">
                                        <input style="font-size:1.5rem;" id="" class="form-control" type="text" placeholder="rellenar aca" name="texto" value="" >
                                    </div>
                                    <div class=" text-center"style="margin-top:30px;">
                                        <h2 class=""style="color:#d21e62; margin-top:10px;">cat  /kät/ gato</h2>
                                    </div>
                                </div>
                                <div class="col-lg-1" style="margin-top:30px;">
                                    <a  class="" href=""><img src="/assets_f/src/img/micro.png" class="logo"  width="100%" ></a>
                                    <br>
                                    <br>
                                    <a type="button" class="btn btn-info" href="">play</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--SECCION DE LAS PLANTILLAS DE EJERCICIOS 2++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 56++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="col-xl-9 col-lg-3 tele ">
            <div class="ejercice">
                <div class="section-row-dibujo">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <div style="color:green; font-size: 2.5rem; padding-top:5%; text-align:center;">
                                <p>Escucha la palabra </p> <p>y haz click sobre la imagen.</p> <p> Tienes 30 segundos para conseguirla!!!</p>
                                <br>
                                <a  class="" href=""><img src="/assets_f/src/img/micro.png" class="logo " style="" width="5%" ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
            <div class="row barra-prog">
                <div class="col-1 col-lg-1">
                    <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                </div>
                <div class="col-10 col-lg-10 d-none d-md-block">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            70%
                        </div>
                    </div>
                </div>
                <div class="col-10 d-md-none " >
                    <div class="progress barraprogreso">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
                <div class="col-1 col-lg-1">
                    <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 56++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 60++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="col-xl-9 col-lg-3 tele ">
            <div class="ejercice">
                <div class="section-row-dibujo">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <div style="color:green; font-size: 2.5rem; padding-top:5%; text-align:center;">
                                <p>Al ver la imagen</p> <p>Tienes 30 segundos para </p> <p> pronúnciala en voz alta!!!</p>
                                <br>
                                <a  class="" href=""><img src="/assets_f/src/img/micro.png" class="logo" style="" width="5%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
            <div class="row barra-prog">
                <div class="col-1 col-lg-1">
                    <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                </div>
                <div class="col-10 col-lg-10 d-none d-md-block">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            70%
                        </div>
                    </div>
                </div>
                <div class="col-10 d-md-none " >
                    <div class="progress barraprogreso">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
                <div class="col-1 col-lg-1">
                    <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 60++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 57++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="col-xl-9 col-lg-3 tele ">
            <div class="ejercice">
                <div class="section-row-dibujo">

                    <div class="row">
                        <div class="col-xl-3 col-lg-3"></div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div style=" padding-top:10%; text-align:center;">

                                <table border="5" class=>

                                    <tr>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>


                                    </tr>
                                    <tr>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>


                                    </tr>
                                    <tr>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>


                                    </tr>
                                    <tr>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>


                                    </tr>
                                    <tr>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>
                                        <td><img src="/assets_f/src/img/100x100px.jpg" class="" style="" width="85%"></td>


                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1" style=" padding-top:10%; text-align:center;">
                            <a  class="" href=""><img src="/assets_f/src/img/micro.png" class="" style="margin-left:60px;" width="55%"></a>
                            <br>
                            <br>
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
            <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
            <div class="row barra-prog">
                <div class="col-1 col-lg-1">
                    <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                </div>
                <div class="col-10 col-lg-10 d-none d-md-block">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            70%
                        </div>
                    </div>
                </div>
                <div class="col-10 d-md-none " >
                    <div class="progress barraprogreso">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
                <div class="col-1 col-lg-1">
                    <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 57++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 61++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="col-xl-9 col-lg-3 tele ">
            <div class="ejercice">
                <div class="section-row-dibujo">

                    <div class="row">
                        <div class="col-xl-3 col-lg-3"></div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div style=" padding-top:10%; text-align:center;">
                                <p style="color:green; font-size: 2.5rem; padding-top:5%; text-align:center;">Cuando veas la imagen, pronúnciala en inglés!</p>
                                <img style="border-style:solid;" src="/assets_f/src/img/lampara.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1" style=" padding-top:10%; text-align:center;">
                            <a  class="" href=""><img src="/assets_f/src/img/micro.png" class="" style="margin-left:60px;" width="55%"></a>
                            <br>
                            <br>
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
            <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
            <div class="row barra-prog">
                <div class="col-1 col-lg-1">
                    <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                </div>
                <div class="col-10 col-lg-10 d-none d-md-block">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            70%
                        </div>
                    </div>
                </div>
                <div class="col-10 d-md-none " >
                    <div class="progress barraprogreso">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
                <div class="col-1 col-lg-1">
                    <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 61++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 65++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<section id="fondoexamen">
    <div class="section-row-home" >

        <div class="col-xl-1 col-lg-1 div-nav-menu">
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

        <div class="col-xl-1 col-lg-3"></div>

        <div class="col-xl-9 col-lg-3 tele ">
            <div class="ejercice">
                <div class="section-row-dibujo">

                    <div class="row" style="padding-top:15%;">
                        <div class="col-xl-2 col-lg-3"></div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="row">
                                <p style="color:green; font-size: 3.5rem; text-align:left; ">Flag</p> <p>&nbsp&nbsp&nbsp</p>
                                <input type="text" style=" background:black; color:white; font-size: 2.5rem; " value="" placeholder="Escribe aqui">
                            </div>

                        </div>
                        <div class="col-xl-1 col-lg-1" style=" text-align:center;">
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                            <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:15%;">
            <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
            <div class="row barra-prog">
                <div class="col-1 col-lg-1">
                    <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                </div>
                <div class="col-10 col-lg-10 d-none d-md-block">
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            70%
                        </div>
                    </div>
                </div>
                <div class="col-10 d-md-none " >
                    <div class="progress barraprogreso">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
                <div class="col-1 col-lg-1">
                    <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 65++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 69++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--<section id="fondoexamen">
        <div class="section-row-home" >

            <div class="col-xl-1 col-lg-1 div-nav-menu">
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

            <div class="col-xl-1 col-lg-3"></div>

            <div class="col-xl-9 col-lg-3 tele ">
                <div class="section-row-dibujo" style="background-image:url('/assets_f/src/img/grafity.png'); margin-top:3%; width:100%; height:400px; background-repeat:no-repeat; background-size:cover;">
                    <div class="row" style="padding-top:10%;" >
                        <div class="col-xl-2 col-lg-3" ></div>
                        <div class="col-xl-6 col-lg-6" >
                            <form action="">
                                <div class="form-inline" style="background:blue;">
                                    <p style="color:white; font-size:3.5em; text-align:left; ">Flag</p> <p>&nbsp&nbsp&nbsp</p>
                                    <input type="text" style=" background:black; color:white; font-size:2em; " value="" placeholder="Escribe aqui">
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-1 col-lg-1" style=" text-align:center;">
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                                <br><br>
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:3%;">
                    <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
                    <div class="row barra-prog">
                        <div class="col-1 col-lg-1">
                            <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                        </div>
                        <div class="col-10 col-lg-10 d-none d-md-block">
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    70%
                                </div>
                            </div>
                        </div>
                        <div class="col-10 d-md-none " >
                            <div class="progress barraprogreso">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                            </div>
                        </div>
                        <div class="col-1 col-lg-1">
                            <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 69++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 71++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!--<section id="fondoexamen">
        <div class="section-row-home" >

            <div class="col-xl-1 col-lg-1 div-nav-menu">
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

            <div class="col-xl-1 col-lg-3"></div>

            <div class="col-xl-9 col-lg-3 tele ">
                <div class="row" style="padding-top:10%;" >
                    <div class="col-xl-2 col-lg-3" ></div>
                    <div class="col-xl-6 col-lg-6" >
                        <form class="form-inline" action="">
                            <div class="col-xl-1">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                                <img src="/assets_f/src/img/promo.png" alt="">
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10" style="background:green; text-align:-webkit-center;">
                                <table >
                                        <tr>
                                            <td class="" style="font-size:1.5em;"> 1</td>
                                            <td class="" style="font-size:1.5em;"> 2</td>
                                            <td class="" style="font-size:1.5em;"> 3</td>
                                            <td class="" style="font-size:1.5em;"> 3</td>
                                            <td class="" style="font-size:1.5em;"> 3</td>
                                            <td class="" style="font-size:1.5em;"> 3</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 3</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            </tr>
                                            <tr>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 5</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 4</td>
                                            <td class="" style="font-size:1.5em;"> 6</td>
                                        </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-1 col-lg-1" style=" text-align:center;">
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                                <br><br>
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                    </div>
                </div>
                <div class="row" style="padding-top:3%;">
                    <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
                    <div class="row barra-prog">
                        <div class="col-1 col-lg-1">
                            <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                        </div>
                        <div class="col-10 col-lg-10 d-none d-md-block">
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    70%
                                </div>
                            </div>
                        </div>
                        <div class="col-10 d-md-none " >
                            <div class="progress barraprogreso">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                            </div>
                        </div>
                        <div class="col-1 col-lg-1">
                            <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 71++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--SECCION DE LAS PLANTILLAS 75++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <section id="fondoexamen">
        <div class="section-row-home" >

            <div class="col-xl-1 col-lg-1 div-nav-menu">
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

            <div class="col-xl-1 col-lg-3"></div>

            <div class="col-xl-9 col-lg-3 tele ">
                <div class="row" style="padding-top:10%;" >
                    <div class="col-xl-2 col-lg-3" ></div>
                    <div class="col-xl-6 col-lg-6" >
                        <form class="form-inline" action="">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10" style="background:grey; text-align:-webkit-center;">
                                <table >
                                        <tr >
                                            <td  class="" style="font-size:1.5em; border: black 3px solid;"> F</td>
                                            <td  class="" style="font-size:1.5em; border: black 3px solid;"> L</td>
                                            <td  class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                            <td  class="" style="font-size:1.5em; border: black 3px solid;"> G</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; border: black 3px solid;"> C</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> L</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> R</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> M</td>
                                        </tr>
                                        <tr>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> M</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> N</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> T</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                        </tr>
                                        <tr>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> P</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> S</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> P</td>
                                        </tr>
                                        <tr>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td class="" style="font-size:1.5em; border: black 3px solid;"> S</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                            <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> H</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> A</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> N</td>
                                        <td class="" style="font-size:1.5em; border: black 3px solid;"> D</td>
                                        <td  class="" style="font-size:1.5em; ">&nbsp;&nbsp;&nbsp;</td>
                                        </tr>

                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-1 col-lg-1" style=" text-align:center;">
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">3</a>
                                <br><br>
                                <a class="btn btn-md" style="margin-left:60px;" type="button" href="">43</a>
                    </div>
                </div>
                <div class="row" style="padding-top:3%;">
                    <div class="sig-atras-video" style="width: 100%; padding-right: 60px; padding-left: 1px; margin-left: 1px;">
                    <div class="row barra-prog">
                        <div class="col-1 col-lg-1">
                            <button class="btn btn-sm boton-sig-atras" onclick="history.back(-1)"><img src="/assets_f/src/img/anterior.png" ></button>
                        </div>
                        <div class="col-10 col-lg-10 d-none d-md-block">
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    70%
                                </div>
                            </div>
                        </div>
                        <div class="col-10 d-md-none " >
                            <div class="progress barraprogreso">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                            </div>
                        </div>
                        <div class="col-1 col-lg-1">
                            <button type="submit" class="btn btn-sm boton-sig-atras" style=""><img src="/assets_f/src/img/siguiente.png" ></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<!-- FIN DE SECCION DE LAS PLANTILLAS 75++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
@endsection
