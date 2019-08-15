<nav class="nav justify-content-center nav-index">
  <form name="quienes" method="post" action="{{route ('quienes')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ Auth::user()->name }}">
      <input name="id" type="hidden" value="{{ Auth::user()->id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["quienes"].submit(); return false;'>
          <span>Quienes Somos</span>
        </a>
  </form>

  <form name="diferente" method="post" action="{{route ('diferente')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ Auth::user()->name }}">
      <input name="id" type="hidden" value="{{ Auth::user()->id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["diferente"].submit(); return false;'>
          <span>Que es diferente en este curso?</span>
        </a>
  </form>

  <form name="galeria" method="post" action="{{route ('galeria')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ Auth::user()->name }}">
      <input name="id" type="hidden" value="{{ Auth::user()->id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["galeria"].submit(); return false;'>
          <span>Galeria</span>
        </a>
  </form>

  <a class="nav-link linksmenu" href="#">Cursos</a>

  <a class="nav-link linksmenu" href="#">Videos</a>

  <form name="tienda" method="post" action="{{route ('tienda')}}">
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="post">
      <input name="user" type="hidden" value="{{ Auth::user()->name }}">
      <input name="id" type="hidden" value="{{ Auth::user()->id }}">
        <a class="nav-link linksmenu" href='#' onclick='document.forms["tienda"].submit(); return false;'>
          <span>Tienda</span>
        </a>
  </form>
</nav>
