
		<div class="accordion accordion-flush" id="datos_inscripcion">

			<!-- Datos del estudiante. -->
			<div class="accordion-item">
				<h2 class="accordion-header" id="flush-headingOne">
					<button class="accordion-button collapse show" type="button" data-bs-toggle="collapse" data-bs-target="#datos_estudiante" aria-expanded="false" aria-controls="datos_estudiante">
						Datos del estudiante.
					</button>
				</h2>
				<div id="datos_estudiante" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#datos_inscripcion">
					<div class="accordion-body">
						
						

						<ul class="list-group">

						  <li class="list-group-item list-group-item-primary h5 m-0">
								Datos personales.
						  </li>

						  <?php  

						  	$datos_personales_e = [

						  		// Nombre del campo    -   Valor/indice en bd

						  		"Nombre completo" 			=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Cédula" 								=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Cédula escolar" 				=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Fecha de nacimiento"		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Edad" 									=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Lugar de nacimiento"		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",

						  	];

						  ?>

						  <?php foreach ($datos_personales_e as $key => $value): ?>
						  
						  <li class="list-group-item list-group-item-action">
						  	<b><?php echo $key;?>:</b> 
						  	<?php echo $value; ?> 
						  </li>

						  <?php endforeach ?>

						  <li class="list-group-item list-group-item-primary h5 m-0">
								Datos de contacto.
						  </li>

						  <?php  

						  	$datos_contacto_e = [

						  		// Nombre del campo    -   Valor/indice en bd

						  		"Dirección" 						=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Correo electrónico" 		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Teléfono principal"		=> "1111 / 2222 / 3333",
						  		"Teléfono secundario" 	=> "1111 / 2222 / 3333",

						  	];

						  ?>

						  <?php foreach ($datos_contacto_e as $key => $value): ?>
						  
						  <li class="list-group-item list-group-item-action">
						  	<b><?php echo $key;?>:</b> 
						  	<?php echo $value;?> 
						  </li>

						  <?php endforeach ?>

						  <li class="list-group-item list-group-item-primary h5 m-0">
								Datos académicos.
						  </li>

						  <?php  

						  	$datos_acad_e = [

						  		// Nombre del campo    -   Valor/indice en bd

						  		"Periodo académico" 			=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Año a cursar" 						=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Sección" 								=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"¿Ha repetido algún año?"	=> "1111 / 2222 / 3333",
						  		"Año repetido" 						=> "1111 / 2222 / 3333",
						  		"Materias repetidas" 			=> "1111 / 2222 / 3333",
						  		"Materias pendientes" 		=> "1111 / 2222 / 3333",
						  		"PLantel de procedencia" 	=> "1111 / 2222 / 3333",

						  	];

						  ?>

						  <?php foreach ($datos_acad_e as $key => $value): ?>
						  
						  <li class="list-group-item list-group-item-action">
						  	<b><?php echo $key;?>:</b> 
						  	<?php echo $value;?> 
						  </li>

						  <?php endforeach ?>

						  <li class="list-group-item list-group-item-primary h5 m-0">
								Datos sociales.
						  </li>

						  <?php  

						  	$datos_sociales_e = [

						  		// Nombre del campo    -   Valor/indice en bd

						  		"Periodo académico" 			=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Año a cursar" 						=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"Sección" 								=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
						  		"¿Ha repetido algún año?"	=> "1111 / 2222 / 3333",
						  		"Año repetido" 						=> "1111 / 2222 / 3333",
						  		"Materias repetidas" 			=> "1111 / 2222 / 3333",
						  		"Materias pendientes" 		=> "1111 / 2222 / 3333",
						  		"PLantel de procedencia" 	=> "1111 / 2222 / 3333",

						  	];

						  ?>

						  <?php foreach ($datos_sociales_e as $key => $value): ?>
						  
						  <li class="list-group-item list-group-item-action">
						  	<b><?php echo $key;?>:</b> 
						  	<?php echo $value;?> 
						  </li>

						  <?php endforeach ?>

						</ul>
						
					</div>
				</div>
			</div>

			<!-- Datos representante. -->
			<div class="accordion-item">
				<h2 class="accordion-header" id="flush-headingTwo">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
						Datos representante.
					</button>
				</h2>
				<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#datos_inscripcion">
					<div class="accordion-body">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ex recusandae quisquam dolor consequatur iure eaque tenetur debitis architecto optio harum labore alias, itaque natus. Expedita laboriosam repudiandae ad in.
					</div>
				</div>
			</div>


			<!-- Datos de la madre. -->
			<div class="accordion-item">
				<h2 class="accordion-header" id="flush-headingThree">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
						Datos de la madre.
					</button>
				</h2>
				<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#datos_inscripcion">
					<div class="accordion-body">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ex recusandae quisquam dolor consequatur iure eaque tenetur debitis architecto optio harum labore alias, itaque natus. Expedita laboriosam repudiandae ad in.
					</div>
				</div>
			</div>


			<!-- Datos del padre. -->
			<div class="accordion-item">
				<h2 class="accordion-header" id="flush-headingThree">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
						Datos del padre.
					</button>
				</h2>
				<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#datos_inscripcion">
					<div class="accordion-body">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ex recusandae quisquam dolor consequatur iure eaque tenetur debitis architecto optio harum labore alias, itaque natus. Expedita laboriosam repudiandae ad in.
					</div>
				</div>
			</div>

		</div>