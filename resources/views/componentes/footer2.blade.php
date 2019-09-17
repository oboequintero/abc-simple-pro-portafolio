
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
    //imagen completa de banner principal
    $(document).ready(function() {

        $("#fondohome").css({"height":$(window).height() + "px"});
        $("#fondoc1").css({"height":$(window).height() + "px"});
        cursos_gratis();
        log_cliente();

    });



  //reloj
  function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
          return
          var Digital=new Date()
          var hours=Digital.getHours()
          var minutes=Digital.getMinutes()
          var seconds=Digital.getSeconds()

          if (hours >= 0 && hours <= 11) {
            var saludo = 'Buenos Dias';
          }
          if (hours >= 12 && hours <= 18) {
            var saludo = 'Buenas Tardes';
          }
          if (hours >= 19 && hours <= 23) {
            var saludo = 'Buenas Noches';
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

                  scHTML += '<form  method="POST" action="{{ route("nivel") }}"><input name="_method" type="hidden" value="POST"> <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">  <li><button type="submit" class="btn btn-link" style="color: #17909C; text-decoration:none;"> '+value.Nombre+' </button></li> <input type="hidden" name="id_curso" value="'+value.id_curso+'"> <input type="hidden" name="id_cliente" value="{{ auth()->user()->id }} "> </form>'

                $('#z').append(scHTML);
                scHTML = '';
                });

           }
       });
    }

    function log_cliente() {
        var scHTML = '';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });

         var parametros = {
            "identidad" : $('#clienteUser').val(),
            'token': "token"
            };
        $.ajax({
               data:  parametros,
               url:   'log_cliente',
               type:  'post',
               async:  true,
               dataType: "json",
           error: function() {
                  alert('Ha surgido un error');
           },
           success:  function (data) {

                alert(data.msg);

           }
       });
    }

            // ajax para actualizar datos

         /* $(document).on('click', '#completar', function(){
            var USER = $(this).attr("id");
              $.ajax({
                url:"{{ url('/cliente/update_cliente{id}') }}",
                method:"POST",
                data:{Auth::user()},
                dataType:"json",
                _token: '{{csrf_token()}}'
                success:function(data){
                  $('#name').val(data.name);
                  $('#last_name').val(data.last_name);
                  $('#email').val(data.email);
                  $('#phone').val(data.phone);
                  $('#password').val(data.password);
                  $('#documento').val(data.documento);
                  $('#fecha_nac').val(data.fecha_nac);
                  $('#id').val(data.id);
                  $('#submit').val('update');
              }
              });
            });
          }); */


  </script>

</html>
