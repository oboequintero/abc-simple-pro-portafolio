<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{asset('/assets_f/src/js/funciones.js')}}"></script>     
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="{{asset('/assets_f/src/js/swiper.min.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>


    //imagen completa para los fondos principales
      $(document).ready(function() {
        $("#banner").css({"height":$(window).height() + "px"});

      $(document).ready(function() {
        $("#fondohome").css({"height":$(window).height() + "px"});
      });

      $(document).ready(function() {
        $("#fondoc1").css({"height":$(window).height() + "px"});
      });



    ////////////////////-----INDEX----/////////////////////////////////

  //aparecer y decaparecer barra con scroll
  var flag = false;
  var scroll;

    $(window).scroll(function(){
      scroll = $(window).scrollTop();

      if (scroll > 40){
        if(!flag){
          $("#nav-vista").css({"display":"none"});
          flag = true;
        }
      }else{
        if(flag){
          $("#nav-vista").css({"display":"block"});
          flag = false;
        }
      }
    })
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

  // muestra el reloj
    $(document).ready(function() {
      window.onload=show5;
    });


  //menu para el  nav bar en responsive
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    //funcion para mostrar y ocultar imagen del modal de inscribete
    $('.open_inscribete').click(function()
    {
        if(numeroAleatorio(1, 2) == 1){
          $('#inscribete .img_left.female').show();
          $('#inscribete .img_left.male').hide();
          $('#inscribete .modal-content').css('border-left', '15px solid #d21e62');
        }
        else{
          $('#inscribete .img_left.female').hide();
          $('#inscribete .img_left.male').show();
          $('#inscribete .modal-content').css('border-left', '15px solid #268c9b');
        }
        setTimeout(function(){
          $('#inscribete').modal('show');
        }, 300);
    });

    //funcion para cambiar la imagen del modal de inscribete
    function numeroAleatorio(min, max)
          {
            return Math.round(Math.random() * (max - min) + min);
          }

          function rotar(min, max)
            {
              return Math.round(Math.random() * (2 - 1) + 1);
            }
              if (rotar(1,2)==1) {
                document.getElementById("imagenmodal").src = "/assets_f/src/img/ventanamujer.jpg";
              }
              else {
                document.getElementById("imagenmodal").src = "/assets_f/src/img/ventanahombre.jpg";
              }

          function cerrarmenu()
            {
              document.getElementById("sidebarCollapse").click();
    }
  
    //funcion ajax para login
    $('#inscribete').modal({backdrop: 'static', keyboard: false, show: false})
    $('#loginlogout').modal({backdrop: 'static', keyboard: false, show: false})

    jQuery(document).ready(function()
    {
      jQuery('#submit').click(function(e)
      {
        var email = $('input[name=email2]').val();
        var password = $('input[name=password2]').val();
          e.preventDefault();
          $.ajaxSetup({ });
          jQuery.ajax(
          {
            url: "{{ url('/cliente/login') }}",
            method: 'post',
            data:{  email: jQuery('#email2').val(),
                    password: jQuery('#password2').val(),
                    _token: '{{csrf_token()}}'
                  },
                  success: function(result){
                    if(result.errors){
                      jQuery.each(result.errors, function(key, value){});
                    } else{
                        //alert('logeado con exito');
                        //swal("Good job!", "You clicked the button!", "success");       
                        location.href ="/cliente/home";    
                      }        
                  },
                  error: function(data){
                    var errors = data.responseJSON;
                    var errorsHtml = '';
                      $.each(errors.errors, function( key, value ){
                        errorsHtml += '<li>'+value[0]+'</li>';
                      });
                      $('#divAlert').html(errorsHtml);
                      //$('#divAlert').show();
                      // swal("Error!",(errorsHtml), "warning");
                      // swal({   title: "Error!",    text: "",    type: "error",   confirmButtonText: "true", timer: 9000 });
                      //Swal.fire({
                      //  title: '<strong><u>Error</u></strong>',
                      //  type: 'warning',
                      //  html: errorsHtml,
                      //  showCloseButton: true,
                      //})
                      $("#divAlert").fadeIn();
                        setTimeout(function () {
                            $("#divAlert").hide("slow");
                        }, 3000);
                        //setTimeout(function () {
                          //location.reload(true);
                        //}, 4000);
                  }
          });
      });
    });

    //  boton back to top 
    $(window).scroll(function() {
      if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
      } else {
          $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
      });
      $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
          scrollTop : 0                       // Scroll to top of body
        }, 800);
    });
        
    /*codigo para mediquery de los comentarios */
    $(document).ready(function() {

        var swiper = new Swiper('.swiper-container',{
          pagination: '.swiper-pagination',
          nextButton: '.swiper-button-next',
          prevButton: '.swiper-button-prev',
          slidesPerView: '3',
          paginationClickable: true,
          autoplay: true,
          loop:true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          breakpoints: {
            1040: {
            slidesPerView: 3,
            spaceBetween: 30
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 30
            },
            640: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            320: {
            slidesPerView: 1,
            spaceBetween: 10
            }
          }
        });
    });

      /* var swiper = new Swiper('.swiper-container', {
          slidesPerView: 2,
          spaceBetween: 30,
          slidesPerGroup: 2,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });*/

 

  /*codigo para mediquery de los links de tienda quienes somos galeria que es diferente cursos videos */
    $('#p-inactivo img').on('click', function(){
    $('img.p-activo').removeClass('p-activo');
    $(this).addClass('p-activo');
    });

    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })

      AOS.init();
    
    $(document).ready(function() {  
      var color_p = 1;
       $('#mostrart-promociones').click(function(){
        if (color_p == 1) {
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#tienda-promociones').css('display', 'none')
          color_p = 0;
        }
        else if (color_p == 0) {
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono-promo2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'none');
          $('#tienda-promociones').css('display', 'block');
          $('#tienda-cursos').css('display', 'none');
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          color_p = 1;
          color_c = 0;
          color_a = 0;
        }
       });  
       var color_c = 0;
       $('#mostrart-cursos').click(function(){
        if (color_c == 1) {
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          $('#tienda-cursos').css('display', 'none');
          color_c = 0;
        }
        else if (color_c == 0) {
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso-2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'none');
          $('#tienda-promociones').css('display', 'none');
          $('#tienda-cursos').css('display', 'block');
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          color_c = 1;
          color_a = 0;
          color_p = 0;
        }
       });
       var color_a = 0;
       $('#mostrart-paquetes').click(function(){
        if (color_a == 1) {
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono3.png" class="img-fluid">');
          $('#tienda-paquetes').css('display', 'none');
  
          color_a = 0;
        }
        else if (color_a == 0) {
          $('#cambio3').replaceWith('<img id="cambio3" src="/assets_f/src/img/icono-paquete-2.png" class="img-fluid p-activo">');
          $('#tienda-paquetes').css('display', 'block');
          $('#tienda-promociones').css('display', 'none');
          $('#tienda-cursos').css('display', 'none');
          $('#cambio').replaceWith('<img id="cambio" src="/assets_f/src/img/icono1.png" class="img-fluid">');
          $('#cambio2').replaceWith('<img id="cambio2" src="/assets_f/src/img/icono-curso..png" class="img-fluid">');
          color_a = 1;
          color_p = 0;
          color_c = 0;
        }
       });
    });
