<?php 

Class ControladorReserva{

	/*=============================================
	=            MOSTRAR RESERVAS CON INNER JOIN        =
	=============================================*/
	
	static public function ctrMostrarReserva($valor){

		$tabla1 = "categoria";
		$tabla2 = "reservas";

		$respuesta = ModeloReserva::mdlMostrarReserva($tabla1,$tabla2,$valor);

		return $respuesta;
	}
	
	
	
}

 