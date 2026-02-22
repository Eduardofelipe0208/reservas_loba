<?php

require_once "../controladores/embarcaciones.controlador.php";
require_once "../modelos/embarcaciones.modelo.php";

class TablaEmbarcaciones{ 

/*=============================================
	Tabla Embarcaciones
	=============================================*/ 

	public function mostrarTabla(){

		$embarcaciones = ControladorEmbarcaciones::ctrMostrarEmbarcaciones(null, null);

		if(count($embarcaciones)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($embarcaciones as $key => $value) {

	 		/*=============================================
			IMAGEN
			=============================================*/	

			$imagen = "<img src='".$value["img"]."' class='img-fluid'>";
			
			/*=============================================
			ACCIONES
			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarEmbarcacion' data-toggle='modal' data-target='#editarEmbarcacion' idEmbarcacion='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarEmbarcacion' idEmbarcacion='".$value["id"]."' imgEmbarcacion='".$value["img"]."'><i class='fas fa-trash-alt'></i></button></div>";	


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["tipo"].'",
						"'.$imagen.'",
						"'.$value["descripcion"].'",
						"'.$acciones.'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Embarcaciones
=============================================*/ 

$tabla = new TablaEmbarcaciones();
$tabla -> mostrarTabla();

