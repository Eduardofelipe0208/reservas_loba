<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


Class ControladorUsuarios{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	public function ctrRegistroUsuario(){

		if(isset($_POST["registroNombre"])){


				$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


				$encriptarEmail = md5($_POST["registroEmail"]);

				$tabla = "usuarios1";

				$datos = array( "nombre" => $_POST["registroNombre"],
								"apellido" => $_POST["registroApellido"],
								"tipo_documento" => $_POST["registroTipo"],
								"cedula" => $_POST["registroCedula"],
								"email"=> $_POST["registroEmail"],
								"password" => $encriptarPassword,								
								"nombre_embarcacion" => $_POST["registroEmbarcacion"],
								"capacidad_combustible" => $_POST["registroCombustible"],
								"matricula" => $_POST["registroMatricula"],
								"foto" => "",
								"email_encriptado" => $encriptarEmail);

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

				echo '<script>

						swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡Te has registado con exito!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    window.location = "'.ControladorRuta::ctrRuta().'";
								  } 
						});

					</script>';

			

		}
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios1";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

		/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios1";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	INGRESO DE USUARIOS
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingresoEmail"])){


    			$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


    			$tabla = "usuarios1";
    			$item = "email";
    			$valor = $_POST["ingresoEmail"];

    			$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

    			if(is_array($respuesta)){ 

    			if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword){

    					$_SESSION["validarSesion"] = "ok";
    					$_SESSION["id"] = $respuesta["id_u"];
    					$_SESSION["nombre"] = $respuesta["nombre"];
    					$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];

    					$ruta = ControladorRuta::ctrRuta();

						echo '<script>
					
							window.location = "'.$ruta.'perfil";				

						</script>';

					}

   				 }else{

				

					echo'<script>

					swal({
							type:"error",
						  	title: "¡ERROR!",
						  	text: "¡El email o contraseña no coinciden!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    window.location = "'.ControladorRuta::ctrRuta().'";
							  } 
					});

				</script>';
				

			   }


    				}
			}


			/*=============================================
	CAMBIAR PASSWORD
	=============================================*/

	public function ctrCambiarPassword(){

		if(isset($_POST["editarPassword"])){

				$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios1";
				$id = $_POST["idUsuarioPassword"];
				$item = "password";
				$valor = $encriptar;

				$actualizarPassword = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

				if($actualizarPassword == "ok"){

					echo '<script>

						swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡Sus datos han sido actualizados!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    window.location = "'.ControladorRuta::ctrRuta().'perfil";
								  } 
						});

					</script>';
	
				}

		 }

    }

    	/*=============================================
	RECUPERAR CONTRASEÑA
	=============================================*/

	public function ctrRecuperarPassword(){
	
		if(isset($_POST["emailRecuperarPassword"])){  

			/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/

				function generarPassword($longitud){

					$password = "";
					$patron = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($patron)-1;

					for($i = 0; $i < $longitud; $i++){

						$password .= $patron[mt_rand(0,$max)];

					}

					return $password;

				}

				$nuevaPassword = generarPassword(11);

				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios1";
				$item = "email";
				$valor = $_POST["emailRecuperarPassword"];

				$traerUsuario = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if($traerUsuario){

					$id = $traerUsuario["id_u"];
					$item = "password";
					$valor = $encriptar;

					$actualizarPassword = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

					if($actualizarPassword  == "ok"){


						/*=============================================
						 CORREO ELECTRÓNICO que envia la contraseña
						=============================================*/

						$ruta = ControladorRuta::ctrRuta();

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('emarcano.5928@unimar.edu.ve', 'Distribuidora Industrial Marina Congeladora Loba');

						$mail->Subject = "Por favor verifique su dirección de correo electrónico";

						$mail->addAddress($_POST["emailRecuperarPassword"]);

						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	

		<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
		
			<center>
			

			<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

			<hr style="border:1px solid #ccc; width:80%">

			<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: '.$nuevaPassword.'</h4>

			<a href='.$ruta.' target="_blank" style="text-decoration:none">

			<div style="line-height:30px; background:#0aa; width:60%; padding:20px; color:white">			
				Haz click aquí
			</div>

			</a>

			<h4 style="font-weight:100; color:#999; padding:0 20px">Ingrese nuevamente al sitio con esta contraseña y recuerde cambiarla en el panel de perfil de usuario</h4>

			<br>

			<hr style="border:1px solid #ccc; width:80%">

			<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

			</center>

		</div>

	</div>');

						$envio = $mail->Send();

						if(!$envio){

							echo'<script>

								swal({
										type:"error",
									  	title: "¡ERROR!",
									  	text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["emailRecuperarPassword"].$mail->ErrorInfo.', por favor inténtelo nuevamente",
									  	showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
								}).then(function(result){

										if(result.value){   
										    window.location = "'.ControladorRuta::ctrRuta().'";
										  } 
								});

							</script>';

						}else{


							echo'<script>

								swal({
									type:"success",
								  	title: "¡SU SOLICITUD HA SIDO RECIBIDA!",
								  	text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["emailRecuperarPassword"].' para su cambio de contraseña!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
								}).then(function(result){

										if(result.value){   
										    window.location = "'.ControladorRuta::ctrRuta().'";
										  } 
								});

							</script>';

						}	


					}


				}else{

					echo '<script>

						swal({
							type:"error",
						  	title: "¡ERROR!",
						  	text: "¡El correo no existe en el sistema, puede registrase nuevamente con ese correo!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    window.location = "'.ControladorRuta::ctrRuta().'";
								  } 
						});

					</script>';

	
				} 

 			}

  		}

  			/*=============================================
	FORMULARIO CONTACTENOS
	=============================================*/

	public function ctrFormularioContactenos(){

		if(isset($_POST["mensajeContactenos"])){
				
				/*=============================================
				 CORREO ELECTRÓNICO
				=============================================*/

				$ruta = ControladorRuta::ctrRuta();

				$mail = new PHPMailer;

				$mail->CharSet = 'UTF-8';

				$mail->isMail();

				$mail->setFrom('emarcano.5928@unimar.edu.ve', 'Distribuidora Industrial Marina Congeladora Loba');

				$mail->addReplyTo('emarcano.5928@unimar.edu.ve', 'Distribuidora Industrial Marina Congeladora Loba');

				$mail->Subject = "Nuevo Mensaje";

				$mail->addAddress("emarcano.5928@unimar.edu.ve");

				$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	


						<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

							<center>

								<h3 style="font-weight:100; color:#999;">HAS RECIBIDO UN MENSAJE</h3>

								<hr style="width:80%; border:1px solid #ccc">

								<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].' '.$_POST["apellidoContactenos"].'</h4>
								<h4 style="font-weight:100; color:#999; padding:0px 20px;">Móvil: '.$_POST["movilContactenos"].'</h4>
								<h4 style="font-weight:100; color:#999; padding:0px 20px;">Email: '.$_POST["emailContactenos"].'</h4>
								<h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>

								<hr style="width:80%; border:1px solid #ccc">

							</center>

						</div>
						
					</div>
				');

				$envio = $mail->Send();

				if(!$envio){

					echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "¡Ha ocurrido un problema enviando el mensaje, vuelva a intentarlo!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "'.ControladorRuta::ctrRuta().'";
								  } 
						});

					</script>';

				}else{


					echo'<script>

							swal({
								 	type: "success",
							  		title: "¡OK!",
							  		text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",					 
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
								}).then(function(result){

									if(result.value){
										window.location = "'.ControladorRuta::ctrRuta().'";
									}
							});

					</script>';

				}	

  	 		}

  	 	 }

  	  }

    	