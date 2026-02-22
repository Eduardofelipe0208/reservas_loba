<?php  

require_once "conexion.php";

Class ModeloBanner{

	/*=============================================
	=            MOSTRAR BANNER         =
	=============================================*/
	
	
	static public function mdlMostrarBanner($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchALL();

		$stmt -> close();

		$stmt = null;
	}
	
}