@extends('componentes.headerlinkslog')
@section('content')
  <!-- SECTION CARRUSEL GALERIA ABC -->
  <section class="banner-galeria">
        <div id="carousel-galeria" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="/assets_f/src/img/carrousel.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/assets_f/src/img/carrousel.jpg" alt="Second slide">
            </div>

          </div>
          <a class="carousel-control-prev" href="#carousel-galeria" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-galeria" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </section>
    <!-- GALERIA DE FOTOS ABC -->
    <section class="fondo-galeria-abc">
        <div class="container text-center">
            <br>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/uno.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/dos.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/tres .jpg">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/uno.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/dos.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/tres .jpg">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/uno.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/dos.jpg">
                </div>
                <div class="col-12 col-md-4">
                    <img src="/assets_f/src/img/tres .jpg">
                </div>
            </div>
            <br>
        </div>
    </section>

  @endsection