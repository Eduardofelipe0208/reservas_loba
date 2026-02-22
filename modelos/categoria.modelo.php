<?php  

require_once "conexion.php";

Class ModeloCategoria{

	/*=============================================
	=            MOSTRAR Categoria         =
	=============================================*/
	
	
	static public function mdlMostrarCategoria($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchALL();

		$stmt -> close();

		$stmt = null;
	}
	
}