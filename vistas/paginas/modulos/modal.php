<!--=====================================
VENTANA MODAL Embarcaciones
======================================-->

<div class="modal" id="modalPlanes">
	
	 <div class="modal-dialog">
			
		<div class="modal-content">
			
	      	<div class="modal-header">
	        	<h4 class="modal-title text-uppercase"></h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>
			
	 		<div class="modal-body">
       			
       			<img src="" class="img-thumbnail">
    			
    			<p class="py-3"></p>
       			
       			<div class="text-center">
        			<a href="#reserva" class="btn btn-primary text-center btnModalEmbarcaciones" data-dismiss="modal">¡Reserva ya!</a>
        		</div>

      		</div>

  		 	<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      		</div>

		</div> 	

	 </div>

</div>

<!--=====================================
VENTANA MODAL INFO
======================================-->

<div class="modal" id="info"> 
	
	 <div class="modal-dialog">
			
		<div class="modal-content">
			
	      	<div class="modal-header">
	        	<h3 class="modal-title text-uppercase text-center"> <b>Funcionamiento del sistema	</b></h3>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>
			
	 		<div class="modal-body">
	 		
	 			
	 		<a href="https://www.youtube.com/watch?v=GaTMsIDUk_A" target="_blank"><button type="button" class="btn btn-dark btn-block">Ver vídeo</button></a>
	 			<h4>	<b>	Paso 1</b> </h4>
	 			<p>	<b>Registrarse en el sistema </b></p>
	 			<p>Rellenando todos los datos requeridos</p>
       			
       			<img src="img/registrolll.jpg" class="img-thumbnail">

       		<h4>	<b>	Paso 2</b> </h4>
	 			<p>	<b>Iniciar sesion en el sistema </b></p>
	 			<p>Insertando los datos requeridos los datos requeridos, que en este caso son correo elctronico y la contraseña anteriormente ingresados en el registro de usuarios.</p>
       			
       			<img src="img/Inicio.jpg" class="img-thumbnail">

       			<h4>	<b>	Paso 3</b> </h4>
	 			<p>	<b>Pagina de perfil </b></p>
	 			<p>	Una vez que el usuario inicie sesion, automaticamente el sistema lo llevara a la pagina de perfil, en esta pagina el usuario podra visualizar sus datos, cambiar su contraseña y tambien podra efectuar su reserva. Cabe destacar que es obligatorio que el usuario este registrado en el sistema para poder hacer la reserva, de lo contrario no podra realizar la reserva.</p>
       			
       			<img src="img/Embarcaciones-industriales.jpg" class="img-thumbnail">

       			<h4>	<b>	Paso 1</b> </h4>
	 			<p>	Registrarse en el sistema </p>
       			
       			<img src="img/Embarcaciones-industriales.jpg" class="img-thumbnail">

       			<h4>	<b>	Paso 1</b> </h4>
	 			<p>	Registrarse en el sistema </p>
       			
       			<img src="img/Embarcaciones-industriales.jpg" class="img-thumbnail">
    			
    			<p class="py-3"></p>
       			

      		</div>

  		 	<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      		</div>

		</div> 	

	 </div>

</div>

<!--=====================================
VENTANA MODAL INGRESO
======================================-->

<div class="modal formulario" id="modalIngreso">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-info text-white">
        <h4 class="modal-title">Ingresar</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">



      	      	<!--=====================================
		INGRESO DIRECTO
		======================================-->

		<hr class="mt-0">

		<form method="post">

			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-envelope"></i>

			      </span>

			    </div>

			    <input type="email" class="form-control" placeholder="Email" name="ingresoEmail"  required>

		  	</div>

		  	<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
					<i class="fas fa-unlock-alt"></i>

			      </span>

			    </div>

			    <input type="password" class="form-control" placeholder="Contraseña" name="ingresoPassword" required>

		  	</div>

		  	<div class="text-center pb-3">
		
				<a href="#modalRecuperarPassword" data-toggle="modal" data-dismiss="modal">
					¿Olvidó su contraseña?
				</a>

			</div>
			

			<input type="submit" class="btn btn-dark btn-block" value="Ingresar">

			<?php

				$ingresoUsuario = new ControladorUsuarios();
				$ingresoUsuario -> ctrIngresoUsuario();

			?>

		</form>

      </div>


      <div class="modal-footer">
        
		¿No tiene una cuenta registrada? | 

		<strong>

			<a href="#modalRegistro" data-toggle="modal" data-dismiss="modal">
				Registrarse
			</a>

		</strong>

      </div>

    </div>

  </div>

