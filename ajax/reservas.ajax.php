<?php

require_once "../controladores/reserva.controlador.php";
require_once "../modelos/reserva.modelo.php";


class AjaxReserva{

	public $ruta;

	public function ajaxTraerReserva(){

		$valor = $this->ruta;

		$respuesta = ControladorReserva::ctrMostrarReserva($valor);

		echo json_encode($respuesta);

	}



}

if(isset($_POST["ruta"])){

	$ruta = new AjaxReserva();
	$ruta -> ruta = $_POST["ruta"];
	$ruta -> ajaxTraerReserva();

}
