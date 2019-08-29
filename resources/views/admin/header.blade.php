<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <title>ABC-Simple</title>
    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet" media="all">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <link href="/vendors/src/css/fileinput.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/src/css/custom.css" rel="stylesheet">    
    
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <link rel="icon" type="image/png" sizes="16x16" style="width: 20px" href="/assets_f/src/img/logo.png">
  </head>

  <body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col ">
      <div class="left_col scroll-view">
        <div class="navbar nav_title text-center" style="border: 0;">
          <a href="" style="padding: 0;" class="site_title"><img src="#" alt="" style="height: 37px;"><span>Abc-Simple</span></a>
        </div>

        <div class="clearfix"></div>
       
      
       <!-- menu profile quick info -->
        <div class="profile clearfix text-center">
          <div class="profile_info" style="width: 100%;">
             <p style="color: white;text-align: center;font-size: 20px; text-shadow: 0px 0px 5px black;" id="saludo"></p>
            <h2 style="color: white;text-align: center;font-size: 20px; text-shadow: 0px 0px 5px black;">
                    </h2>
            <p style="color: white;text-align: center;font-size: 20px;margin-top: 15px;text-shadow: 0px 0px 5px black;" id="liveclock">
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3 class="text-center" style="padding: 0;">MENU</h3>
            <ul class="nav side-menu">
              <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('users.index') }}"> Clientes </a></li>
                  <li><a href="{{ route('admins.index') }}"> Usuarios </a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-file"></i> Curso <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('producto.index') }}">Producto</a></li>
                  <li><a href="{{ route('tipopro.index') }}">Tipo Producto</a></li>
                  <li><a href="{{ route('idioma.show',0) }}">Idioma</a></li>
                  <li><a href="{{ route('curso.show',0) }}">Cursos</a></li>
                  <li><a href="{{ route('nivel.show',0) }}">Niveles</a></li>
                  <li><a href="{{ route('leccion.show',0) }}">Lecciones</a></li>
                  <li><a href="{{ route('plantilla.show',0) }}">Plantillas</a></li>
                  <li><a href="{{ route('contenido.show',0) }}">Contenido</a></li>
                  <li><a href="{{ route('diccionario.index') }}">Diccionario</a></li>
                  <!--<li><a href="{{ route('tips.show',0) }}">Tips</a></li>
                  <li><a href="{{ route('tipsbyplantilla.show',0) }}">Tips Plantilla</a></li>-->
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
         
          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;" data-toggle="modal" data-target="#cambiarClave" target="_blank">Cambiar Clave</a></li>
                <li><a href="{{ url('/') }}" target="_blank">Ver Frontend</a></li>
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
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
     @yield('main-content')
    <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="#">Abc-Simple</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <div class="modal fade" id="cambiarClave" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header" style="background-color: #73879C; color: white;border-radius: 5px 5px 0px 0px;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title text-center" id="myModalLabel">Cambiar Clave</h4>
          </div>
            <form action="" method="post">
          <div class="modal-body">
                <div class="form-group">
                <label for="varchar">Clave Actual</label>
                <input type="password" class="form-control" name="clave_act" id="clave_act" placeholder="Clave Actual" value="" required maxlength="18" minlength="8"/>
            </div>
            <br>
                <div class="form-group">
                <label for="varchar">Clave Nueva</label>
                <input type="password" class="form-control" name="clave_new" id="clave_new" placeholder="Clave Nueva" value="" required maxlength="18" minlength="8"/>
            </div>
                <div class="form-group">
                <label for="varchar">Confirme Clave Nueva</label>
                <input type="password" class="form-control" name="clave_new2" id="clave_new2" placeholder="Confirme Clave Nueva" value="" required maxlength="18" minlength="8"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Cambiar</button>
          </div>
            </form>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="/vendors/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
    <script src="/vendors/jszip/dist/jszip.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- PNotify -->
    <script src="/vendors/pnotify/dist/pnotify.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.nonblock.js"></script>

        <!-- CK Editor -->
    <!-- Custom Theme Scripts -->
    <script src="/src/js/fileinput.min.js"></script>
    <script src="/src/js/custom.js"></script>
   @if (Session::has('message')!= ''):
          <script>
              new PNotify({
                title: 'Exito',
                text: "{{ Session::get('message') }}",
                type: 'success',
                hide: false,
                styling: 'bootstrap3'
              });
            
          </script>
       @endif
       @if (Session::has('error')!= ''):
          <script>
              new PNotify({
                title: 'Error',
                text: "{{ Session::get('error') }}",
                type: 'error',
                hide: false,
                styling: 'bootstrap3'
              });
            
          </script>
       @endif
    <script>
        function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        if (hours >= 0 && hours <= 11) {
            var saludo = 'Buenos Dias,';
        }
        if (hours >= 12 && hours <= 18) {
            var saludo = 'Buenas Tardes,';
        }
        if (hours >= 19 && hours <= 23) {
            var saludo = 'Buenas Noches,';
        }
        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12
        $('#saludo').html(saludo);
         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock=""+hours+":"+minutes+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }
  $(document).ready(function() {
    window.onload=show5;
      });
</script>
   

  </body>
</html>