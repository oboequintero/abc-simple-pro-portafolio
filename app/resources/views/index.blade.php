@extends('componentes.headerindex')
@section('content')
<!--seccion de nav bar de informacion+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

  <section id="banner" class="d-none d-lg-block">
    <div class="container-fluid">
      <div class="row" >
        <div class="col-xl-4 col-lg-4"></div>
        <div class="col-xl-5 col-lg-4">
          <h1 class="h1-text-index">Curso Fácil y Divertido</h1>
          <p class="p-text-index">Para pronunciar bien y comprender el inglés sin gramática</p>
          <!--<div class="row justify-content-center" style="padding-left:14px;">
              <ul class="social-network social-circle" style="text-align:center;">
                <li style="font-weight: bold; color:#d21e62;">siguenos en nuestras redes sociales</li><br>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-pinterest-p"></i></a></li>
              </ul>
            </div>-->
        </div> 
              
        <div class="col-xl-3 col-lg-4" style="padding-bottom:5%;">
          <form method="POST" action="{{ route('cliente.register.post') }}" class="ajustargrande">
              {{ csrf_field() }}
              <p class="p-index2">INSCRÍBETE</p>
              <p class="p-index3">Comience a aprender ingles AHORA</p>
              <div class="alert alert-danger" id="divAlert2" style="display:none;"></div>
              <div class="alert alert-success" id="divAlert3" style="display:none;">Logueado con exito!</div>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group field-form">
                    <label for="first_name" class="label-index-form">Nombre</label>
                    <input type="text" class="form-control" id="name" name="nombre" required>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset class="form-group field-form">
                    <label for="last_name" class="label-index-form">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                  </fieldset>
                </div>
              </div>
              <fieldset class="form-group field-form">
                <label for="last_name" class="label-index-form">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </fieldset>
              <fieldset class="form-group field-form">
                <label for="last_name" class="label-index-form">Telefono</label>
                <input type="phone" class="form-control number" id="phone" name="phone" required>
              </fieldset>
              <fieldset class="form-group field-form">
                <label for="password" class="label-index-form">Contraseña</label> 
                <div class="input-group mb-3">
                  <input class="form-control" type="password" name="password" id="password" required>
                  <div class="input-group-append">
                    <span class="btn btn-outline fa fa-eye ojo" id="show"></span>
                  </div>
                </div>
              </fieldset>
              <div class="form-group text-center">
                <div class="checkbox">
                  <label class="label-check"><input type="checkbox" {{ old('remember') ? 'checked' : '' }} checked value="">&nbsp&nbspENVÍENME NOTICIAS Y PROMOCIONES POR EMAIL</label>
                </div>
              </div>
              <button type="button" id="submit2" class="opcional parrafos btn btn-primary" style="background-color:#0e9a9d; border-color:#007bff00;">Empezar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <section id="banner2" class="d-lg-none">
    <div class="container-fluid">
      <div class="row" >
        <div class="col-xl-4 col-lg-4"></div>
        <div class="col-xl-5 col-lg-4">
          <h1 class="h1-text-index">Curso Fácil y Divertido</h1>
          <h5 class="p-text-index">Para pronunciar bien y comprender el inglés sin gramática</h5>
          <!--<div class="row justify-content-center" style="padding-left:14px;">
              <ul class="social-network social-circle" style="text-align:center;">
                <li style="font-weight: bold; color:#d21e62;">siguenos en nuestras redes sociales</li><br>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-pinterest-p"></i></a></li>
              </ul>
            </div>-->
        </div>
              
        <div class="col-xl-3 col-lg-4" style="padding-bottom:5%;">
          <form method="POST" action="{{ route('cliente.register.post') }}" class="ajustargrande">
              {{ csrf_field() }}
              <p class="p-index2">INSCRÍBETE</p>
              <p class="p-index3">Comience a aprender ingles AHORA</p>
              <div class="alert alert-danger" id="divAlert4" style="display:none;"></div>
              <div class="alert alert-success" id="divAlert5" style="display:none;">Logueado con exito!</div>
              <div class="row">
                <div class="col-md-6">
                  <fieldset class="form-group field-form">
                    <label for="first_name" class="label-index-form">Nombre</label>
                    <input type="text" class="form-control" id="namea" name="namea" required>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset class="form-group field-form">
                    <label for="last_name" class="label-index-form">Apellido</label>
                    <input type="text" class="form-control" id="last_namea" name="last_namea" required>
                  </fieldset>
                </div>
              </div>
              <fieldset class="form-group field-form">
                <label for="last_name" class="label-index-form">Email</label>
                <input type="email" class="form-control" id="emaila" name="emaila" required>
              </fieldset>
              <fieldset class="form-group field-form">
                <label for="last_name" class="label-index-form">Telefono</label>
                <input type="phone" class="form-control number" id="phonea" name="phonea" required>
              </fieldset>
              <fieldset class="form-group field-form">
                <label for="password" class="label-index-form">Contraseña</label> 
                <div class="input-group mb-3">
                  <input class="form-control" type="password"  id="passa" name="passworda" required>
                  <div class="input-group-append">
                    <span class="btn btn-outline fa fa-eye ojo" id="show"></span>
                  </div>
                </div>
              </fieldset>
              <div class="form-group text-center">
                <div class="checkbox">
                  <label class="label-check"><input type="checkbox" {{ old('remember') ? 'checked' : '' }} checked value="">&nbspENVÍENME NOTICIAS Y PROMOCIONES POR EMAIL</label>
                </div>
              </div>
              <button type="button" id="submit3" class="opcional parrafos btn btn-primary" style="background-color:#0e9a9d; border-color:#007bff00;">Empezar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <!--boton de bact to top-->
  <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>

