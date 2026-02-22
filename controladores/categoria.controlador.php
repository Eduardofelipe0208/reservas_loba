<?php  

Class ControladorCategoria{

	/*=============================================
	=            MOSTRAR Categoria          =
	=============================================*/
	
	static public function ctrMostrarCategoria(){

		$tabla = "categoria";

		$respuesta = ModeloCategoria::mdlMostrarCategoria($tabla);

		return $respuesta;
	}
	
	
}