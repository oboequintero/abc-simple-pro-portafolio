<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col ">
      <div class="left_col scroll-view">
        <div class="navbar nav_title text-center" style="border: 0;">
          <a href="" style="padding: 0;" class="site_title"><img src="#" alt="" style="height: 37px;"><span>Abc-Simple</span></a>
        </div>

        <div class="clearfix"></div>
       
       @if (! Auth::guest())
       <!-- menu profile quick info -->
        <div class="profile clearfix text-center">
          <div class="profile_info" style="width: 100%;">
             <p style="color: white;text-align: center;font-size: 20px; text-shadow: 0px 0px 5px black;" id="saludo"></p>
            <h2 style="color: white;text-align: center;font-size: 20px; text-shadow: 0px 0px 5px black;">
              {{ Auth::user()->name }}
            </h2>
            <p style="color: white;text-align: center;font-size: 20px;margin-top: 15px;text-shadow: 0px 0px 5px black;" id="liveclock">
          </div>
        </div>
         @endif
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3 class="text-center" style="padding: 0;">MENU</h3>
            <ul class="nav side-menu">
              <li><a href="#seo"><i class="fa fa-file-text"></i> Seo </a></li>
              <li><a href="{{ route('users.show',0) }}"><i class="fa fa-users"></i> Usuarios </a></li>

              <li><a><i class="fa fa-file"></i> Curso <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('nivel.index') }}">Niveles</a></li>
                  <li><a href="{{ route('leccion.show',0) }}">Lecciones</a></li>
                  <li><a href="{{ route('plantilla.show',0) }}">Plantillas</a></li>
                  <li><a href="{{ route('contenido.index',0) }}">Contenido</a></li>
                  <li><a href="{{ route('tips.index',0) }}">Tips</a></li>
                  <li><a href="{{ route('tipsbyplantilla.index',0) }}">Tips Plantilla</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a href="#seo" data-toggle="tooltip" data-placement="top" title="Gestionar Seo">
                <span class="fa fa-file-text" aria-hidden="true"></span>
              </a>
          <span data-toggle="modal" data-target="#cambiarClave">
                <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="Cambiar Clave">
                  <span class="glyphicon glyphicon-lock" aria-hidden="true" ></span>
          </a>
          </span>
          <a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Ver Frontend">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
              </a>
        
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          @if (! Auth::guest())
          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 {{ Auth::user()->name }}
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;" data-toggle="modal" data-target="#cambiarClave" target="_blank">Cambiar Clave</a></li>
                <li><a href="" target="_blank">Ver Frontend</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                      </form>
                </li>
              </ul>
            </li>
          </ul>
           @endif
        </nav>
      </div>
    </div>
    <!-- /top navigation -->