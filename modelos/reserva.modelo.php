<?php 

require_once "conexion.php";

Class ModeloReserva{

	/*=============================================
	 MOSTRAR CATEGORIA RESERVAS CON INNER JOIN     
	=============================================*/
	
	static public function mdlMostrarReserva($tabla1, $tabla2, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_r WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchALL();

	}

	
	
}

 ?>