<?php  

Class ControladorEmbarcaciones{

	/*=============================================
	=            MOSTRAR Embarcaciones        =
	=============================================*/
	
	static public function ctrMostrarEmbarcaciones(){

		$tabla = "embarcaciones";

		$respuesta = ModeloEmbarcaciones::mdlMostrarEmbarcaciones($tabla);

		return $respuesta;
	}
	
	
}