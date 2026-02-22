<?php 	
		
	if (isset($_POST["id_reservas"])) {

		$valor = $_POST["id_reservas"];

		$categoria = ControladorCategoria::ctrMostrarCategoria($valor);

		$proceso = ControladorProceso::ctrMostrarProceso($valor);

		
		
		if(!$proceso){

			$valor = $_POST["ruta"];

			$proceso = ControladorReserva::ctrMostrarReserva($valor);
			

		}

				



		
			}else{ 

			echo '<script> window.location="'.$ruta.'"</script>';	
	}

 ?>




<!--=====================================
INFO RESERVAS
======================================-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idReservas ="<?php echo $_POST["id_reservas"]; ?>" fechaProceso ="<?php echo $_POST["fecha_proceso"]; ?>" >
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqReservas p-0">
				
				<!--=====================================
				CABECERA RESERVAS
				======================================-->
				
				<div class="pt-4 cabeceraReservas">
					
					<a href="<?php echo $ruta;  ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">

						<h5><i class="fas fa-sign-out-alt"></i></i> Regresar</h5>

					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>	

					<h6 class="float-right px-3">

						<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

							
							

						<?php endif ?>

					<?php else: ?>

						
					<?php endif ?>

					</h6>

					<div class="clearfix"></div>

				</div>

				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white p-4 calendarioReservas">

					<?php if (!$proceso): ?>

					<h1 class="pb-5 float-left">¡Está Disponible!</h1>

				<?php else: ?>

					<div class="infoDisponibilidad"> </div>


				<?php endif ?>

			

					<div class="float-right pb-3">
							
						<ul>
							<li>
								<i class="fas fa-square-full" style="color:#d30000ea"></i> No disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#eee"></i> Disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#FFCC29"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

					<form action="<?php echo $ruta;  ?>reservas" method="post">
					
					<input type="hidden" name="id_reservas" value="<?php echo $_POST["id_reservas"] ?> ">

					<div class="container mb-3">

						<div class="row py-2" style="background:#395B64">

							 <div class="col-6 col-md-6 input-group pr-1">
							
								<input type="text" class="form-control datepicker entrada" autocomplete="off" 
								placeholder="Reservar" name="fecha_proceso" value="<?php echo $_POST["fecha_proceso"]; ?>" required> 

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>


							<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
								
								
									<input type="submit" class="btn btn-block btn-md text-white" value="¡Ver Disponibilidad!" style="background:black">	
								

							</div>
						</div>

					</div>

					</form>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas" style="display:none">

				<h4 class="mt-lg-5">Código de la Reserva:</h4>
				<h2 class="colorTitulos"><strong class="codigoReservas"></strong></h2>
				<div class="form-group">
				  <h4>Horario (8:0 a 4:00pm)</h4>
				  <h4>De Lunes a Viernes</h4>
				  <label>Fecha de la Reserva:</label>
				  <input type="date" class="form-control" value="<?php echo $_POST['fecha_proceso']  ?>" readonly>
				</div>

				<div class="form-group">
				  <label>Tipo de Embarcación:</label>
				  <input type="text" class="form-control" value="Embarcación <?php echo $proceso [0]["nombre"] ?>"readonly>

				  

				</div>

				<div class="row py-4">
					
					<div class="col-12 col-lg-6 col-xl-5">

						<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

						<a href="<?php echo $ruta; ?>perfil" 
						class="confirmarReserva" 
						idReservas="<?php echo $_POST["id_reservas"]; ?>"
						fechaProceso="<?php echo $_POST['fecha_proceso']  ?>"
						infoReservas="<?php echo $proceso [0]["nombre"] ?>">
						<button type="button" class="btn btn-dark btn-lg w-100">RESERVAR</button>
						</a>

						<?php endif ?>
				
				<?php else: ?>

						<a href="#modalIngreso" data-toggle="modal" 
						class="confirmarReserva" 
						idReservas="<?php echo $_POST["id_reservas"]; ?>"
						fechaProceso="<?php echo $_POST['fecha_proceso']  ?>"
						infoReservas="<?php echo $proceso [0]["nombre"] ?>">
						<button type="button" class="btn btn-dark btn-lg w-100">RESERVAR</button>
						</a>
						
					<?php endif ?>



					</div>
			
				</div>

					<div class="alert alert-warning" role="alert">
					<strong>!Importante!</strong> Deberas presentar estos datos en la oficina, maximo 24 horas antes del dia que escogiste y asi efectuar el pago de la misma, de lo contrario la reserva se cancelara.
				</div>


			</div>

		</div>

	</div>

</div>
