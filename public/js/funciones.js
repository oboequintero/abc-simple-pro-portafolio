////////////// ver contrasena ///////////////////////////
$(document).ready(function () {
    $("#show").mousedown(function () {
        $("#pass").removeAttr('type');
        $('#show').addClass('fa-eye').removeClass('fa-eye-slash');
    });

    $("#show").mouseup(function () {
        $("#pass").attr('type','password');
        $('#show').addClass('fa-eye-slash').removeClass('fa-eye');
    });
});
/////////////////////////////////////////

////////////// testimonios ///////////////////////////
$('.testimonios_slick').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 3,
          responsive: [
      {
          breakpoint: 1024,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: true
          }
      },

      {
          breakpoint: 600,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }]
  });

 /////////////////////////////////////////

 ////////////// imagen de inscribete ///////////////////////////



  ///////////////////////////////////////////////////

  

/*function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}*/



function Mostrar() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        if($("#iconos").attr("value")=="1"){
            $("#div1").hide();
            $("#div2").show();
            $("#iconos").attr("value","0");
            $("#iconos").attr("class","btn btn-danger");
            $("#iconos").attr("title","Cambiar a Lista");
        }
        else{
            $("#div1").show();
            $("#div2").hide();
            $("#iconos").attr("value","1");
            $("#iconos").attr("class","btn btn-info");
            $("#iconos").attr("title","Cambiar a Iconos");
        }
}


function Eliminar(id,i) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var parametros = {
            "identidad" : id,
            'token': "token"
            };
        var opcion = confirm("Está seguro de Eliminar?");
        if (opcion == true) {
            $.ajax({
                data:  parametros,
                url:   'elimi_pl',
                type:  'post',
                async:  false,
                dataType: "json",
            error: function() {
                alert('Ha surgido un error');
            },
            success:  function (data) {
                $("#span").html(data.datos);
                document.getElementsByTagName("table")[0].setAttribute("id","tabla");
                document.getElementById("tabla").deleteRow(i);
                alert('Elemento eliminado correctamente');
            }
            });
        } 
    }	


    function Eliminar(id,i) {
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
            });
            var parametros = {
                "identidad" : id,
                'token': "token"
                };
            var opcion = confirm("Está seguro de Eliminar?");
               if (opcion == true) {
                $.ajax({
                    data:  parametros,
                    url:   'elimi_co',
                    type:  'post',
                    async:  false,
                    dataType: "json",
                error: function() {
                       alert('Ha surgido un error');
                },
                success:  function (data) {
                    $("#span").html(data.datos);
                    document.getElementsByTagName("table")[0].setAttribute("id","tabla");
                    document.getElementById("tabla").deleteRow(i);
                    alert('Elemento eliminado correctamente');
                }
                });
               }
        }




  
      