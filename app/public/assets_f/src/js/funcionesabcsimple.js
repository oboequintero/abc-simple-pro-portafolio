
                
        //Functión que permite confirmar cualquier operación
        function confirmar(e, _title, _text, _obj_params, _callback){  

                  Swal.fire({
                    title: _title,
                    text: _text,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText:   'Cancelar'
                  }).then((result) => {
                    if (result.value) {                        
                        _callback(_obj_params);                         
                    }
                    else{ 
                        e.preventDefault();

                        Swal.fire(
                            'Cancelado',
                            'La operación se ha cancelado..',
                            'error'
                        )                      
                    }
                  })
                  
                  
        }

        function reordenafila(_data, _obj){
           
            if(_data["_ok"] === 0)
                mostrar(_obj.div, _data["_msg"], true, "alert alert-warning", true, 2000, true);     
            else    
                mostrar(_obj.div, _data["_msg"], true, "alert alert-danger", true, 0, false);     

            //swal ( "" ,  _data["_msg"] ,  "success" )
        }

        //Función que permite ubicar la columna y la fila donde se hizo click.
        function buscarfila(obj, obj2){
            var d; 
            var col;      
            var row;
                            
            $d = $(obj).parent("td");     
            col = $d.parent().children().index($d);
            row = $d.parent().parent().children().index($d.parent());
            
            //return row;
            obj2.col = col;
            obj2.fil = row;
                
        }

        //Función que permite limpiar una tabla html.
        //name: Recibe el nombre de la tabla
        //row: Indica que fila comenzar eliminar. Si es igual a -1 se limpia toda la tabla.
        function limpiar_tabla(name,  row){            
            if(!(row === -1)){                
                document.getElementById(name).deleteRow(row);
            }
            else{
                for(var i = document.getElementById(name).rows.length; i > 1;i--)                                        
                {                
                    document.getElementById(name).deleteRow(i -1);
                }
            }
                        
        } //Fin function limpiar_tabla 

        
        /**
         * Autor: Arístides Cortesía
         * Descripción: Función que permite eliminar una fila (row) de una tabla html.
         * Parámetros:
         *  datos: Recive los datos que indican si la fila puede ser o no eliminada y el
         *         mensaje que se debe mostrar en caso que no deba eliminarse.
         *  objs:  Recive el objeto que generó el evento y referencia la fila a eliminar.
         * 
         */
        function destroy_paq(datos, objs)
        {  
          
          if(datos['_ok'] === 0){          
           //Remover la fila afectada
           $(objs.this).closest('tr').remove();
          }
          else{
            mostrar(objs.div, datos["_msg"], true, "alert alert-danger", true, 0, false);     
          }
         
        }//Fin function destroy_paq(datos, objs)
                       
        
        
        //****** Bloque de ejecución de la función ajax ********* 
        // Función que permite ejecutar peticiones ajax.
        // Autor: Arístides Cortesía
        // Fecha: Lunes 19/11/2018
        // Parámetros:
        // _data   : Recibe un objeto javascript con los datos a enviar.
        // _url    : Recibe la url a llamar.
        // _type   : Recibe el tipo de petición a realizar.
        // _obj    : Recibe los parámetros de configuración de la petición ajax así
        //         : como todos aquellos objetos que se modificarân una vez que el ajax filnalice.
        // callback: Recibe la funcón que se ejecutará una vez que el ajax recibe respuesta del servidor.
        function EjecutarAjaxNew(_data, _url, _type, objs, callback){             
            var datosjson;
            var err_msg;
            
           //alert("1 _data: " + _data + " 2 _url: " + _url + " 3 _type: " + _type + " 4 objs: " + objs + " 5 callback: " + callback);
           
            if (_data != 0 || _data != "") {                
                datosjson = JSON.stringify(_data);                
            } else {
                datosjson = "";                
            }
                        
            $.ajax({                   
                    url: _url,
                    data: datosjson,                    
                    type: _type,
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",                    
                   /* beforeSend: function (){
                        //$('section').append('Entra 1 ');
                        mostrar('div_msg', "Enviando data", true, "alert alert-info", true);
                    }*/
                }).done(function(datos){                        
                  
                   callback(datos, objs);   
                    
                }).fail( function( jqXHR, textStatus, errorThrown ) {
                   
                    if (jqXHR.status === 0) {                                                
                        err_msg = 'Not connect: Verify Network.';

                    } else if (jqXHR.status == 404) {                                                    
                            err_msg = 'Requested page not found [404]';
                            
                    } else if (jqXHR.status == 500) {                                        
                            err_msg = 'Internal Server Error [500].';

                    } else if (textStatus === 'parsererror') {                                        
                            err_msg = 'Requested JSON parse failed.';

                    } else if (textStatus === 'timeout') {                                        
                            err_msg = 'Time out error.';

                    } else if (textStatus === 'abort') {                                        
                           err_msg = 'abort.';
                            
                    } else {                                               
                           err_msg = 'Uncaught Error: ' + jqXHR.responseText;                           
                    }
                    
                    error: (error) => {
                        console.log(JSON.stringify(error));
                    }

                    mostrar(objs.div, err_msg + ". Tipo: " + errorThrown, true, "alert alert-danger", true, 0, false);                   
                                        
                });
            
        }//Fin EjecutarAjaxNew

        
        //****** Fin Bloque de ejecución de la función ajax *****

       
        // Función que permite mostrar u ocultar los mensajes de alerta.
        // Autor: Arístides Cortesía
        // Fecha: Lunes 19/11/2018
        // Parámetros:
        // _obj_div    : Recibe el objeto div sobre el cual se actuará.
        // _msg        : Recibe el mensaje que se mostrará.
        // _mostrarmsg : Indica si _obj_div será visible o no.
        // _class      : Recibe la clase que se le asociará al objeto _obj_div.
        //_visible     : Recibe un valor booleano para indicar si es visible o no.
        //_tiempo_visible : Tiempo en milisegundos, mayor a cero(0), que estará visible. 
        //                  Si es menor o igual a cero(0) se mantendrá siempre visible

        function mostrar(_obj_div, _msg, _mostrarmsg, _class, _visible, _tiempo_visible, _float){   
            var class_aux;
                           
               obj_div = '#' + _obj_div;
                                                                 
               if(_visible){
                   class_aux = $(obj_div).prop('class');
                
                   if (class_aux != ""){                        
                        $(obj_div).removeClass(class_aux);                    
                   }
                   
                   if(_mostrarmsg){
                     $(obj_div).text(_msg);
                   }

                   $(obj_div).addClass(_class); 
                   
                   if(_float){
                      $(obj_div).addClass("div_float");
                   }
                   else{
                     //Subir al inicio de la pagina
                      $('html, body').animate({scrollTop: '0px'}, 800);

                        //Ir al final de la pagina
                        //$('html, body').animate({scrollTop: $elem.height()}, 800);
                   }

                   $(obj_div).show();    

                   if(_tiempo_visible > 0){
                                         
                      
                      setTimeout(function() {                  
                        $(obj_div).fadeOut(1500);
                      }, _tiempo_visible);
                   }
               }
               else
                $(obj_div).hide();   
                                  
        }// Fin mostrar



        //////////////////////////////////////////////
        //Bloque genérico de ejecución cuando se carge el DOM
        $(function(){
						
			$(".mayuscula").on({keyup:                
				function(event){                               							
					
					$(this).val($(this).val().toUpperCase());
					
				}
			});

        });
        ////////////////////////////////////////////////

       
        

       
        