<?php

$embarcaciones = ControladorEmbarcaciones::ctrMostrarEmbarcaciones();



?>



<!--=====================================
PLANES
======================================-->

<div class="planes container-fluid bg-white p-0" id="embarcaciones">
	
	<div class="container p-0">
		
		<div class="grid-container">
			
			<div class="grid-item">
				
				<h1 class="text-center py-3 py-lg-5 tituloPlan" tituloPlan="BIENVENIDO">BIENVENIDO</h1>

				<p class="text-muted text-left px-4 descripcionPlan" descripcionPlan="En esta seccion podras visualizar de manera comoda el servicio de surtimiento de combustible para los distintos tipos de embarcaciones, ademas tambien podras eligir otro tipo de embarcacion, que requiera nuestro servicio de combustible .">En esta seccion podras visualizar de manera comoda el servicio de surtimiento de combustible para los distintos tipos de embarcaciones, ademas tambien podras eligir otro tipo de embarcacion, que requiera nuestro servicio de combustible .</p>

			</div>

				<?php foreach ($embarcaciones as $key => $value): ?>
					
			<div class="grid-item d-none d-lg-block" data-toggle="modal" data-target="#modalPlanes">
				
				<figure class="text-center">
					
					<h1 descripcion="<?php 	echo $value["descripcion"]; ?>" 				class="text-uppercase"><?php echo $value["tipo"]; ?>
						
					</h1>

				</figure>

				<img src= <?php echo $servidor.$value["img"]; ?> class="img-fluid" 
				width="100%">


			</div>

			<?php endforeach ?>

			 

			
		</div>

	</div>

</div>
