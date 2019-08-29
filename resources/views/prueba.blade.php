<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="pruebas.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--swiper css-->
    <link rel="stylesheet" href="swiper/css/swiper.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link rel="stylesheet" href="/assets_f/src/css/estilos_li.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Seccion del Carrusel -->
  <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a><img src="/assets_f/src/img/prueba2.jpg" class="d-block w-100" data-toggle="modal" data-target="#modal-tienda-pqt"></a>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <a><img src="/assets_f/src/img/prueba3.jpg" class="d-block w-100" data-toggle="modal" data-target="#modal-tienda-promo"></a>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <a><img src="/assets_f/src/img/prueba2.jpg" class="d-block w-100" data-toggle="modal" data-target="#mordal-tienda-cursos"></a>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
<!-- Fin Seccion Carrusel -->
      <!-- Fondo-tienda -->
    <section class="fondo-tienda-abc">
        <!-- Seccion Banderas -->
        <div class="container text-center">
          <div class="row b-tienda">
            <div class="col-12 col-md-3 d-md-block">
              <img src="/assets_f/src/img/b-eeuu.jpg">
            </div>
            <div class="col-12 col-md-3 d-md-block">
              <img src="/assets_f/src/img/b-italia.jpg">
            </div>
            <div class="col-12 col-md-3 d-md-block">
              <img src="/assets_f/src/img/b-españa.jpg">
            </div>
            <div class="col-12 col-md-3 d-md-block">
              <img src="/assets_f/src/img/b-francia .jpg">
            </div>
          </div>
          <!-- Fin Seccion Banderas -->
          <!-- Seccion Productos -->
          <div class="row p-tienda">
              <div class="col-4">
                <a id="mostrart-paquetes"><img src="/assets_f/src/img/icono3.png" id="cambio3" class="img-fluid"></a>
                <h4>Paquetes</h4>
              </div>

              <div class="col-4" >
                <a id="mostrart-promociones"><img src="/assets_f/src/img/icono-promo2.png" id="cambio" class="img-fluid"></a>
                <h4>Promociones</h4>
              </div>
              <div class="col-4">
                <a id="mostrart-cursos"><img src="/assets_f/src/img/icono-curso..png" id="cambio2" class="img-fluid"></a>
                <h4>Cursos</h4>
              </div>
          </div>
          <!-- Fin Seccion Productos -->
          <!-- Seccion Paquetes en la Tienda -->
      <section id="tienda-paquetes" style="display: none;">
          <div class="row c-tienda">
            <div class="col-12 col-md-6">
              <img src="/assets_f/src/img/img-2.jpg">
            </div>
            <div class="col-12 col-md-5">
              <h2 style="color:#d21e62;font-weight: bold;">STUDY ENGLISH</h2>
              <!-- Aqui van la Descripcion del Producto -->
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa non ut ab iure consectetur explicabo sed necessitatibus nulla, quibusdam adipisci quisquam dolore vel magni ex debitis repudiandae dolorem facilis. Aut?</p>
             <!--Aqui van las Estrellas de Valoracion -->
              <button type="button" class="btn btn-sm">COMPRARS</button>
            </div>
            <div class="col-12 col-md-1 btn-vm">
              <button type="button" class="btn btn-sm">VER MAS</button>
            </div>
          </div>
      </section>
      <!-- SECCION PROMOCIONES EN LA TIENDA -->
      <section id="tienda-promociones">
            <div class="row c-tienda">
              <div class="col-12 col-md-6">
                <img src="/assets_f/src/img/img-1.jpg">
              </div>
              <div class="col-12 col-md-5">
                <h2 style="color:#d21e62;font-weight: bold;">Curso Fácil y Divertido</h2>
                <h3 style="color: #464646;font-weight: bold;">PRIMER NIVEL GRATIS</h3>
                <!-- Aqui van la Descripcion del Producto -->
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa non ut ab iure consectetur explicabo sed necessitatibus nulla, quibusdam adipisci quisquam dolore vel magni ex debitis repudiandae dolorem facilis. Aut?</p>
                <!-- Aqui van las Estrellas de Valoracion -->
                <button type="button" class="btn btn-sm">COMPRAR</button>
              </div>
              <div class="col-12 col-md-1 btn-vm">
                <button type="button" class="btn btn-sm">VER MAS</button>
              </div>
            </div>
      </section>
      <!-- FIN SECCION PROMOCIONES EN LA TIENDA -->
      <!-- SECCION CURSOS EN LA TIENDA -->
      <section id="tienda-cursos" style="display: none;">
            <div class="row c-tienda">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              <div class="col-12 col-md-6">
                <img src="/assets_f/src/img/img-1.jpg">
              </div>
              <div class="col-12 col-md-5">
                <h2 style="color:#d21e62;font-weight: bold;">Curso Fácil y Divertido</h2>
                <h3 style="color: #464646;font-weight: bold;">PRIMER NIVEL GRATIS</h3>
                <!-- Aqui van la Descripcion del Producto -->
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa non ut ab iure consectetur explicabo sed necessitatibus nulla, quibusdam adipisci quisquam dolore vel magni ex debitis repudiandae dolorem facilis. Aut?</p>
                <!-- Aqui van las Estrellas de Valoracion -->
                <button type="button" class="btn btn-sm">COMPRAR</button>
              </div>
              <div class="col-12 col-md-1 btn-vm">
                <button type="button" class="btn btn-sm">VER MAS</button>
              </div>
            </div>
      </section>
      <!-- FIN SECCION CURSOS EN LA TIENDA -->
      <!-- Seccion ultima Imagen -->
      <img src="/assets_f/src/img/img-3.png" style="width: 100%;">
      <!-- Seccion ultima Imagen -->
   <!-- Button trigger modal -->
