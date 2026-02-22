<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";

class TablaReservas{

	/*=============================================
	Tabla Categorías
	=============================================*/ 

	public function mostrarTabla(){

		$reservas = ControladorReservas::ctrMostrarReservas(null, null);

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($reservas as $key => $value) {


			
			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["codigo_proceso"].'",
						"'.$value["descripcion_proceso"].'",
						"'.$value["fecha_proceso"].'"
					
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Reservas
=============================================*/ 

$tabla = new TablaReservas();
$tabla -> mostrarTabla();

