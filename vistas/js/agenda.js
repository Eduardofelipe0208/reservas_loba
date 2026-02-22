

/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
  datesDisabled: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

	var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd'
	});

})


/*=============================================
SELECT ANIDADO
=============================================*/

$(".SelectTipoEmbarcacion").change(function(){

  var ruta = $(this).val(); 
} )

var datos = new FormData();
datos.append("ruta", ruta);

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
      console.log("respuesta", respuesta);

      //$("input[name='ruta']").val(respuesta[0]["ruta"]);
      
      for(var i = 0; i < respuesta.length; i++){

        $(".selectTipoEmbarcacion").append('<option value="'+respuesta[i]["id_r"]+'"></option>')

      }

    }

  })


/*=============================================
CALENDARIO
=============================================*/

if($(".infoReservas").html() != undefined){

  var idReservas = $(".infoReservas").attr("idReservas");
  var fechaProceso = $(".infoReservas").attr("FechaProceso");

  var totalEventos = [];
  var opcion1 = [];
  var validarDisponibilidad = false;


  var datos = new FormData();
  datos.append("idReservas", idReservas);

 

 $.ajax({

    url:urlPrincipal+"ajax/proceso.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      if(respuesta.length == 0){

            $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: [
              {
                start: fechaProceso,
                rendering: 'background',
                color: '#FFCC29'
              }
            ]

          });

            

            colDerReservas();


      }else{

        for(var i = 0; i < respuesta.length; i++){

          /* Validar cruce de fechas opcion 1 */
          

          if (fechaProceso == respuesta[i]["fecha_proceso"]){

          opcion1[i] = false;


          }else{

          opcion1[i] = true;


          }

          //console.log("opcion1[i]", opcion1[i]);


          /* Validar disponibilidad */



          if (opcion1[i] == false) {

            validarDisponibilidad = false;
          
          }else{

            validarDisponibilidad = true;

          }

          //console.log("validarDisponibilidad", validarDisponibilidad);

            if(!validarDisponibilidad){

                totalEventos.push(
                  {
                    "start": respuesta[i]["fecha_proceso"],
                    "rendering": 'background',
                    "color": '#d30000ea'
                  }
                )

                 $(".infoDisponibilidad").html('<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>');

                 break;

                 



            }else{

              totalEventos.push(
                {
                  "start": respuesta[i]["fecha_proceso"],
                  "rendering": 'background',
                  "color": '#d30000ea'
                }

              )
              $(".infoDisponibilidad").html('<h1 class="pb-5 float-left">¡Está Disponible!</h1>'); 

              colDerReservas();
              


               }
              
            }        

          // FIN CICLO FOR

          if(validarDisponibilidad){

            totalEventos.push(
               {
                  "start": fechaProceso,
                  "rendering": 'background',
                  "color": '#FFCC29'
                }
            )

          }

          $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events:totalEventos

          });

        }
      
    }


 })

 }

/* CODIGO ALEATORIO */

var chars ="0123456789QWERTYUIOPASDFGHJKLZXCVBNM";

function codigoAleatorio(chars,length){

  codigo = "";

  for (var i = 0; i < length; i++){

      rand = Math.floor(Math.random()*chars.length);
      codigo += chars.substr(rand, 1);
      
    }

    return codigo; 
    
  }


/* FUNCIÓN COL.DERECHA RESERVAS */


function colDerReservas(){

   $(".colDerReservas").show(); 

   var codigoReservas = codigoAleatorio(chars, 7);
   
   
   var datos = new FormData();
   datos.append("codigoReservas", codigoReservas);

   $.ajax({

    url:urlPrincipal+"ajax/proceso.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){


      if(!respuesta){

         $(".codigoReservas").html(codigoReservas);

       }else{

          $(".codigoReservas").html(codigoReservas+codigoAleatorio(chars, 3));

       }
    }
       

      
 });

}