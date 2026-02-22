/*=============================================
LIMPIAR FORMULARIOS DE REGISTRO E INGRESO
=============================================*/

$('.modal.formulario').on('hidden.bs.modal', function(){

	 $(this).find('form')[0].reset();

})

/*=============================================
FORMATEAR LOS IPUNT 
=============================================*/

$('input[name="registroEmail"]').change(function(){

	$(".alert").remove();

})



/*=============================================
VALIDAR cedula REPETIDA
=============================================*/

$('input[name="registroCedula"]').change(function(){

	var cedula = $(this).val()
	console.log("cedula", cedula);

	var datos = new FormData();
	datos.append("validarCedula", cedula);

	$.ajax({

		url:urlPrincipal+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			
			if(respuesta){

				$("input[name='registroCedula']").val("");

				$("input[name='registroCedula']").after(`

				<div class="alert alert-danger">
					<strong>ERROR:</strong>
					¡La cedula ya existe en la base de datos, por favor ingrese otra distinta!
				</div>

				`);

				return;

			}
			}
		
		 })

	})

/*=============================================
VALIDAR Email REPETIDO
=============================================*/

$('input[name="registroEmail"]').change(function(){

	var email = $(this).val()
	console.log("email", email);

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url:urlPrincipal+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			
			if(respuesta){

				$("input[name='registroEmail']").val("");

				$("input[name='registroEmail']").after(`

				<div class="alert alert-danger">
					<strong>ERROR:</strong>
					¡El correo ya existe en la base de datos, por favor ingrese otro distinto!
				</div>

				`);

				return;

			}
			}
		
		 })

	})











