<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	VALIDAR cedula EXISTENTE
	=============================================*/	

	public $validarCedula;

	public function ajaxValidarCedula(){

		$item = "cedula";
		$valor = $this->validarCedula;

		$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

		echo json_encode($respuesta);

	}



	/*=============================================
	VALIDAR cedula EXISTENTE
	=============================================*/	

	public $validarEmail;

	public function ajaxValidarEmail(){

		$item = "email";
		$valor = $this->validarEmail;

		$respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

		echo json_encode($respuesta);

	}

 
 }


/*=============================================
VALIDAR cedula EXISTENTE
=============================================*/	

if(isset($_POST["validarCedula"])){

	$valCedula = new AjaxUsuarios();
	$valCedula -> validarCedula = $_POST["validarCedula"];
	$valCedula -> ajaxValidarCedula();

}

/*=============================================
VALIDAR cedula EXISTENTE
=============================================*/	

if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxUsuarios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}