<!-- MODAL PARA CARRUSEL DE PAQUETES EN LA TIENDA -->
<div class="modal fade" id="modal-tienda-pqt" tabindex="-1" role="dialog" aria-labelledby="modal-tienda-pqtTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color: #0e9a9d; border-bottom: solid #0e9a9d;color: white;">
          <h5 class="modal-title" id="modal-tienda-pqtTitle">INSCRIBETE! PRIMER NIVEL GRATIS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Curso facil y divertido para todas las edades</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">Inscribirse</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Comprar</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Ver Más</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA CARRUSEL DE PROMOCIONES EN LA TIENDA -->
<div class="modal fade" id="modal-tienda-promo" tabindex="-1" role="dialog" aria-labelledby="modal-tienda-promo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0e9a9d; border-bottom: solid #0e9a9d;color: white;">
        <h5 class="modal-title" id="modal-tienda-promo">PROMOCIONES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Inscribirse</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Comprar</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Ver Más</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA CARRUSEL DE CURSOS EN LA TIENDA -->
<div class="modal fade" id="mordal-tienda-cursos" tabindex="-1" role="dialog" aria-labelledby="mordal-tienda-cursos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0e9a9d; border-bottom: solid #0e9a9d;color: white;">
        <h5 class="modal-title" id="mordal-tienda-cursos">CURSOS DISPONIBLES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Inscribirse</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Comprar</button>
          <button type="button" class="btn" style="background-color: #0e9a9d; color: white;">Ver Más</button>
      </div>
    </div>
  </div>
</div>
</section>
    <!-- Fin Fondo-tienda -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--swiper-->
    <script src="swiper/js/swiper.min.js"></script>
    <!--dta aos-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript">
    //JAVA SCRIPT MOSTRAR/OCULTAR PAQUETES
      /*$('#mostrart-paquetes').click(function(e) {
  $('#tienda-paquetes').css('visibility', 'visible');

  if( $('#tienda-paquetes').is(":visible") ) {
    $('#tienda-paquetes').css('display', 'none',);
  } else {
    $('#tienda-paquetes').css('display', 'block');
    $('#tienda-promociones').css('display', 'none');
    $('#tienda-cursos').css('display', 'none');
  }
});
  //JAVA SCRIPT MOSTRAR/OCULTAR PROMOCIONES
      $('#mostrart-promociones').click(function(e) {
  $('#tienda-promociones').css('visibility', 'visible');

  if( $('#tienda-promociones').is(":visible") ) {
    $('#tienda-promociones').css('display', 'none');
  } else {
    $('#tienda-promociones').css('display', 'block');
    $('#tienda-paquetes').css('display', 'none');
    $('#tienda-cursos').css('display', 'none');
  }
});
  //JAVA SCRIPT MOSTRAR/OCULTAR CURSOS
      $('#mostrart-cursos').click(function(e) {
  $('#tienda-cursos').css('visibility', 'visible');

  if( $('#tienda-cursos').is(":visible") ) {
    $('#tienda-cursos').css('display', 'none');
  } else {
    $('#tienda-cursos').css('display', 'block');
    $('#tienda-paquetes').css('display', 'none');
    $('#tienda-promociones').css('display', 'none');
  }
});
    </script>*/
    <!--JS PARA ESTILOS AL DAR CLICK EN ALGUN PRODUCTO-->
    <script type="text/javascript">
      $('#p-inactivo img').on('click', function(){
      $('img.p-activo').removeClass('p-activo');
      $(this).addClass('p-activo');
});
    </script>
    <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
    <script>
      AOS.init();
    </script>
    <script>
    $(document).ready(function() {
      var color_p = 1;
       $('#mostrart-promociones').click(function(){
        if (color_p == 1) {
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#tienda-promociones').css('display', 'none')
          color_p = 0;
        }
        else if (color_p == 0) {
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono-promo2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'none');
          $('#tienda-promociones').css('display', 'block');
          $('#tienda-cursos').css('display', 'none');
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          color_p = 1;
          color_c = 0;
          color_a = 0;
        }
       });
       var color_c = 0;
       $('#mostrart-cursos').click(function(){
        if (color_c == 1) {
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          $('#tienda-cursos').css('display', 'none');
          color_c = 0;
        }
        else if (color_c == 0) {
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso-2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'none');
          $('#tienda-promociones').css('display', 'none');
          $('#tienda-cursos').css('display', 'block');
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          color_c = 1;
          color_a = 0;
          color_p = 0;
        }
       });
       var color_a = 0;
       $('#mostrart-paquetes').click(function(){
        if (color_a == 1) {
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          $('#tienda-paquetes').css('display', 'none');

          color_a = 0;
        }
        else if (color_a == 0) {
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono-paquete-2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'block');
          $('#tienda-promociones').css('display', 'none');
          $('#tienda-cursos').css('display', 'none');
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          color_a = 1;
          color_p = 0;
          color_c = 0;
        }
       });
    });
    </script>
  </body>
</html>