<!--seccion de video y texto+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
  <section class="section-video">
    <div class="container-fluid">
      <div class="row sec-video">
        <div class="col-md-7 d-sec-vid">
          <div class="embed-responsive embed-responsive-16by9">
            <video src="/assets_f/src/video/prueba10.mp4" controls></video>
          </div>
        </div>
        <div class="col-md-5 d-tex">
          <p class="parrafos-vid">Haz que tus viajes y tiempo libre sean más productivos con la aplicación móvil de ABC simple</p>
          <p class="parrafos-vid">Descargala y ve por que Apple y Google nos dan sus premios más altos</p>
        </div>
      </div>
    </div>
  </section>

<!--seccion de comentarios, historias de exito+++++++++++++++++++++++++++++++++++++++++++++++++-->
  <section class="comentarios">
    <div class="container">
      <div class="section-row justify-content-center">
        <p class="titulo2">Nuestas Historias de Exíto</p>
      </div>
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png" style="width:100%">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Ana <img src="/assets_f/src/img/bandera2.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png" style="width:100%">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Ana <img src="/assets_f/src/img/bandera2.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png" style="width:100%">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Ana <img src="/assets_f/src/img/bandera2.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top fondotarjetas" src="/assets_f/src/img/comillas.png">
              <div class="card-body fondotarjetas">
                <h5 class="card-title">Victoria <img src="/assets_f/src/img/bandera1.png" alt="" width="25%" height="25%"></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <img class="img-start" src="/assets_f/src/img/estrellas3.png">
              </div>
            </div>
          </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

<!--redes sociales+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
  <section class="color-redes">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/assets_f/src/img/banner1abc.jpg" alt="" height="12%" width="100%">
        </div>
      <div class="carousel-item">
        <img src="/assets_f/src/img/banner2abc.jpg" alt="" height="12%" width="100%">
      </div>
      <div class="carousel-item">
        <img src="/assets_f/src/img/banner3abc.jpg" alt="" height="12%" width="100%">
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center separacionbotonesfooter">
        <ul class="social-network social-circle">
          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-linkedin-in"></i></a></li>
          <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-pinterest-p"></i></a></li>
        </ul>
      </div>
    </div>
  </section>
  
<!--3 columnas de texto++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
  <section  class="sec-texto">
    <div class="container">
      <div class="row">
        <div class="col-md-4 parrafos ajustarlinksfooter">
          <p><a class="linksfooter" href="#" style="">Conoce el método educativo</a></p>
          <p><a class="linksfooter" href="#" style="">Blog</a></p>
          <p><a class="linksfooter" href="#" style="">Ofertas</a></p>
          <p><a class="linksfooter" href="#" style="">Abre una franquicia</a></p>
        </div>
        <div class="col-md-4 parrafos ajustarlinksfooter">
          <p><a class="linksfooter" href="#" style="">Haz examenes de nivelacion</a></p>
          <p><a class="linksfooter" href="#" style="">Compra los materiales</a></p>
          <p><a class="linksfooter" href="#" style="">Aprende con clases provadas</a></p>
        </div>
        <div class="col-md-4 parrafos ajustarlinksfooter">
          <p><a class="linksfooter" href="#" style="">Mira los reviews</a></p>
          <p><a class="linksfooter" href="#" style="">Consultoria para empresas</a></p>
          <p><a class="linksfooter" href="#" style="">Preguntas y respuestas frecuentes</a></p>
        </div>
      </div>
      <div class="row div-row">
        <div class="col-md-12 alinearstart">
          <img src="/assets_f/src/img/star.png" alt="" width="15%">
        </div>
      </div>
    </div>
  </section>
@endsection