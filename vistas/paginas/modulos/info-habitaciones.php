
<?php 

$valor = $_GET["pagina"];

$reservas = ControladorReserva::ctrMostrarReserva($valor);

$categoria = ControladorCategoria::ctrMostrarCategoria($valor);








 ?>





<!--=====================================
INFO RESERVA
======================================-->

<div class="infoHabitacion container-fluid bg-white p-0 pb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqHabitaciones p-0">
				
				<!--=====================================
				CABECERA Reservas
				======================================-->
				
				<div class="pt-4 cabeceraHabitacion">

					<a href="<?php echo $ruta;  ?>" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<h2 class="float-right text-white px-3 categoria text-uppercase"><?php echo $reservas[0]["tipo"]; ?></h2>

					<div class="clearfix"></div>

					<ul class="nav nav-justified mt-lg-4">	

						


					</ul>

				</div>

				<!--=====================================
				MULTIMEDIA HABITACIONES
				======================================-->

				<!-- SLIDE  -->

				<section class="jd-slider mb-5 my-lg-1 slideHabitaciones">
		      	       
			        <div class="slide-inner">


			            	 <?php foreach ($reservas as $key => $value): ?>

				            <li>	

								<img src="<?php echo $servidor.$value["galeria"]; ?>" class="img-fluid">

							</li>

							<?php endforeach ?>

					 

			 </div>

				</section>



				<!--=====================================
				DESCRIPCIÓN HABITACIONES
				======================================-->	

				<div class="descripcionHabitacion px-3">
					
					<h1 class="colorTitulos float-left"><?php echo $reservas[0]["tipo"]; ?> 
				</h1>

					<div class="clearfix mb-4"></div>
					<div class="d-reservas">	

					<?php echo $reservas[0]["descripcion_r"]; ?>
						
					</div>	


					
					

					<form action="<?php echo $ruta;  ?>reservas" method="post"	>
					
					<input type="hidden" name="id_reservas" value="<?php echo $reservas[0]["id_r"]; ?>	">

					<div class="container">

						<div class="row py-2" style="background:#395B64">

							 <div class="col-6 col-md-6 input-group pr-1">
							
								<input type="text" class="form-control datepicker entrada"autocomplete="off" placeholder="Reservar" name="fecha_proceso" required> 

								<div class="input-group-append">
									
									<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
								
								</div>

							</div>

						 	

							<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
								
								
									<input type="submit" class="btn btn-block btn-md text-white" value="¡Apartar ya!" style="background:black">	
								

							</div>

						</div>

					</div>

				 </form>

				</div>

			</div>
			
			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerHabitaciones">

				
				

				<!-- reservas -->

				<div class="habitaciones">

					<div class="container">

						<div class="row">

							<?php

								$categoria = ControladorCategoria::ctrMostrarCategoria();
						  ?>

							<?php foreach ($categoria as $key => $value): ?>

								<?php if ($_GET['pagina'] != $value['ruta']): ?>
									
								

							<div class="col-12 pb-3 px-0 px-lg-3">

						<a href="<?php echo $ruta . $value["ruta"];  ?>">
					
					<figure class="text-center">
						
						<img src= <?php echo $servidor.$value["img"]; ?> class="img-fluid" 
						width="100%">

						<p class="small py-4 mb-0"><?php echo $value["descripcion"]; ?></p>

						<h3 class="py-2 text-gray-dark mb-0">RESERVAR</h3>
						
						<h1 class="text-white p-3 mx-auto w-50 lead text text-uppercase" 
						style="background: <?php echo $value ["color"]; ?>"><?php echo $value ["nombre"]; ?></h1>

						</figure>

							</a>

							</div>
								
									<?php endif ?>

							<?php endforeach ?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>