<?php  

Class ControladorSobre{

	/*=============================================
	=            MOSTRAR Sobre          =
	=============================================*/
	
	static public function ctrMostrarSobre(){

		$tabla = "sobre";

		$respuesta = ModeloSobre::mdlMostrarSobre($tabla);

		return $respuesta;
	}
	
	
}