<!DOCTYPE html>
<html lang="en">
    <head>
        @include('componentes.partes.head')
    </head>
    <body class="fuentes">
        <section class="fixed-top">
            <!-- seccion del header en responsive-->
            <nav class="navbar navbar-expand-lg navbar-light nav-hd1">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border:0px;">
                  <span class="navbar-toggler-icon"></span>
                  <img src="/assets_f/src/img/logo.png"  width="20%">
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <a id="saludo"></a>&nbsp;
                    <a >La hora es</a>&nbsp;
                    <a style="text-align:left" id="liveclock"></a>&nbsp;
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active d-none d-lg-block">
                        <a class="nav-link" href="#">&nbsp; <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">&nbsp;</a>
                        </li>
                    </ul>
                    <div class=" d-none d-lg-block">
                        <form class="form-inline my-2 my-lg-0 opcional-md" id="boton-barra">
                            <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal"  data-target="#loginlogout" style="background-color:#0e9a9d; border-color:#007bff00;">LOGIN</button>&nbsp;&nbsp;
                            <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal" data-target="#inscribete" onclick="rotar()" style="background-color:#0e9a9d; border-color:#007bff00;">INSCRIBETE</button>&nbsp;&nbsp;
                            <a class="opcional parrafos" style="background-color:#0e9a9d; padding:5px; color:#ffffff; border-radius:5px;">Primer Nivel: GRATIS!</a>
                        </form>
                    </div>
                    <div class="container d-lg-none d-none d-sm-block">
                        <div class="row ">
                            <form class="form-inline my-2 my-lg-0" id="boton-barra">
                                <div class="col-12 opcional" style="margin-top:14px;">
                                    <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal"  data-target="#loginlogout" style="background-color:#0e9a9d; border-color:#007bff00;">LOGIN</button>
                                    <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal" data-target="#inscribete" onclick="rotar()" style="background-color:#0e9a9d; border-color:#007bff00;">INSCRIBETE</button>
                                    <a class="parrafos opcional" style="background-color:#0e9a9d; padding:5px; color:#ffffff; border-radius:5px;">Primer Nivel: GRATIS!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="container d-sm-none">
                        <div class="row">
                            <form class="form-inline my-2 my-lg-0" id="boton-barra">
                                <div class="col-12 opcional-sm">
                                    <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal"  data-target="#loginlogout" style="background-color:#0e9a9d; border-color:#007bff00;">LOGIN</button>
                                    <button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal" data-target="#inscribete" onclick="rotar()" style="background-color:#0e9a9d; border-color:#007bff00;">INSCRIBETE</button>
                                </div>
                                <div class="col-12 opcional" style="margin-top:14px;">
                                    <a class=" parrafos" style="background-color:#0e9a9d;  padding:5px; color:#ffffff; border-radius:5px;">Primer Nivel: GRATIS!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="opcional" id="nav-prueba" style="background-color:#fff;">
                <div class="tab-content">
                    <div class="tab-pane active ">
                        <div class="section-row-nav">
                        <div class="col-xl-3 col-lg-2 col-md-3 links-nav"><a href="{{route('view.index')}}"><img class="img-logo-index" src="/assets_f/src/img/logo.png"></a></div>
                            <div class="col-xl-0 col-lg-0"></div>
                            <div class="col-xl-9 col-lg-10 col-md-12 col-12 quitarNav2">
                                <nav class="nav justify-content-center nav-index">
                                    <a class="nav-link linksmenu" href="{{route('view.quienes')}}">Quienes somos?</a>
                                    <a class="nav-link linksmenu" href="{{route('view.diferente')}}">Que es diferente en este curso?</a>
                                    <a class="nav-link linksmenu" href="#">Galeria</a>
                                    <a class="nav-link linksmenu" href="{{route('view.tienda')}}">Tienda</a>
                                    <a class="nav-link linksmenu" href="#">Cursos</a>
                                    <a class="nav-link linksmenu" href="#">Videos</a>                                    
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <main>
            @yield('content')
        </main>
        <!-- footer del index-->
        @include('componentes.footer1')

        <!-- seccion de los scripts necesarios para el index-->
        @include('componentes.partes.scripts')
    </body>
</html>
     