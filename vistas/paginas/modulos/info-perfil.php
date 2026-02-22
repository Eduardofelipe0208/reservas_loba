<?php  

$item = "id_u";
$valor = $_SESSION['id'];

$usuario1 = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
$proceso = ControladorProceso::ctrMostrarReservasUsuario($valor);

?>
<!--=====================================
INFO PERFIL
======================================-->
 

<div class="infoPerfil container-fluid bg-white p-0 pb-5 mb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-4 colIzqPerfil p-0 px-lg-3">
				
				<div class="cabeceraPerfil pt-4">
					
					<a href="<?php echo $ruta;  ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-sign-out-alt"></i></i> Cerrar Sesion</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>	
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">
					
					<figure class="text-center imgPerfil">
					
				

						<img src="img/testimonio05.png" class="img-fluid rounded-circle">

					
		
					
					</figure>

					<div id="accordion">

						<div class="card">

							

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->	

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">
										

										<li class="list-group-item small">
											<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#cambiarPassword">Cambiar Contraseña</button></li>

										<li class="list-group-item small text-uppercase text-center" ><p>Nombre:</p><?php echo $usuario1["nombre"];  ?> </li> 
										<li class="list-group-item small text-uppercase text-center"><p>EMAIL:</p><?php echo $usuario1["email"]; ?></li>
										<li class="list-group-item small text-uppercase text-center"><p>Nombre de Embarcacion:</p><?php echo $usuario1["nombre_embarcacion"];  ?> </li>
										<li class="list-group-item small text-uppercase text-center"> <p>matricula:</p><?php echo $usuario1["matricula"];  ?> </li>


										<!--=====================================
										MODAL PARA CAMBIAR CONTRASEÑA
										======================================-->

										<div class="modal formulario" id="cambiarPassword">
											
											<div class="modal-dialog">

										 		<div class="modal-content">

										 			<form method="post">

										 				<div class="modal-header">

									 				 		<h4 class="modal-title">Cambiar Contraseña</h4>

        													<button type="button" class="close" data-dismiss="modal">&times;</button>

										 				</div>

										 				<div class="modal-body">
										 					
															<input type="hidden" name="idUsuarioPassword" value="<?php echo $usuario1["id_u"]; ?>">

															<div class="form-group">

																<input type="password" class="form-control" placeholder="Nueva contraseña" name="editarPassword" required>

															</div>

										 				</div>

										 				<div class="modal-footer d-flex justify-content-between"> 

														 	<div>

													        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

													        </div>

												         	<div>
         
												         		<button type="submit" class="btn btn-primary">Enviar</button>

											        	 	</div>

										 				</div>
										 		<?php

															$cambiarPassword = new ControladorUsuarios();
															$cambiarPassword -> ctrCambiarPassword();

														?>
																				
													</form>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-8 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">
						
						<h4 class="float-center text-uppercase">¡Hola, <?php echo $usuario1["nombre"]; ?>!</h4>

					</div>


			<!--=====================================
			boton confirmar
			======================================-->
				
				
				<div class="col-12">


					
					<?php if (isset($_COOKIE['codigoReservas'])): ?>



					<div class="card text-center">


						<div class="card-body text-center">
						

							<h2><strong> Embarcación <?php echo $_COOKIE['infoReservas']; ?></strong></h2>

							<h4>Fecha: <strong><?php echo $_COOKIE["fechaProceso"]; ?></strong></h4>

							<h4>Codigo: <strong><?php echo $_COOKIE["codigoReservas"]; ?></strong></h4>

							</div>
						<div class="card-footer">
						<form action="<?php echo $ruta.'perfil'; ?>" method="POST" class="pt-3">
						</form>
							
					</div>

				<div class="alert alert-warning" role="alert">
					<strong>!Importante!</strong> Deberas presentar estos datos en la oficina, maximo 24 horas antes del dia que escogiste y asi efectuar el pago de la misma, de lo contrario la reserva se cancelara.
				</div>


					<?php 
				$datos = array( "id_reservas" => $_COOKIE["idReservas"],
								"id_usuario" => $_SESSION['id'],
								"codigo_proceso" => $_COOKIE["codigoReservas"],
								"descripcion_proceso" => $_COOKIE["infoReservas"],
								"fecha_proceso" => $_COOKIE["fechaProceso"]);
													

							    	$respuesta = ControladorProceso::ctrguardarReservas($datos);


							
					

					
						echo '<script>		 	
						
document.cookie = "idReservas=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "imgReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "infoReservas=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "codigoReservas=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "fechaProceso=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

					  </script> 
					
							
					<div class="alert alert-success"> La reserva ha sido registrada exitosamente</div>';	
												    	

					 
				
?>					

					
				<?php endif ?>
 					

					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">
						
						<table class="table table-striped">
					    <thead>
					    	<div class="grid-item d-none d-lg-block">
					      <img src="img/testimonio06.png" class="img-fluid" width="100%">
					      </div> 
					    </thead>
					    <tbody>
					      
					    </tbody>
					  </table>


					</div>

				</div>
			
			</div>

		</div>

	</div>

</div>
 