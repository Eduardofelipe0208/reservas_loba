<?php  

Class ControladorProceso{

	/*=============================================
	=            MOSTRAR Proceso          =
	=============================================*/
	
	static public function ctrMostrarProceso($valor){

		$tabla1 = "reservas";
		$tabla2 = "proceso";
		$tabla3 = "categoria";

		$respuesta = ModeloProceso::mdlMostrarProceso($tabla1, $tabla2, $tabla3, $valor);

		return $respuesta;
	}
	
	
	/*=============================================
	=            MOSTRAR Proceso codigo singular         =
	=============================================*/
	
	static public function ctrMostrarCodigoReservas($valor){

		$tabla = "proceso";

		$respuesta = ModeloProceso::mdlMostrarCodigoReservas($tabla, $valor);

		return $respuesta;
	}

		/*=============================================
	=            guardar reserva         =
	=============================================*/
	
	static public function ctrguardarReservas($valor){

		$tabla = "proceso";

		$respuesta = ModeloProceso::mdlguardarReservas($tabla, $valor);

		return $respuesta;
	}

	/*=============================================
	Mostrar Reservas por usuario
	=============================================*/

	static public function ctrMostrarReservasUsuario($valor){

		$tabla = "proceso";

		$respuesta = ModeloProceso::mdlMostrarReservasUsuario($tabla, $valor);

		return $respuesta;
		
	}

	
}

 

