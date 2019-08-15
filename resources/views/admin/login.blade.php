<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iniciar Sesión | ABC Simple</title>

    <!-- Bootstrap -->
    <link href="<?php echo url('/'); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo url('/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo url('/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo url('/'); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo url('/'); ?>src/css/custom.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo url('/'); ?>src/frontend/img/icono.png" />
  </head>

  <body class="login">
    
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
                <div>
                  <h1 class="text-center"><img src="<?php echo url('/'); ?>src/frontend/img/logo.png" style="width: 200px;" alt=""></h1>
                </div>
          <section class="login_content">
            <form method="post" action="<?php echo url('/'); ?>login/new_user">
              <h1><?php echo $titulo; ?></h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Clave" id="clave" name="clave" required />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit"><?php echo $titulo; ?></button>
                <a href="#signup" class="reset_pass">Olvidaste tu Clave?</a>
              </div>
              <?=form_hidden('token',$token)?>
              <p style="color: red;"><?php echo $this->session->userdata('usuario_incorrecto') <> '' ? $this->session->userdata('usuario_incorrecto') : ''; ?></p>
              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
        <div>
                  <h1 class="text-center"><img src="<?php echo url('/'); ?>src/frontend/img/logo.png" style="width: 200px;" alt=""></h1>
                </div>
          <section class="login_content">
            <form method="post" action="<?php echo url('/'); ?>/login/send_password">
              <h1>Recuperar clave</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required id="usuario" name="usuario"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Correo" required id="correo" name="correo"/>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Recuperar</button>
                <a href="#signin" class="reset_pass"><?php echo $titulo; ?></a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
<?php if ($this->session->userdata('listoClave') != ''): ?>
          <script>
              alert("<?php echo $this->session->userdata('listoClave') <> '' ? $this->session->userdata('listoClave') : ''; ?>");
          </script>
        <?php endif ?>
        <?php if ($this->session->userdata('errorClave') != ''): ?>
          <script>
              alert("<?php echo $this->session->userdata('errorClave') <> '' ? $this->session->userdata('errorClave') : ''; ?>");
          </script>
        <?php endif ?>
  </body>
</html>
