<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class TablaUsuarios{

	/*=============================================
	Tabla Categorías
	=============================================*/ 

	public function mostrarTabla(){

		$usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($usuarios as $key => $value) {


			
			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["nombre"].'",
						"'.$value["apellido"].'",
						"'.$value["tipo_documento"].'",
						"'.$value["cedula"].'",
						"'.$value["email"].'",
						"'.$value["nombre_embarcacion"].'",
						"'.$value["matricula"].'"
					
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Usuarios
=============================================*/ 

$tabla = new TablaUsuarios();
$tabla -> mostrarTabla();

