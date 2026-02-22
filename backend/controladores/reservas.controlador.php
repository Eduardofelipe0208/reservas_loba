<?php

class ControladorReservas{


	/*=============================================
	MOSTRAR Reservas
	=============================================*/

	static public function ctrMostrarReservas($item, $valor){

		$tabla = "proceso";

		$respuesta = ModeloReservas::mdlMostrarReservas($tabla, $item, $valor);

		return $respuesta;

	}


}