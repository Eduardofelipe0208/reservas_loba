<!--=====================================
CONTÁCTENOS
======================================-->

<div class="contactenos container-fluid bg-black py-4" id="contacto">
	
	<div class="container text-center">
		
		<h1 class="py-sm-4">CONTÁCTENOS</h1>

		<form method="post">

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Nombre" name="nombreContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Apellido" name="apellidoContactenos" required>

			</div>

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Móvil" name="movilContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Correo Electrónico" name="emailContactenos" required>

			</div>

			<textarea class="form-control" rows="6" placeholder="Escribe aquí tu mensaje" name="mensajeContactenos" required></textarea>

			<button type="submit" class="btn btn-dark my-4 btn-lg py-3 text-uppercase w-50">Enviar</button>


			<?php

				$contactenos = new ControladorUsuarios();
				$contactenos -> ctrFormularioContactenos();
			
			?>
			

		</form>

	</div>

</div>

<!--=====================================
MAPA
======================================-->
<div class="mapa container-fluid bg-white p-0">
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1006.0271794192174!2d-64.15158397081804!3d10.963133116141645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c31f91ff7fe6a0f%3A0x9be3e4b2a345b96c!2sCongeladora%20Loba%20C.A!5e1!3m2!1ses-419!2sve!4v1666149291657!5m2!1ses-419!2sve" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

	<div class=" p-4 info"> 

		<h3 class="mt-4"><strong>Visítanos</strong></h3>
		<p>Distribuidora Marina Industrial
		Congeladora Loba</p>

		<p>
		Municipio Tubores<br>
		Chacachacare<br>
		</p>

		<p class="pb-4">Email: congeladoraloba@gmail.com<br>
		Tel: 0412-0936783</p>

	</div>	

</div>

<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid p-0">

	<div class="grid-container">
			
		<div class="grid-item d-none d-lg-block pt-2"></div>

		<div class="grid-item d-none d-lg-block pt-2">
			
			<p>Derechos Reservados Eduardo Marcano 2022</p>

		</div>

		<div class="grid-item pt-2">
				

		</div>

	</div>

</footer>

	
