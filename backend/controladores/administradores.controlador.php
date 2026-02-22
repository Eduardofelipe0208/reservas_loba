<?php

class ControladorAdministradores{

	/*=============================================
	Ingreso Administradores
	=============================================*/

	public function ctrIngresoAdministradores(){

		if(isset($_POST["ingresoUsuario"])){


			   	$tabla = "administradores";
			    $item = "usuario";
			    $valor = $_POST["ingresoUsuario"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				if(is_array($respuesta) && $respuesta["usuario"] == $_POST["ingresoUsuario"] && ($respuesta["password"] == $_POST["ingresoPassword"] || $respuesta["password"] == $encriptarPassword)){

					
					if($respuesta["estado"] == 1){
					
						$_SESSION["validarSesionBackend"] = "ok";
 				$_SESSION["idBackend"] = $respuesta["id"];

 				$rutaBackend = ControladorRuta::ctrRutaBackend();

 				echo '<script>

					window.location = "'.$rutaBackend.'";

 				</script>';

				 		}else{

			 			echo "<div class='alert alert-danger mt-3 small'>ERROR: El usuario está desactivado</div>";

			 				}
				 	 }else{

					echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
					}	

			 
		}
	 }

	 /*=============================================
	Mostrar Administradores
	=============================================*/

	static public function ctrMostrarAdministradores($item, $valor){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de administrador
	=============================================*/

	public function ctrRegistroAdministrador(){

		if(isset($_POST["registroNombre"])){


				$tabla = "administradores";

				$datos = array("nombre" => $_POST["registroNombre"],
							   "usuario" =>  $_POST["registroUsuario"],
							   "password" => $_POST["registroPassword"],
							   "perfil" => $_POST["registroPerfil"],
							   "estado" => 0);

				
				$respuesta = ModeloAdministradores::mdlRegistroAdministradores($tabla, $datos);
				
				if($respuesta == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El administrador ha sido creado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "administradores";
								  } 
						});

					</script>';

				}
 			}

 	 	}

	/*=============================================
	Editar administrador
	=============================================*/

	public function ctrEditarAdministrador(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])){

			   	if($_POST["editarPassword"] != ""){

			   		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

			   			$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');  			

			   		}else{

			   			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

			   			return;

			   		}

			   	}else{

			   		$password = $_POST["passwordActual"];
			   	}

				$tabla = "administradores";

				$datos = array("id"=> $_POST["editarId"],
							   "nombre" => $_POST["editarNombre"],
							   "usuario" =>  $_POST["editarUsuario"],
							   "password" => $password,
							   "perfil" => $_POST["editarPerfil"]);

				
				$respuesta = ModeloAdministradores::mdlEditarAdministrador($tabla, $datos);
				
				if($respuesta == "ok"){

					echo'<script>

						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "El administrador ha sido editado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "administradores";
								  } 
						});

					</script>';

				}


			}

		}

	}

	/*=============================================
	Eliminar Administrador
	=============================================*/

	static public function ctrEliminarAdministrador($id){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlEliminarAdministrador($tabla, $id);

		return $respuesta;

	}


 }

	
