<?php

require_once "conexion.php";

Class ModeloProceso{

	/*=============================================
	MOSTRAR -RESERVAS-Proceso-CATEGORIAS CON INNER JOIN
	=============================================*/
	
	static public function mdlMostrarProceso($tabla1, $tabla2, $tabla3, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_r = $tabla2.id_reservas INNER JOIN $tabla3 ON $tabla1.tipo_r = $tabla3.id  WHERE id_r = :id_r");

		$stmt -> bindParam(":id_r", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
 
	}


/*=============================================
	MOSTRAR -RESERVAS-Proceso-CATEGORIAS CON INNER JOIN
	=============================================*/
	
	static public function mdlMostrarCodigoReservas($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_proceso = :codigo_proceso");

		$stmt -> bindParam(":codigo_proceso", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
 
	}

	/*=============================================
	guardar reserva
	=============================================*/
	
	static public function mdlguardarReservas($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_reservas, id_usuario, codigo_proceso, descripcion_proceso, fecha_proceso) VALUES(:id_reservas, :id_usuario, :codigo_proceso,:descripcion_proceso, :fecha_proceso )");

		$stmt->bindParam(":id_reservas", $datos["id_reservas"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_proceso", $datos["codigo_proceso"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_proceso", $datos["descripcion_proceso"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proceso", $datos["fecha_proceso"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{ 

			return "error";

		}
 
	}

	/*=============================================
	Mostrar Reservas por Usuario
	=============================================*/

	static public function mdlMostrarReservasUsuario($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario ORDER BY id_proceso DESC LIMIT 5");

		$stmt -> bindParam(":id_usuario", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();
		
	}
	


}