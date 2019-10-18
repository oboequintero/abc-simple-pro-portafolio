@extends('componentes.headerindex')
@section('content')

  <!-- Comienzo de vista "QUE ES DIFERENTE EN ESTE CURSO" -->
  <!-- Seccion Primer Banner-->
  <section class="b-diferente">
    <div class="container">
      <!-- Titulo contenido en el banner-->
      <div class="row justify-content-end">
        <div class="col-12 col-md-6 text-center" style="margin-top:10%;">
          <h1>¿Qué es Diferente en este Curso?</h1>
        </div>
      </div>
      <!-- Fin Titulo contenido en el banner-->
      <!-- Descripcion contenido en el banner-->
      <div class="row justify-content-end">
        <div class="col-12 col-md-5">
          <h3>Aprende desde la Comodidad de tu Casa</h3>
          <h5>Olvidate de perder el tiempo en largas colas</h5>
          <br>
          <h3>En cualquier momento</h3>
          <h5>¡Elige el horario que mas te convenga!</h5>
          <br>
          <h3>De fácil acceso</h3>
          <h5>¡Estudia donde quieras!</h5>
        </div> 
      </div>
      <!-- Fin Descripcion contenido en el banner-->
    </div>
  </section>
  <!-- Fin Seccion Primer Banner-->
  <!-- Seccion  Descripcion del Curso-->
  <section class="desc-dif">
    <div class="container">
      <!-- Inicio Primer row que contiene el titulo-->
      <div class="row">
        <div class="col-12 ">
          <h1>¿QUE INCLUYE TU CURSO ONLINE?</h1>
        </div>
      </div>
      <!-- Fin Primer row que contiene el titulo-->
      <!-- Inicio segundo row que contiene imagen y parrafo-->
      <div class="row">
        <div class="col-12 col-md-2">
          <img src="/assets_f/src/img/icono-1.png">
        </div>
        <div class="col-12 col-md-6">
          <h5 style="margin-top: 10px;">Clases privadas y grupales en vivo, aprende y practica con profesores privados o con varios compañeros de tu nivel de todo el mundo.</h5>
        </div>
      </div>
      <!-- Fin segundo row que contiene imagen y parrafo-->
      <!-- Inicio Tercer row que contiene imagen y parrafo-->
      <div class="row">
        <div class="col-12 col-md-2">
          <img src="/assets_f/src/img/icono-2.png">
        </div>
        <div class="col-12 col-md-6">
          <h5 style="margin-top: 10px;">Estudia a tu ritmo con cientos de horas de lecciones para mejorar tu lectura, tu escritura, tu comprension oral y escrita.</h5>
        </div>
        <div class="col-12 col-md-4 d-none d-md-block">
          <img src="/assets_f/src/img/img-1png.png" class="descimg-dif">
        </div>
      </div> 
      <!-- Fin Tercer row que contiene imagen y parrafo-->
      <!-- Inicio cuarto row que contiene imagen y parrafo-->
      <div class="row">
        <div class="col-12 col-md-2">
          <img src="/assets_f/src/img/icono-3.png">
        </div>
        <div class="col-12 col-md-6">
          <h5 style="margin-top: 20px;">Resultados certificados: Recibe un diploma certificado al finalizar nuestro curso</h5>
        </div>
      </div> 
      <!-- Inicio quinto row que contiene imagen y parrafo-->
      <div class="row">
        <div class="col-12 col-md-2">
          <img src="/assets_f/src/img/icono-4.png">
        </div>
        <div class="col-12 col-md-6">
          <h5 style="margin-top: -5px;">¿Cuanto cuesta Abc Simple?</h5>
          <h5>Tenemos planes de pago ajustados a tu moneda local , nuestros asesores te ayudaran a elegir un pago que se adapte a tus posibilidades.</h5>
        </div>
        <div class="col-12 col-md-4 text-center">
          <button type="button" class="btn btn-lg">Más Información</button>
        </div>
      </div> 
      <!-- Fin quinto row que contiene imagen y parrafo-->
    </div>
  </section>
  @endsection