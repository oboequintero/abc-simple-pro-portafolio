<!doctype html>
  <html lang="en">
    <head>
    @include('componentes.partes.head')
   </head>

    <body class="fuentes">
      <!--navbar menu+++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <section class="fixed-top">  
         <!-- seccion del header en responsive-->
          <nav class="navbar navbar-expand-lg navbar-light nav-hd1">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <img src="/assets_f/src/img/logo.png" width="20%">
            </button> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <div class="col-lg-4">
                <a id="saludo"></a>&nbsp;
                <span style="padding-left: 5px;">{{ $nombre }}.</span>&nbsp;
                <a style="text-align:center" id="liveclock"></a>&nbsp;
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active d-none d-lg-none">
                    <a class="nav-link" href="#">&nbsp; <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item d-none d-lg-none">
                    <a class="nav-link" href="#">&nbsp;</a>
                    </li>
                </ul>
              </div>

              <div class="offset-lg-5 col-lg-3">
                <div class="d-flex">
                <div class="mr-auto"></div>
                <div class=""><a class="nav-link" href="#"><i class="fas fa-phone" style="font-size:24px; color:#0e9a9d;"></i></a></div>
                <div class=""><a class="nav-link" href="#"><i class="fas fa-envelope" style="font-size:24px; color:#0e9a9d;"></i></a></div>
                <div class=""><a class="btn btn-outline-primary" style=" color:#0e9a9d;" href="{{ url('/cliente/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();unlog_cliente();">Salir</a></div>
                <form id="logout-form" action="{{ url('/cliente/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                </div>
              </div>
              <hr>
              <ul class="quitarNav">
                  <form name="nivel" method="post" action="{{route ('nivel')}}">
                  {{ csrf_field() }}
                      <input name="_method" type="hidden" value="post">
                      <input name="usuario" type="hidden" value="{{ $nombre }}">
                      <li class="">
                          <a class="a-style" href='#' onclick='document.forms["nivel"].submit(); return false;'><i class="faar"><img width="55%" src="/assets_f/src/img/icono15.png"></i>
                              <span>Regalos</span>  
                          </a>
                      </li>
                  </form>

                  <li class="">
                      <a class="a-style" href="#c" data-toggle="collapse" aria-expanded="false" ><i class="faar"><img width="55%" src="/assets_f/src/img/icono22.png"></i>
                          <span class="">
                          Promociones<i class="dropdown-toggle"></i>
                          </span>
                      </a>
                      <ul class="collapse ul-sub" style="" id="c">
                          <li><a class="a-sub" href="#">Promocion 1</a></li>
                          <li><a class="a-sub" href="#">Promocion 2</a></li>
                          <li><a class="a-sub" href="#">Promocion 3</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="a-style" href="#a" data-toggle="collapse" aria-expanded="false" ><i class="faar"><img width="55%" src="/assets_f/src/img/icono13.png"></i>
                          <span class="">
                          Cursos<i class="dropdown-toggle"></i>
                          </span>
                      </a>
                      <ul class="collapse ul-sub" id="a">
                          <li><a class="a-sub" href="#">Curso 1</a></li>
                          <li><a class="a-sub" href="#">Curso 2</a></li>
                          <li><a class="a-sub" href="#">Curso 3</a></li>
                      </ul>
                  </li>
                  <li class="">
                      <a class="a-style" href="#s" data-toggle="collapse" aria-expanded="false" ><i class="faar"><img width="55%" src="/assets_f/src/img/icono32.png"></i>
                          <span class="">
                          Productos<i class="dropdown-toggle"></i>
                          </span>
                      </a>
                      <ul class="collapse ul-sub" id="s">
                          <li><a class="a-sub" href="#">Producto 1</a></li>
                          <li><a class="a-sub" href="#">Producto 2</a></li>
                          <li><a class="a-sub" href="#">Producto 3</a></li>
                      </ul>
                  </li>
                  <li class="">
                      <a class="a-style" href="#b" data-toggle="collapse" aria-expanded="false" ><i class="faar"><img width="55%" src="/assets_f/src/img/icono14.png"></i>
                          <span class="">
                          Mis Cursos<i class="dropdown-toggle"></i>
                          </span>
                      </a>
                      <ul class="collapse ul-sub" id="b">
                          <li><a class="a-sub" href="#">Mis Curso 1</a></li>
                          <li><a class="a-sub" href="#">Mis Curso 2</a></li>
                          <li><a class="a-sub" href="#">Mis Curso 3</a></li>
                      </ul>
                  </li>
              </ul>
            </div>
          </nav>
        <!-- seccion del header en responsive////barra de los links-->
        <nav class="opcional" id="nav-vista" style="background-color:#fff;">
          <div class="tab-content">
            <div class="tab-pane active">
              <div class="section-row-nav">
                <div class="col-xl-3 col-lg-2 col-md-3 links-nav"><a href="{{route('view.cliente')}}"><img class="img-logo-index" src="/assets_f/src/img/logo.png"></a></div>
                <div class="col-xl-0 col-lg-0"></div>
                <div class="col-xl-9 col-lg-10 col-md-12 col-12 quitarNav2">
                <nav class="nav justify-content-center nav-index">
  <form name="quienes" method="post" action="{{route ('quienes')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ $nombre }}">
      <input name="id" type="hidden" value="{{ $id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["quienes"].submit(); return false;'>
          <span>Quienes Somos</span>  
        </a>      
  </form>

  <form name="diferente" method="post" action="{{route ('diferente')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ $nombre }}">
      <input name="id" type="hidden" value="{{ $id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["diferente"].submit(); return false;'>
          <span>Que es diferente en este curso?</span>
        </a>      
  </form>

  <form name="galeria" method="post" action="{{route ('galeria')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ $nombre }}">
      <input name="id" type="hidden" value="{{ $id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["galeria"].submit(); return false;'>
          <span>Galeria</span>
        </a>      
  </form>

  <a class="nav-link linksmenu" href="#">Cursos</a>

  <a class="nav-link linksmenu" href="#">Videos</a>

  <form name="tienda" method="post" action="{{route ('tienda')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ $nombre }}">
      <input name="id" type="hidden" value="{{ $id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["tienda"].submit(); return false;'>
          <span>Tienda</span>  
        </a>
  </form>
</nav>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </section>

      <!-- contenido del archivo que se necesite con home-->
      <main>
        @yield('content')
      </main>

      <!-- footer del home-->
      @include('componentes.footer1')

      <!-- seccion de los scripts necesarios-->
      @include('componentes.partes.scripts')
    </body>
  </html>