</div>

<!--=====================================
VENTANA MODAL REGISTRO
======================================-->

<div class="modal formulario" id="modalRegistro">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-info text-white">
        <h4 class="modal-title">Registarse</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">



      	<!--=====================================
		REGISTRO DIRECTO
		======================================-->

		<hr class="mt-0">

		<form method="post">

			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-user"></i>

			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Nombre" name="registroNombre" required>

		  	</div>

		  <div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<span class="fas fa-user-tie"></span>


			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Apellido" name="registroApellido" required>

		  </div>


		  <div class="input-group mb-3">

			    <div class="input-group-prepend">
			      	
			    </div>
			    		<span>
			    		<label>Tipo de documento</label> <BR>
			        <INPUT type="radio" name="registroTipo" value="CI"> C.I<BR>
    					<INPUT type="radio" name="registroTipo" value="RIF"> RIF<BR>
    					<INPUT type="radio" name="registroTipo" value="E"> E<BR>
 							</span>
 							
					
					
 	
		  	</div>

		  		<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-user"></i>

			      </span>

			    </div>
			    	<input type="id" class="form-control" placeholder="Cedula" name="registroCedula" required>
 	

			    

		  	</div>

		  		<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-envelope"></i>

			      </span>

			    </div>

			    <input type="email" class="form-control" placeholder="Email" name="registroEmail" required>

		  	</div>

		  		<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
					<i class="fas fa-unlock-alt"></i>

			      </span>

			    </div>

			    <input type="password" class="form-control" placeholder="Contraseña" name="registroPassword" required>

		  	</div>


		  			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-user"></i>

			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Nombre de Embarcacion" name="registroEmbarcacion"required>

		  	</div>

		  		<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
					<i class="fas fa-unlock-alt"></i>

			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Capacidad de combustible" name="registroCombustible" required>

		  	</div>


		  		<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-user"></i>

			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Matricula de Embarcacion" name="registroMatricula" required>

		  	</div>
			
			<input type="submit" class="btn btn-dark btn-block" value="Registrarse">

			<?php

			$registroUsuario = new ControladorUsuarios();
			$registroUsuario -> ctrRegistroUsuario();


			?>


		</form>

      </div>


      <div class="modal-footer">
        
		¿Ya tienes una cuenta registrada? | 

		<strong>

			<a href="#modalIngreso" data-toggle="modal" data-dismiss="modal">
				Ingresar
			</a>

		</strong>

      </div>

    </div>

  </div>

</div>

<!--=====================================
VENTANA MODAL RECUPERAR CONTRASEÑA
======================================-->

<div class="modal formulario" id="modalRecuperarPassword">
	
	<div class="modal-dialog">

	    <div class="modal-content">

	    	<div class="modal-header bg-info text-white">

		        <h4 class="modal-title">Recuperar contraseña</h4>

		        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

		    </div>

			 <div class="modal-body">
			 	
				<form method="post">

					<p class="text-muted">Escriba su correo electrónico con el que estás registrado y allí le enviaremos una nueva contraseña:</p>

					<div class="input-group mb-3">
						
						<div class="input-group-prepend">

					      <span class="input-group-text">
					      	
					      	<i class="far fa-envelope"></i>

					      </span>

					    </div>

					    <input type="email" class="form-control" placeholder="Email" name="emailRecuperarPassword" required>

					</div>

					<input type="submit" class="btn btn-dark btn-block" value="Enviar">

					<?php

						$recuperarPassword = new ControladorUsuarios();
						$recuperarPassword -> ctrRecuperarPassword();

					?>

				</form>

			 </div>

	    </div>

    </div>


</div>