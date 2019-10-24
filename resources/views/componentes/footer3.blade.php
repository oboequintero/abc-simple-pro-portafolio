
      <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      <div class="fixed-bottom" style="background-color:darkgrey; color:#000000; text-align:center;">Diseñado y Desarrollado por <a href="https://amcdevelopers.com/">AMC developers</a> - Todos los derechos reservados - 2018</div>

      <!--lecciones modal de info---------------------------------------------------->
        <div class="modal fade" id="prueba" >
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
                        <h5 class="modal-title text-center" id="prueba">body</h5>

                        <div class="modal-footer">
                        footer
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--lecciones modal de info2---------------------------------------------------->
        <div class="modal fade" id="prueba2" >
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
                        <h5 class="modal-title text-center" id="prueba2">body</h5>

                        <div class="modal-footer">
                        footer
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <script>

  
////////////////// DECLARACION DE VARIABALES PARA MAQUINA //////////////////////
    var i=0;
    var f=0;
    var titulo=0;
    var seccion=0;
    var scHTML = '';
    var palabra = '';
    var divHTML ='<div class="c-seccion text-center"><div/>';
    $('#s1').append(divHTML);
//////////////////////// FIN DECLARACION ////////////////////////////////////////
 

    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

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

                    if(data[f].id_tipo_con ==5){
                        var letra = data[f].tamano;
                        $('#titulo').prop('style','font-size:'+letra+'px');
                        $('#titulo').css('color',data[f].color);
                        if (data[f].negrita==1) {
                            $('#titulo').prop('style','font: bold ;font-weight:900; margin-top: 150px;margin-left:25px;color:'+data[f].color+'; font-size:'+letra+'px;');
                        }
                        $("#t1").css('display','block');
                        $("#titulo").text(data[f].parrafo);
                        titulo=1;
                        f++;
                    }
                    if(data[f].id_tipo_con ==2 ){
                        var letra = data[f].tamano;
                        $("#scroll1").css('display','block');
                        $('#scroll1').prop('style','font-size:'+letra+'px');
                        if(titulo==0){
                          cnt.innerHTML =  data[f].parrafo;
                        }else{
                          titulo=0;
                          cnt.innerHTML =  data[f].parrafo;
                        }
                    }
                    if(data[f].id_tipo_con ==6 && seccion==0 ){
                        var letra = data[f].tamano;
                        $("#scroll1").css('display','block');
                        $('#scroll1').prop('style','font-size:'+letra+'px');
                        $("#s1").css('display','block');
                        scHTML += '<div "class="text-center" style="margin-top: 10px;" ><p id="'+ data[f].id_contenido+'" ></p><div/>';
                        $('.c-seccion').append(scHTML);
                        $('#'+data[f].id_contenido).prop('style','font-size:'+letra+'px');
                        if(titulo==0){
                            $('#'+data[f].id_contenido).css('color',data[f].color);
                            if (data[f].negrita==1) {
                                $('#'+data[f].id_contenido).prop('style','font:italic bold  georgia, serif; color:'+data[f].color+'; font-size:'+letra+'px;');
                            }
                            $('#'+data[f].id_contenido).append(data[f].parrafo);
                        }else{
                            titulo=0;
                            if (data[f].negrita==1) {
                                $('#'+data[f].id_contenido).prop('style','font:italic bold georgia, serif; color:'+data[f].color+'; font-size:'+letra+'px;');
                            }
                            $('#'+data[f].id_contenido).css('color',data[f].color);
                            $('#'+data[f].id_contenido).append(data[f].parrafo);
                        }
                        if(data[f].fin_s ==0){
                            f++;
                        }else{
                            seccion=1;
                        }
                    }
                    if(data[f].id_tipo_con ==3 && seccion==0 ){

                        $("#s1").css('display','block');
                        scHTML += '<div "class="row text-center"> <img class="img-fluid" style="width:200px;height:200px;"  id="'+ data[f].id_contenido+'"  ><div/>';

                        $('.c-seccion').append(scHTML);
                        $('#'+data[f].id_contenido).attr("src","/storage/contenido/"+data[f].ruta);

                        if(data[f].fin_s ==0){
                            f++;
                        }else{
                            seccion=1;
                        }
                    }
                    if(data[f].id_tipo_con ==4 && seccion==0 ){
                        var letra = data[f].tamano;
                        $("#scroll1").css('display','block');
                        $('#scroll1').prop('style','font-size:'+letra+'px');
                        $("#s1").css('display','block');
                        scHTML += '<div "class="text-center" style="margin-top: 10px;" ><div class="row"><div class="col-xl-4 col-lg-4" ><p id="'+ data[f].id_contenido+'" ></p><div/><div/><div/>';
                        $('.c-seccion').append(scHTML);
                        $('#'+data[f].id_contenido).prop('style','font-size:'+letra+'px');
                        if(titulo==0){
                            $('#'+data[f].id_contenido).css('color',data[f].color);
                            if (data[f].negrita==1) {
                                $('#'+data[f].id_contenido).prop('style','font:italic bold  georgia, serif; color:'+data[f].color+'; font-size:'+letra+'px;');
                            }
                            $('#'+data[f].id_contenido).append(data[f].parrafo);
                        }else{
                            titulo=0;
                            if (data[f].negrita==1) {
                                $('#'+data[f].id_contenido).prop('style','font:italic bold georgia, serif; color:'+data[f].color+'; font-size:'+letra+'px;');
                            }
                            $('#'+data[f].id_contenido).css('color',data[f].color);
                            $('#'+data[f].id_contenido).append(data[f].parrafo);
                        }
                        if(data[f].fin_s ==0){
                            f++;
                        }else{
                            seccion=1;
                        }
                    }
                    // Si hemos llegado al final del texto..
                    if(i >= data[f].tiempo ){
                        $("#t1").fadeOut("500");
                        $("#s1").fadeOut("500");
                        $("#scroll1").fadeOut("500");
                        if(data != null){ $("#maquinas").fadeOut("2000");}
                        $("#scroll1").css('display','none');
                        $("#s1").css('display','none');
                        $("#t1").css('display','none');
                        $('.c-seccion').remove();
                        divHTML+='<div class="c-seccion text-center"><div/>';
                        $('#s1').append(divHTML);
                        seccion=0;
                        i=0;
                        f++;
                    // En caso contrario.. seguimos
                    }
                    else {
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


  </script>

</html>
