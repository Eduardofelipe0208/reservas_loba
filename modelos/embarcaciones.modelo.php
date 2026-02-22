<?php  

require_once "conexion.php";

Class Modeloembarcaciones{

	/*=============================================
	=            MOSTRAR Embarcaciones         =
	=============================================*/
	
	
	static public function mdlMostrarembarcaciones($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchALL();

		$stmt -> close();

		$stmt = null;
	}
	
}