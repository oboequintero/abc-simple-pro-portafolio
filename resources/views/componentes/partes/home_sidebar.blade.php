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
          <form name="nivel" method="post" enctype='multipart/form-data' action="{{route ('nivel')}}">
          {{ csrf_field() }}
            <input name="_method" type="hidden" value="post">
            <input name="usuario" type="hidden" value="{{ Auth::user()->name }}">
            <input name="photo"   type="hidden" value="{{ Auth::user()->photo1 }}">

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
              <li><a href='#' onclick='document.forms["nivel"].submit(); return false;'>Mi Regalo 1</a></li>
              <li><a style="color:primary" href="#">Mis Regalos 2</a></li>
              <li><a style="color:primary" href="#">Mis Regalos 3</a></li>
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
              <li><a style="color:primary" href="#">Promocion 3</a></li>
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