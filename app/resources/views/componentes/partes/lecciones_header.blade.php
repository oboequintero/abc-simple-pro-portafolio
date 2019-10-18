<nav class="navbar navbar-expand-lg navbar-light nav-hd1">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <img src="/assets_f/src/img/logo.png" width="20%">
          </button> 
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <div class="col-lg-4">
              <a id="saludo"></a>&nbsp;
                <span style="padding-left: 5px;">{{ $name_cliente }}.</span>&nbsp;
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
              <form name="nivel" method="post" enctype='multipart/form-data' action="{{route ('nivel')}}">
                {{ csrf_field() }}
                  <input name="_method" type="hidden" value="post">
                 <!--falta el input name usuario $nombre -->
                  
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