<?php  

require_once "../controladores/proceso.controlador.php";
require_once "../modelos/proceso.modelo.php";


class AjaxProceso{

	/*=============================================
	Traer proceso reserva
	=============================================*/

	public $idReservas;

	public function AjaxTraerProceso(){

		$valor = $this->idReservas;

		$respuesta = ControladorProceso::ctrMostrarProceso($valor);

		echo json_encode($respuesta);

	}



	/*=============================================
	Traer proceso a travez de codigo
	=============================================*/

	public $codigoReservas;

	public function AjaxTraerCodigoReservas(){

		$valor = $this->codigoReservas;

		$respuesta = ControladorProceso::ctrMostrarCodigoReservas($valor);

		echo json_encode($respuesta);

	}

}


	/*=============================================
	Traer proceso a travez de codigo
	=============================================*/

	if (isset($_POST["idReservas"])) {
	
	$idReservas = new AjaxProceso();
	$idReservas -> idReservas = $_POST["idReservas"];
	$idReservas -> AjaxTraerProceso();
}

	
	/*=============================================
	Traer proceso codigo
	=============================================*/

	if (isset($_POST["codigoReservas"])) {
	
	$codigoReservas = new AjaxProceso();
	$codigoReservas -> codigoReservas = $_POST["codigoReservas"];
	$codigoReservas -> AjaxTraerCodigoReservas();
}
 



 
