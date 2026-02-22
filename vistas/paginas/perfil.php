<?php

if(isset($_SESSION["validarSesion"])){	


		include "modulos/banner-interior.php";
		include "modulos/info-perfil.php";
		include "modulos/sobre.php";
		include "modulos/reservar.php";

		

	 }else{

	echo '<script> window.location="'.$ruta.'"</script>';
}
