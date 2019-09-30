<!doctype html>
  <html lang="en">
    <head>
      @include('componentes.partes.head')
    </head>

    <body class="fuentes">
      <!--navbar menu+++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <section class="fixed-top">
         <!-- seccion del header en responsive-->
         @include('componentes.partes.home_header_log')
        <!-- seccion del header en responsive////barra de los links-->
        <nav class="opcional" id="nav-vista" style="background-color:#fff;">
          <div class="tab-content">
            <div class="tab-pane active">
              <div class="section-row-nav">
                <div class="col-xl-3 col-lg-2 col-md-3 links-nav"><a href="{{route('view.cliente')}}"><img class="img-logo-index" src="/assets_f/src/img/logo.png"></a></div>
                <div class="col-xl-0 col-lg-0"></div>
                <div class="col-xl-9 col-lg-10 col-md-12 col-12 quitarNav2">
                  <!-- seccion de los links que estan en el header-->
                  @include('componentes.partes.home_links_logeado')
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



      <!-- seccion de los scripts necesarios-->
      @include('componentes.partes.scripts')
    </body>
  </html>
