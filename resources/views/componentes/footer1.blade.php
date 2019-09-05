      <!--footer+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <section style="background-color:#ececec;">
          <div class="container">
            <div class="row justify-content-center logofooter">
              <img src="/assets_f/src/img/logo.png" alt="" width="20%" height="20%">
            </div>
            <div class="row justify-content-center"style="padding-bottom:10px;">
              <a class="linksfooter" href="#">Ayuda</a>
              <a class="linksfooter" href="#">Contactanos</a>
              <a class="linksfooter" href="#">Politicas de privacidad</a>
              <a class="linksfooter" href="#">Terminos y condiciones</a>
              <a class="linksfooter" href="#">Cambiar de pais</a>
            </div>
          </div>
          <div  style="background-color:darkgrey; color:#000000; text-align:center;">Diseñado y Desarrollado por <a href="https://amcdevelopers.com/">AMC developers</a> - Todos los derechos reservados - 2018</div>
        </section>
      <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

      <!--inicio modal login---------------------------------------------------->
        <div class="modal fade" id="loginlogout" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <img src="/assets_f/src/img/logo.png" class="logo" width="60%">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="alert alert-danger" id="divAlert" style="display:none;"></div>
              <div class="modal-body">
                <h5 class="modal-title text-center" id="loginlogout">Bienvenidos</h5>
                <form role="form" class="form" name="login" id="login" action="{{ route('cliente.login') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" id="email2" name="email2" required>
                  </div>
                  <div class="form-group">
                    <label>Contrasena:</label>
                    <input type="password" class="form-control" id="password2" name="password2" required>
                  </div>
                  <div class="modal-footer">
                    <div class="">
                      <a href="{{ route('cliente.password.reset') }}">Olvido su Contrasena?</a>-<a href="{{ route('cliente.register.post') }}">Registrese</a>
                    </div>
                      <a type="button" id="submit" class="btn btn-default " style="background: #268c9b; color: white; font-family: Eras Demi;"><span class="glyphicon glyphicon-off"></span> INGRESAR</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--inicio modal inscribete-->
        <div class="modal fade insc" id="inscribete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6 bgemergente">
                    <img src="" class="img-bgemergente" width="100%" height="100%" style="" id="imagenmodal">
                  </div>

                  <div class="col-lg-6 col-md-12 col-xs-12 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <img src="/assets_f/src/img/logo.png" class="logo" width="60%">
                      <h2 class="h2-text-footer1"style="color:#d21e62; margin-top:10px;">INSCRÍBETE</h2>
                      <h4 class="h4-text-footer1">Te regalamos el primer nivel</h4>
                      <div class="alert alert-danger" id="divAlert6" style="display:none;"></div>
                      <div class="alert alert-success" id="divAlert7" style="display:none;">Logueado con exito!</div>
                    <form class="form-inline" action="{{ route('cliente.register.post') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="container">
                        <div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="text" placeholder="Nombre" id="nameb" name="nameb" required>
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="text"  placeholder="Apellido" id="last_nameb" name="last_nameb" required>
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="email" placeholder="Email" id="emailb" name="emailb" required>
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="text" placeholder="Telefono"id="phoneb" name="phoneb" required>
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="password" placeholder="Contrasena" id="passb" name="password" required>
                        </div>

                        <!--<div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="password" placeholder="Confirmar Contrasena"  name="password_confirmationb" id="password-confirm" required>
                        </div>-->
                      <br>
                        <div class="text-center">
                          <div class="checkbox">
                            <div style="font-size:14px"><input type="checkbox" {{ old('remember') ? 'checked' : '' }} checked value="">&nbsp;&nbsp;ENVÍENME NOTICIAS Y PROMOCIONES POR EMAIL</div>
                          </div>
                        </div>
                        <br>
                        <button type="button" id="submit4" class="btn btn-primary" style="background-color:#0e9a9d;">Empezar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
