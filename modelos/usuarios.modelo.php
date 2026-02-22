<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/
	static public function mdlRegistroUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, tipo_documento, cedula, email, password, nombre_embarcacion, capacidad_combustible, matricula, foto, email_encriptado) VALUES (:nombre, :apellido, :tipo_documento, :cedula, :email, :password, :nombre_embarcacion, :capacidad_combustible, :matricula, :foto, :email_encriptado)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_embarcacion", $datos["nombre_embarcacion"], PDO::PARAM_STR);
		$stmt->bindParam(":capacidad_combustible", $datos["capacidad_combustible"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":email_encriptado", $datos["email_encriptado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function mdlMostrarUsuario($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id_u = :id_u");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id_u", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

	}

}
