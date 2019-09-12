@extends('componentes.footer2')
@extends('componentes.headerdashboard')
@section('content')
<!--contenido 3 columnas+++++++++++++++++++++++++++++++++++++++++++++++++++-->
<section id="fondohome">
  <div class="section-row-home">

    <div class="col-lg-1 div-nav-menu">
        <nav class="navmenu" style="padding-top:25px;">
          <ul>
            <li class="has-subnav">
              <a href="" data-toggle="collapse" aria-expanded="false"><i class="fa"><img width="65%" src="{{ asset('/storage/contenido/'.Auth::user()->photo1)}}"></i>
                <span class="nav-text">
                {{ Auth::user()->name }}

                <input type="hidden" id="clienteUser" value="{{ Auth::user()->id }}">
                </span>
              </a>
            </li>
            <hr>

            <form name="nivel" method="post" action="{{route ('nivel')}}">
            {{ csrf_field() }}
              <input name="_method" type="hidden" value="post">
              <input name="usuario" type="hidden" value="{{ Auth::user()->name }}">
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

            <li class="has-subnav">
              <a  href="#f" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono22.png"></i>
                <span class="nav-text">
                  Promociones
                </span>
              </a>
              <ul class="collapse list-unstyled" id="f">
                <li><a style="color:primary" href="#">Promocion 1</a></li>
                <li><a style="color:primary" href="#">Promocion 2</a></li>
                <li><a style="color:primary" href="#">Promocion 8</a></li>
              </ul>
            </li>
            <li class="has-subnav">
              <a  href="#q" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono13.png"></i>
                <span class="nav-text">
                  Cursos
                </span>
              </a>
              <ul class="collapse list-unstyled" id="q">
                <li><a style="color:primary" href="#">Curso 1</a></li>
                <li><a style="color:primary" href="#">Curso 2</a></li>
                <li><a style="color:primary" href="#">Curso 3</a></li>
              </ul>
            </li>
            <li class="has-subnav">
              <a  href="#w" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono32.png"></i>
                <span class="nav-text">
                  Productos
                </span>
              </a>
              <ul class="collapse list-unstyled" id="w">
                <li><a style="color:primary" href="#">Producto 1</a></li>
                <li><a style="color:primary" href="#">Producto 2</a></li>
                <li><a style="color:primary" href="#">Producto 3</a></li>
              </ul>
            </li>
            <li class="has-subnav">
              <a  href="#v" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="faa"><img width="55%" src="/assets_f/src/img/icono14.png"></i>
                <span class="nav-text">
                  Mis Cursos
                </span>
              </a>
              <ul class="collapse list-unstyled" id="v">
                <li><a style="color:primary" href="#">Mi Curso 1</a></li>
                <li><a style="color:primary" href="#">Mi Curso 2</a></li>
                <li><a style="color:primary" href="#">Mi Curso 3</a></li>
              </ul>
            </li>
          </ul>
          <hr>
        </nav>
    </div>

    <div class="col-md-12 col-lg-4" style="margin-top:20px;">
        <div class="card card-abc abc-user-2">
          <div class="abc-user-header">

            <div class="abc-user-image">
              <img class="img-circle elevation-2" src="{{ asset('/storage/contenido/'.Auth::user()->photo1)}}" alt="User Avatar">
              <h5 class="abc-user-username" style="float-right">{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}</h5>
            </div>

          </div>
          <div class="card-header">
            <ul class="nav flex-column">
              <li class="nav-items">
              <span>Correo:</span>
                <a href="#" class="nav-link">
                {{ Auth::user()->email }}<span class="float-right badge bg-primary"></span>
                </a>
              </li>
              <li class="nav-items">
              <span>Telefono:</span>
                <a href="#" class="nav-link">
                {{ Auth::user()->phone }} <span class="float-right badge bg-info"></span>
                </a>
              </li>
              <li>
              <span>Documento:</span>
                <a href="#" class="nav-link">
                {{ Auth::user()->documento}}<span class="float-right badge bg-success"></span>
                </a>
              </li>
              <li>
              <span>Nacimiento:</span>
                <a href="#" class="nav-link">
                {{ Auth::user()->fecha_nac}}<span class="float-right badge bg-success"></span>
                </a>
              </li>
            </ul>
          </div>
          <!--<div class="card-footer">
            <ul class="nav flex-column">
              <li class="nav-items">
                  <span class="float-right badge bg-primary"></span>&nbsp; <span>Progreso:</span>
              </li>
              <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                    70%
                </div>
              </div>
            </ul>
          </div>-->

          <!--<button class="opcional parrafos btn btn-primary" type="button" data-toggle="modal"  data-target="#completar" style="background-color:#0e9a9d;">Modificar Datos</button>-->
          <a class="opcional parrafos btn btn-primary" style="background-color:#0e9a9d;" href="{{route('editar.cliente', Auth::user()->id)}}">Modificar Datos</a>

        </div>
    </div>

    <div class="col-md-12 col-lg-7 cont-carr-cur">
        <h1>Curso Fácil y Divertido</h1>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 35px;">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="/assets_f/src/img/banner1abc.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/assets_f/src/img/banner2abc.jpg" alt="Second slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <h3 style="font-weight: bold;color: #464646">Aprende Ingles con Nuestros Cursos</h3>
        <h5 style="color:color: #464646">!Le ofrecemos mas de 100 Lecciones con ejemplos y audios</h5>
        <button type="button" class="btn btn-sm">Ver Mas</button>
    </div>

  </div>
  </section>
@endsection
