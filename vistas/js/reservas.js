

/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
  startDate: '0d',
  datesDisabled: '0d',
  format: 'yyyy-mm-dd',
  todayHighlight: true
});

$('.datepicker.entrada').change(function () {

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

$(".SelectTipoEmbarcacion").change(function () {

  var ruta = $(this).val();
})




/*=============================================
CALENDARIO
=============================================*/

if ($(".infoReservas").html() != undefined) {

  var idReservas = $(".infoReservas").attr("idReservas");
  var fechaProceso = $(".infoReservas").attr("FechaProceso");

  var totalEventos = [];
  var opcion1 = [];
  var opcion2 = [];
  var opcion3 = [];
  var validarDisponibilidad = false;


  var datos = new FormData();
  datos.append("idReservas", idReservas);



  $.ajax({

    url: urlPrincipal + "ajax/proceso.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      if (respuesta.length == 0) {

        $('#calendar').fullCalendar({
          defaultDate: fechaProceso,
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


      } else {

        for (var i = 0; i < respuesta.length; i++) {

          /* Validar cruce de fechas opcion 1 */


          if (fechaProceso == respuesta[i]["fecha_proceso"]) {

            opcion1[i] = false; // fecha exactamente igual → NO disponible

          } else {

            opcion1[i] = true; // fecha diferente

          }

          /* VALIDAR CRUCE DE FECHAS OPCIÓN 2 - fecha solicitada está DENTRO del rango reservado */

          if (fechaProceso > respuesta[i]["fecha_inicio"] && fechaProceso < respuesta[i]["fecha_fin"]) {

            opcion2[i] = false;

          } else {

            opcion2[i] = true;

          }

          /* VALIDAR CRUCE DE FECHAS OPCIÓN 3 - fecha solicitada es el día de inicio reservado */

          if (fechaProceso == respuesta[i]["fecha_inicio"]) {

            opcion3[i] = false;

          } else {

            opcion3[i] = true;

          }

          /* VALIDAR DISPONIBILIDAD */

          if (opcion1[i] == false || opcion2[i] == false || opcion3[i] == false) {

            validarDisponibilidad = false;

          } else {

            validarDisponibilidad = true;

          }

          //console.log("opcion1[i]", opcion1[i]);



          console.log("validarDisponibilidad", validarDisponibilidad);

          if (!validarDisponibilidad) {

            totalEventos.push(
              {
                "start": respuesta[i]["fecha_proceso"],
                "rendering": 'background',
                "color": '#d30000ea'
              }
            )


            $(".infoDisponibilidad").html('<h5 class="pb-5 float-left">¡Ya esta fecha esta ocupada, pero aun puedes reservar!</h5>');

            colDerReservas();

            break;

          } else {

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

        if (validarDisponibilidad) {

          totalEventos.push(
            {
              "start": fechaProceso,
              "rendering": 'background',
              "color": '#FFCC29'
            }
          )

        }

        $('#calendar').fullCalendar({
          defaultDate: fechaProceso,
          header: {
            left: 'prev',
            center: 'title',
            right: 'next'
          },
          events: totalEventos

        });

      }

    }


  })

}

/* CODIGO ALEATORIO */

var chars = "0123456789QWERTYUIOPASDFGHJKLZXCVBNM";

function codigoAleatorio(chars, length) {

  codigo = "";

  for (var i = 0; i < length; i++) {

    rand = Math.floor(Math.random() * chars.length);
    codigo += chars.substr(rand, 1);

  }

  return codigo;

}


/* FUNCIÓN COL.DERECHA RESERVAS */


function colDerReservas() {

  $(".colDerReservas").show();

  var codigoReservas = codigoAleatorio(chars, 7);


  var datos = new FormData();
  datos.append("codigoReservas", codigoReservas);

  $.ajax({

    url: urlPrincipal + "ajax/proceso.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {


      if (!respuesta) {

        $(".codigoReservas").html(codigoReservas);
        $(".confirmarReserva").attr("codigoReservas", codigoReservas);

      } else {

        $(".codigoReservas").html(codigoReservas + codigoAleatorio(chars, 3));
        $(".confirmarReserva").attr("codigoReservas", codigoReservas + codigoAleatorio(chars, 3));

      }
    }



  });

}

/*=============================================
FUNCION PARA GENERAR COOKIES
=============================================*/

function crearCookie(nombre, valor, diasExpedicion) {

  var hoy = new Date();

  hoy.setTime(hoy.getTime() + (diasExpedicion * 24 * 60 * 60 * 1000));

  var fechaExpedicion = "expires=" + hoy.toUTCString();

  document.cookie = nombre + "=" + valor + "; " + fechaExpedicion + "; path=/";

}




/*=============================================
capturar datos de la reserva
=============================================*/


$(".confirmarReserva").click(function () {

  var idReservas = $(this).attr("idReservas");
  var idUsuario = $(this).attr("idUsuario");
  var codigoReservas = $(this).attr("codigoReservas");
  var descripcionProceso = $(this).attr("descripcionProceso");
  var fechaProceso = $(this).attr("fechaProceso");
  var infoReservas = $(this).attr("infoReservas");

  crearCookie("idReservas", idReservas, 1);
  crearCookie("idUsuario", idUsuario, 1);
  crearCookie("codigoReservas", codigoReservas, 1);
  crearCookie("descripcionProceso", descripcionProceso, 1);
  crearCookie("fechaProceso", fechaProceso, 1);
  crearCookie("infoReservas", infoReservas, 1);



})
