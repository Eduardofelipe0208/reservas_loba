<?php  

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

require_once "controladores/embarcaciones.controlador.php";
require_once "modelos/embarcaciones.modelo.php";

require_once "controladores/categoria.controlador.php";
require_once "modelos/categoria.modelo.php";

require_once "controladores/sobre.controlador.php";
require_once "modelos/sobre.modelo.php";

require_once "controladores/reserva.controlador.php";
require_once "modelos/reserva.modelo.php";

require_once "controladores/proceso.controlador.php";
require_once "modelos/proceso.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "extensiones/vendor/autoload.php";




$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

