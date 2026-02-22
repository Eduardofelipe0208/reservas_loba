<?php

class ControladorEmbarcaciones{

	/*=============================================
	Mostrar Embarcaciones
	=============================================*/

	static public function ctrMostrarEmbarcaciones($item, $valor){

		$tabla = "embarcaciones";

		$respuesta = ModeloEmbarcaciones::mdlMostrarEmbarcaciones($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro de Embarcacion
	=============================================*/

	public function ctrRegistroEmbarcacion(){

		if(isset($_POST["tipoEmbarcacion"])){

				if(isset($_FILES["subirImgEmbarcacion"]["tmp_name"]) && !empty($_FILES["subirImgEmbarcacion"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["subirImgEmbarcacion"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL Embarcacion
					=============================================*/

					$directorio = "vistas/img/embarcaciones";		

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["subirImgEmbarcacion"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["subirImgEmbarcacion"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);	

					}

					else if($_FILES["subirImgEmbarcacion"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["subirImgEmbarcacion"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
			
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}else{

						echo'<script>

							swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}

					$tabla = "embarcaciones";

					$datos = array("tipo" => $_POST["tipoEmbarcacion"],
								   "img" => $ruta,
								   "descripcion" => $_POST["descripcionEmbarcacion"]);

					$respuesta = ModeloEmbarcaciones::mdlRegistroEmbarcacion($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "¡El Embarcacion ha sido creado exitosamente!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

					}	

				}

		}

	}

	/*=============================================
	Editar Embarcacion
	=============================================*/

	public function ctrEditarEmbarcacion(){

		if(isset($_POST["idEmbarcacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmbarcacion"]) && 
			   preg_match('/^[\/\=\\&\\;\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\$\\|\\-\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcionEmbarcacion"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editar_precio_alta"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editar_precio_baja"])){

			   	$ruta = $_POST["imgEmbarcacionActual"];
			
				if(isset($_FILES["editarImgEmbarcacion"]["tmp_name"]) && !empty($_FILES["editarImgEmbarcacion"]["tmp_name"])){				

					list($ancho, $alto) = getimagesize($_FILES["editarImgEmbarcacion"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/embarcaciones";
				
					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(isset($_POST["imgEmbarcacionActual"])){
						
						unlink($_POST["imgEmbarcacionActual"]);

					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImgEmbarcacion"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImgEmbarcacion"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);	

					}

					else if($_FILES["editarImgEmbarcacion"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImgEmbarcacion"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
			
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}else{

						echo'<script>

							swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"
								  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});

						</script>';

						return;

					}

				}

				$tabla = "embarcaciones";

				$datos = array("id"=> $_POST["idEmbarcacion"],
					           "tipo" => $_POST["editarEmbarcacion"],
							   "img" => $ruta,
							   "descripcion" => $_POST["editarDescripcionEmbarcacion"]);

				$respuesta = ModeloEmbarcaciones::mdlEditarEmbarcacion($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

						swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡El Embarcacion ha sido actualizado!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';
					
				}	

			}else{

			 	echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';

			}	

		}	

	}

	/*=============================================
	Eliminar Embarcacion
	=============================================*/

	static public function ctrEliminarEmbarcacion($id, $ruta){
		
		unlink("../".$ruta);

		$tabla = "embarcaciones";

		$respuesta = ModeloEmbarcaciones::mdlEliminarEmbarcacion($tabla, $id);

		return $respuesta;

	}

}