<!doctype html>
  <html lang="en">
    <head>
      @include('componentes.partes.head')
    </head>

    <body class="fuentes">
      <!--navbar menu+++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <section class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <img src="/assets_f/src/img/logo.png" width="20%">
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="col-lg-4">
              <a id="saludo"></a>&nbsp;
                <span style="padding-left: 5px;">.</span>&nbsp;
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
                <div class=""><a class="btn btn-outline-primary" style=" color:#0e9a9d;" href="{{ url('/cliente/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a></div>
                <form id="logout-form" action="{{ url('/cliente/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </nav>
        <nav class="opcional" id="nav-prueba" style="background-color:#fff;">
          <div class="tab-content">
            <div id="personas" class="tab-pane active">
              <div class="section-row-nav">
                <div class="col-xl-3 col-lg-2 col-md-3 links-nav"><img class="img-logo-dash" src="/assets_f/src/img/logo.png"></div>
                <div class="col-xl-0 col-lg-0"></div>
                <div class="col-xl-9 col-lg-10 col-md-12 col-12 quitarNav2">
                  <nav class="nav justify-content-center nav-dash">
                    <!--<button type="button" name="button" class="btn btn-default" style="background-color:#0e9a9d; color:#ffffff;">Personas</button>-->
                    <a class="nav-link linksmenu" href="#">Quienes somos?</a>
                    <a class="nav-link linksmenu" href="#">Que es diferente en este curso?</a>
                    <a class="nav-link linksmenu" href="#">Galeria</a>
                    <a class="nav-link linksmenu" href="#">Tienda</a>
                    <a class="nav-link linksmenu" href="#">Cursos</a>
                    <a class="nav-link linksmenu" href="#">Videos</a>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </section>

      <!--contenido del blade+++++++++++++++++++++++++++++++++++++++++++++-->
        <main>
          @yield('content')
        </main>

      <!-- footer del edit-->
      @include('componentes.footer3')
