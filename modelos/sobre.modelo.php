<?php  

require_once "conexion.php";

Class ModeloSobre{

	/*=============================================
	=            MOSTRAR Sobre         =
	=============================================*/
	
	
	static public function mdlMostrarSobre($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchALL();

		$stmt -> close();

		$stmt = null;
	}
	
}