/* fin de codigo para mediquery de los links de tienda quienes somos galeria que es diferente cursos videos */





////////////////////-----LECCIONES----/////////////////////////////////

//footer 3

    //codigo para leer la maquina de escribir y los videos desde el back office//
    var i=0;
        var f=0;
        var video = document.getElementById("miVideo");

            function playPause(contenedor,texto,intervalo,data) {
                if (video.paused) {
                    video.play();
                    var valor=$("#timer").val();
                    var fila=$("#fila").val();
                    $("#i-boton").attr("class","glyphicon glyphicon-pause");
				      maquina(contenedor,texto,intervalo,data,valor,fila);
                }
                else {
                    $("#i-boton").attr("class","glyphicon glyphicon-play");
                    video.pause();
                    clearInterval(timer);
                }
            }

            function reload() {
                $("#i-boton").attr("class","glyphicon glyphicon-play");
                video.load();
                i=0;f=0;
                clearInterval(timer);
            }

            function makeLarge() {
                video.width = 1000;
            }

            function makeSmall() {
                video.width = 250;
            }

            function makeNormal() {
                video.width = 500;
            }

            function maquina(contenedor,texto,intervalo,data,valor,fila) {
                // Obtenemos referencia del div donde se va a alojar el texto.

                cnt = document.getElementById(contenedor);
                // Creamos el timer
                timer = setInterval(function(){
                    if(i==0){ $("#maquinas").fadeIn("2000");}
                    cnt.innerHTML =  data[f].parrafo;
                           // Si hemos llegado al final del texto..
                    if(i >= data[f].tiempo ){
                        if(data != null){ $("#maquinas").fadeOut("2000");}
                        i=0;
                        f++;
                   // En caso contrario.. seguimos
                    }
                    else {
                        $("#span").html(i);
                        $("#timer").val(i);
                        $("#data").val(f);
                        i++;
                    }

                },intervalo);
            };

        $(document).ready(function () {
            $("#miVideo").on('ended', function(){
		        $("#i-boton").attr("class","glyphicon glyphicon-play");
                i=0;f=0;
                clearInterval(timer);
            });
            var miVideo = document.getElementById("miVideo")
                videoFullscreen = document.getElementById("fullscreen");

            if (miVideo && videoFullscreen) {
                 videoFullscreen.addEventListener("click", function (evt) {
                    if (miVideo.requestFullscreen) {
                        miVideo.requestFullscreen();
                    }
                    else if (miVideo.msRequestFullscreen) {
                        miVideo.msRequestFullscreen();
                    }
                    else if (miVideo.mozRequestFullScreen) {
                        miVideo.mozRequestFullScreen();
                    }
                    else if (miVideo.webkitRequestFullScreen) {
                        miVideo.webkitRequestFullScreen();
                    }
            }, false);
          }
        });


    jQuery(document).ready(function()
    {
      jQuery('#submit2').click(function(e)
      {
        var name = $('input[name=name]').val();
        var last_name = $('input[name=last_name]').val();
        var email = $('input[name=email]').val();
        var phone = $('input[name=phone]').val();
        var password = $('input[name=password]').val();
        
          e.preventDefault();
          $.ajaxSetup({ });
          jQuery.ajax(
          {
            url: "{{ url('/cliente/register') }}",
            method: 'post',
            data:{  name: jQuery('#name').val(),
                    last_name: jQuery('#last_name').val(),
                    email: jQuery('#email').val(),
                    phone: jQuery('#phone').val(),
                    password: jQuery('#password').val(),
                    _token: '{{csrf_token()}}'
                  },
                  success: function(result){
                    if(result.errors){
                      jQuery.each(result.errors, function(key, value){});
                    } else{
                     
                        $('#divAlert3').show();
                        location.href ="/cliente/home";    
                      }        
                  },
                  error: function(data){
                    var errors = data.responseJSON;
                    var errorsHtml = '';
                      $.each(errors.errors, function( key, value ){
                        errorsHtml += '<li>'+value[0]+'</li>';
                      });
                      $('#divAlert2').html(errorsHtml);
                      //$('#divAlert2').show();
                      //$('#divAlert2').fadeTo("slow", 0.7);
                      //$('#divAlert2').fadeTo("3000");
                      $("#divAlert2").fadeIn();
                        setTimeout(function () {
                            $("#divAlert2").hide("slow");
                        }, 5000);
                        //setTimeout(function () {
                          //  location.reload(true);
                        //}, 6000);
                  }
          });
      });
    });




  </script>