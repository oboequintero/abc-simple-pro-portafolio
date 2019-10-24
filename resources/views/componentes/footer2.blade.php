
      <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <div class="fixed-bottom" style="background-color:darkgrey; color:#000000; text-align:center;">Diseñado y Desarrollado por <a href="https://amcdevelopers.com/">AMC developers</a> - Todos los derechos reservados - 2018</div>



      <!--inicio modal inscribete------------------------------------------------------->
      <div class="modal fade insc" id="completar">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
              <div class="row">
                  <div class="col-md-12 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <img src="/assets_f/src/img/logo.png" class="logo" width="40%">
                      <h2 class="h2-text-footer2"style="color:#d21e62; margin-top:10px;">Modificar Datos</h2>
                      <form class="form-inline" action="{{ route('update.cliente', Auth::user()->id) }}" method="POST">
                      {{ csrf_field() }}
                      <div class="container">
                          <div class="abc-user-image" style="text-align:left; margin-top:30px;">
                            <img class="img-circle elevation-2" src="/assets_f/src/img/avatar1.png" alt="User Avatar" width="15%">
                            <input class="" type="file">
                          </div>
                          <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                          <input name="id" id="id" type="text" value="{{Auth::user()->id}}">
                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="name" class="form-control" type="text" placeholder="Nombre" name="name" value="">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="last_name" class="form-control" type="text"  placeholder="Apellido" name="last_name" value="{{Auth::user()->last_name}}">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{Auth::user()->email}}">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="documento" class="form-control" type="text" placeholder="documento" name="documento" value="{{Auth::user()->documento}}">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="fecha_nac" class="form-control" type="date" placeholder="nacimiento" name="fecha_nac" value="{{Auth::user()->fecha_nac}}">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="phone" class="form-control" type="text" placeholder="Telefono" name="phone" value="{{Auth::user()->phone}}">
                        </div>

                        <div class="input-group" style="padding-bottom:5px;">
                          <input id="password" class="form-control" type="password" placeholder="Contrasena" name="password" id="password" value="">
                        </div>

                        <!--<div class="input-group" style="padding-bottom:5px;">
                          <input class="form-control" type="password" placeholder="Confirmar Contrasena"  name="password_confirmation" id="password-confirm">
                        </div>-->
                        <br>
                        <!--<button id="actualizar" type="submit" class="btn btn-primary" style="background-color:#0e9a9d;">Actualizar</button>
                        <a href="{{route('editar.cliente', Auth::user()->id)}}" class="opcional parrafos btn btn-primary">Editar</a>-->
                        <a type="button" id="submit" class="btn btn-primary" style="">INGRESAR</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('/assets_f/src/js/funciones.js')}}"></script>
        <script src="{{asset('/assets_f/src/js/adminlte.js')}}"></script>
        <script src="{{asset('/assets_f/src/js/jquery.knob.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="{{asset('/assets_f/src/js/swiper.min.js')}}"></script>

    </body>

  <script>

  
    function cursos_gratis() {
        var scHTML = '';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });

         var parametros = {
            "identidad" : 1,
            'token': "token"
            };
        $.ajax({
               data:  parametros,
               url:   'cursos_gratis',
               type:  'post',
               async:  true,
               dataType: "json",
           error: function() {
                  alert('Ha surgido un error');
           },
           success:  function (data) {

                $.each(data.data, function (index, value) {

                  scHTML += '<form  method="POST" action="{{ route("nivel") }}"><input name="_method" type="hidden" value="POST"> <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">  <li><button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;"> '+value.Nombre+' </button></li> <input type="hidden" name="id_curso" value="'+value.id_curso+'"> <input type="hidden" name="id_cliente" value="{{ auth()->user()->id }} "> <input type="hidden" name="name_cliente" value="{{ auth()->user()->name }} "> <input type="hidden" name="photo_cliente" value="{{ auth()->user()->photo1}} "> </form>'

                $('#z').append(scHTML);
                scHTML = '';
                });

           }
       });
    }



  </script>

</html>
