<!-- Botón de ayuda -->
<button id="boton-ayuda" type="button" class="btn btn-primary position-fixed bottom-0 end-0 m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="Ayuda" style="z-index: 1000;">
	<i class="fas fa-question-circle fa-lg"></i>
	<span	class="d-none d-lg-inline ms-1">Ayuda</span>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	
	<div class="modal-dialog modal-lg">
	
		<div class="modal-content">
	
			<div class="modal-header">
	
				<h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-question-circle fa-xl"></i> Ayuda</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	
			</div>
	
			<div class="modal-body">
	
				<p>Bienvenido(a) a la sección de ayuda, ¿Qué desea consultar?.</p>
	
				<div class="accordion mb-4" id="accordionExample">
	
					<div class="accordion-item">
	
						<h2 class="accordion-header" id="headingLogin">
	
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin">
		
								<i class="fas fa-key fa-lg me-2"></i> Iniciar Sesión
		
							</button>
	
						</h2>
	
						<div id="collapseLogin" class="accordion-collapse collapse" aria-labelledby="headingLogin" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
						
								<strong>Iniciar Sesión.</strong> 
								Si eres un usuario ya registrado solo debes ingresar tu número de cédula, la clave que hayas colocado al momento del registro y hacer click en el botón "Ingresar". Por otro lado si eres un nuevo usuario debes hacer click en el botón "Registrarse", al hacerlo será enviado a una página donde debe llenar los datos solicicitados en cada pestaña, al completarlos debe hacer click al botón "Guardar y Continuar" de ahí será dirigido a la página para Ingresar al Sistema nuevamente donde podrá ingresar con sus datos.
						
							</div>
						
						</div>
					
					</div>
					
					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingTwo">
					
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						
								<i class="fa-solid fa-user-plus fa-lg me-2"></i> Registrar estudiante
						
							</button>
						
						</h2>
						
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
								
								<strong>Registrar Estudiante.</strong> 
								Para poder registrar un estudiante primero debe hacer click en el botón "Registrar Estudiante" de ahí será llevado al formulario donde primero deberá escoger su vínculo con el estudiante a inscribir, continuamente debe llenar todos los datos solicitados sobre el estudiante. Al finalizar haga click en el botón "Registrar Estudiante" y tendrá ya registrado a un estudiante. Importante recordar que debe ingresar todos los datos solicitados.
							
							</div>
						
						</div>
					
					</div>
					
					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingProfile">
					
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
							
								<i class="fa-solid fa-address-card fa-lg me-2"></i>Ver Perfil
							
							</button>
						
						</h2>
						
						<div id="collapseProfile" class="accordion-collapse collapse" aria-labelledby="headingProfile" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
					
								<strong>Ver Perfil.</strong> 
								Esta sección le permite al usuario del sistema visualizar los datos de su perfil de usuario. Asímismo en esta sección se encuentra el botón "Editar perfil" el cual le da la opción de modificar los datos en su perfil.
					
							</div>
					
						</div>
					
					</div>
					
					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingThree">
						
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						
								<i class="fa-solid fa-magnifying-glass fa-lg me-2"></i>Gestionar estudiante
						
							</button>
						
						</h2>
						
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
						
								<strong>Gestionar Estudiante.</strong> 
								La sección de gestionar estudiantes le permitirá consultar a los estudiantes que ha registrado bajo su usuario.
						
							</div>
					
						</div>
					
					</div>
					
					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingRegistry">
						
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRegistry" aria-expanded="false" aria-controls="collapseRegistry">
						
								<i class="fa-solid fa-magnifying-glass fa-lg me-2"></i>Gestionar Registros
						
							</button>
						
						</h2>
						
						<div id="collapseRegistry" class="accordion-collapse collapse" aria-labelledby="headingRegistry" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">

								<strong>Gestionar Registros.</strong> 
								Esta sección le permite al administrador consultar todos los registros en la base de datos.
							
							</div>

						</div>
					
					</div>
					
					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingMaintenance">
							
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMaintenance" aria-expanded="false" aria-controls="collapseMaintenance">
							
								<i class="fa-solid fa-database fa-lg me-2"></i>Funciones de mantenimiento
							
							</button>
						
						</h2>
						
						<div id="collapseMaintenance" class="accordion-collapse collapse" aria-labelledby="headingMaintenance" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
								<strong>Funciones de mantenimiento.</strong> Las funciones de mantenimiento son exclusivas de los administradores del sistema. Estas son "Generar respaldo" y "Restaurar base de datos". La opción "Generar respaldo" le permite descargar un repaldo de todos los registros que se encuentran en la base de datos. por otro lado la opción "Restaurar base de datos" le permite restaurar la base de datos a un punto anterior.
							</div>
						
						</div>
					
					</div>

					<div class="accordion-item">
					
						<h2 class="accordion-header" id="headingForms">
							
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForms" aria-expanded="false" aria-controls="collapseForms">
							
								<i class="fa-solid fa-list fa-lg me-2"></i>Acerca de los formularios
							
							</button>
						
						</h2>
						
						<div id="collapseForms" class="accordion-collapse collapse" aria-labelledby="headingForms" data-bs-parent="#accordionExample">
						
							<div class="accordion-body">
								<strong>Acerca de los formularios.</strong> Los formularios cuentan con una leyenda de color a modo de ayuda visual. La apariencia variará dependiendo de los requisitos del campo.

								<div class="row mt-3">
								
									<div class="col-md-6">
										<label for="ayuda1" class="form-label">Campo opcional</label>
										<input type="text" id="ayuda1" class="form-control mb-2" minlength="5">
								
									</div>
								
									<div class="col-md-6">
								
										<label for="ayuda2" class="form-label">Campo requerido (Vacio/Invalido)</label>
										<input type="text" id="ayuda2" required class="form-control mb-2">
								
									</div>

									<div class="col-md-6">
								
										<label for="ayuda3" class="form-label">Campo requerido valido</label>
										<input type="text" id="ayuda3" required class="form-control mb-2" value="texto de muestra....">
								
									</div>
								
									<div class="col-md-6">
								
										<label for="ayuda4" class="form-label">Aplica a selectores</label>

										<div class="row">
								
											<div class="col">
								
												<select id="ayuda4" class="form-select" required>
													<option selected value="">Ejemplo invalido</option>
													<option>Ejemplo valido</option>
												</select>
								
											</div>
								
											<div class="col">
								
												<select id="ayuda4" class="form-select" required>
													<option value="">Ejemplo invalido</option>
													<option selected>Ejemplo valido</option>
												</select>

											</div>
										
										</div>

									</div>
									
									<div class="col-md-6">
										
										<label for="ayuda5" class="form-label">Aplica a campos grandes</label>

										<div class="row mb-2">
											
											<div class="col">
												
												<textarea id="ayuda5" rows="2" class="form-control"></textarea>
												
											</div>
											
											<div class="col">
												
												<textarea id="ayuda5" rows="2" class="form-control" required minlength="5">Texto de ejemplo</textarea>
												
											</div>
										
										</div>

									</div>

									<p>Formulario de muestra, no tiene funcionalidad.</p>
							
								</div>	
								
							</div>
						
						</div>
					
					</div>
				
				</div>

				<span class="mb-0">Para más información, consulte el manual.</span>
				
				<a href="/Sistema_Inscripcion_LBGPF/docs/Manual_de_usuario.pdf" target="_blank">
					<i class="fas fa-download fa-lg me-2"></i>
					Descargar manual de usuario
				</a>

			</div>

			<div class="modal-footer">
				
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			
			</div>

		</div>

	</div>

</div>