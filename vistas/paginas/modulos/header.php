<?php 	

$categoria	= ControladorCategoria::ctrMostrarCategoria();



 ?>






<!--=====================================
HEADER
======================================-->

<header class="container-fluid p-0 bg-white">
	
	<div class="container p-0">
		
		<div class="grid-container py-2">

			<!-- LOGO -->
			
			<div class="grid-item">

				<a href="<?php echo $ruta;  ?>">
				
					<img src="img/logo1.jpg" class="img-fluid">

				</a>

			</div>

			<div class="grid-item d-none d-lg-block"></div>



				


			<!-- CAMPANA Y RESERVA -->

			<div class="grid-item d-none d-lg-block bloqueReservas">
				
				<div class="py-2 campana-y-reserva mostrarBloqueReservas" modo="abajo">

					<i class="fas fa-concierge-bell lead mx-2"></i>

					<i class="fas fa-caret-up lead mx-2 flechaReserva"></i>

				</div>	

				<!--=====================================
				FORMULARIO DE RESERVAS
				======================================-->

				<form action="<?php echo $ruta;  ?>reservas" method="post"	>

				
					<div class="formReservas py-1 py-lg-2 px-4">
					
					<div class="form-group my-4">

						<select class="form-control form-control-lg SelectTipoEmbarcacion" 
						 name="id_reservas" required>

							<option value="">Tipo de embarcación</option>
							
							<?php 	foreach ($categoria	 as $key => $value): ?>

							
							<option value=" <?php echo $value ["id"]; ?>">
								<?php echo $value["tipo"]	?></option>

						<?php 	endforeach	?>
							
						</select>

					</div>

					<input type="hidden" id="ruta" name="ruta">

					<div class="row">
						
						 <div class="col-6 input-group input-group-lg pr-1">
						
							<input type="text" class="form-control datepicker entrada"autocomplete="off" placeholder="Reservar" name="fecha_proceso" required>

							<div class="input-group-append">
								
								<span class="input-group-text p-2">
									<i class="far fa-calendar-alt small text-gray-dark"></i>
								</span>
							
							</div>

						</div>


					</div>

					<input type="submit" class="btn btn-block btn-lg my-4 text-white" value="¡Apartar ya!">
					

				   </div>

				</form>

			</div>

			<!-- INGRESO DE USUARIOS -->

			<div class="grid-item d-none d-lg-block mt-2">

				<a href="#modalIngreso" data-toggle="modal"><i class="fas fa-user"></i></a>

			</div>



			<!-- MENÚ HAMBURGUESA -->

			<div class="grid-item mt-1 mt-sm-3 mt-md-4 mt-lg-2 botonMenu">
				
				<i class="fas fa-bars lead"></i>

			</div>

		</div>

	</div>

</header>

<!--=====================================
MENÚ
======================================-->

<nav class="menu container-fluid p-0">
	
	<ul class="nav nav-justified py-2">
		
		<li class="nav-item">
			<a class="nav-link text-white" href="#embarcaciones">Embarcaciones</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#reserva">Reservar</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#sobre">Sobre nosotros</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#contacto">Contacto</a>
		</li>

	</ul>


</nav>

<!--=====================================
MENÚ MÓVIL
======================================-->
	<form action="<?php echo $ruta;  ?>reservas" method="post"	>

<div class="menuMovil">
	
	<div class="row">
		
		<div class="col-6">
			
			<a href="#modalIngreso" data-toggle="modal">
				<i class="fas fa-user lead ml-3 mt-4"></i>
			</a>

		</div>	


	</div>

	<div class="formReservas py-1 py-lg-2 px-4">
					
		<div class="form-group my-4">


				<select class="form-control form-control-lg SelectTipoEmbarcacion" 
						 name="id_reservas" required>

							<option value="">Tipo de embarcación</option>
							
							<?php 	foreach ($categoria	 as $key => $value): ?>

							
							<option value=" <?php echo $value ["id"]; ?>">
								<?php echo $value["tipo"]	?></option>

						<?php 	endforeach	?>
							
						</select>
		</div>

		<div class="row">
			
			 <div class="col-6 input-group input-group-lg pr-1">
			
				<input type="text" class="form-control datepicker entrada"autocomplete="off" placeholder="Reservar" name="fecha_proceso" required>

					<div class="input-group-append">
								
					<span class="input-group-text p-2">
					<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>
							
					</div>

			</div>

		</div>

		<input type="submit" class="btn btn-block btn-lg my-4 text-black" value="¡Apartar ya!">
		
	</div>

		</form>


		

	<ul class="nav flex-column mt-4 pl-4 mb-5">
		
		<li class="nav-item">
			<a class="nav-link text-white" href="#embarcaciones">Embarcaciones</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#reserva">Reservar</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#sobre">Sobre nosotros</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#contacto">Contacto</a>
		</li>

		<li class="nav-item">

	</ul>

</div>
