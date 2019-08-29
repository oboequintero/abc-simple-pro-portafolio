<!DOCTYPE html>
<html lang="es">
<head>
  <title>Home - ABC Simple</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta property="og:url" content="abcsimple.com" />
  <meta property="og:type" content="Website" />
  <meta property="og:title" content="Titulo" />
  <meta property="og:description" content="escripcion" />
  <meta property="og:image" content="ruta_imagen" />
  <meta property="og:image:width" content="470" />
  <meta property="og:image:height" content="246" />
  <meta property="description" content="descripcion" />
  <meta name="author" content="AMC">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link href="/assets_f/src/css/custom.css" rel="stylesheet">
  <link href="/assets_f/src/css/dash.css" rel="stylesheet">

 
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

</head>
<body>
  <div class="top_nav text-right">
    <div class="container">
      <ul class="links_top">
        <li><a href="#a" class="active"><span class="hidden-xs">Para </span>Personas</a></li>
       <!-- <li><a href="#a"><span class="hidden-xs">Para </span>Empresas</a></li>-->
      </ul>
      <a href="tel:+584169951512" class="icon"><img src="/assets_f/src/img/icon_phone.png" alt="Llamar"></a>
      <a href="mailto:correo@abcsimple.com" class="icon"><img src="/assets_f/src/img/icon_email.png" alt="Enviar mensaje"></a>
      @guest
      <a href="#a" class="login">Log In</a>
      <a href="#a" class="inscribete open_inscribete">INSCRIBETE<span class="hidden-sm hidden-xs">: Primer nivel GRATIS</span></a>
      @else
      <a href="#a" class="inscribete"><span class="hidden-sm hidden-xs">{{ Auth::user()->name }}</span></a>
      <a class="login" href="{{ url('/cliente/logout') }}"
        onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
         Logout
      </a>
       <form id="logout-form" action="{{ url('/cliente/logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
       </form>
      @endguest
    </div>
  </div>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets_f/src/img/logo.png" style="height: 100%;"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="una_linea">¿Quienes Somos?</a></li>
          <li><a href="#">¿Que es diferente <br> en este curso?</a></li>
          <li><a href="#" class="una_linea">Galeria de Fotos</a></li>
          <li><a href="#" class="una_linea">Cursos</a></li>
          <li><a href="#" class="una_linea">Videos</a></li>
          <li><a href="#" class="una_linea">Libros</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
     @yield('content')

<footer>
    <div class="container">
      <img src="/assets_f/src/img/icon_star.png" alt="Star Reviews" class="icon_star">
      <ul class="redes_footer">
        <li><a href="#a"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#a"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#a"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="#a"><i class="fab fa-pinterest-p"></i></a></li>
      </ul>
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <ul class="links_footer">
            <li><a href="#a">Coonoce el Metodo Educativo</a></li>
            <li><a href="#a">Blog</a></li>
            <li><a href="#a">Ofertas</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-xs-12">
          <ul class="links_footer">
            <li><a href="#a">Haz el examen de Nivelacion</a></li>
            <li><a href="#a">Compra los Materiales</a></li>
            <li><a href="#a">Aprende con Clases Privadas</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-xs-12">
          <ul class="links_footer">
            <li><a href="#a">Mira los Reviews</a></li>
            <li><a href="#a">Consultoria para Empresas</a></li>
            <li><a href="#a">Preguntas y Respuestas Frecuentes</a></li>
          </ul>
        </div>
        <div class="col-xs-12 text-center">
          <img src="/assets_f/src/img/logo.png" class="logo_bottom" alt="ABC Simple">
          <ul class="link_bottom">
            <li><a href="#a">Ayuda</a></li>
            <li><a href="#a">Contactanos</a></li>
            <li><a href="#a">Politica de Privacidad</a></li>
            <li><a href="#a">Terminos y Condiciones</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>