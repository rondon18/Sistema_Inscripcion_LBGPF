<!-- Button trigger modal -->
<button type="button" class="btn btn-primary position-fixed bottom-0 end-0 m-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="Ayuda">
  <i class="fas fa-question-circle fa-lg"></i>
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
				<div class="accordion" id="accordionExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingLogin">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin">
				       <i class="fas fa-key fa-lg me-2"></i> Iniciar Sesión
				      </button>
				    </h2>
				    <div id="collapseLogin" class="accordion-collapse collapse" aria-labelledby="headingLogin" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        <strong>Iniciar Sesión.</strong> Si eres un usuario ya registrado solo debes ingresar tu número de cédula, la clave que hayas colocado al momento del registro y hacer click en el botón "Ingresar". Por otro lado si eres un nuevo usuario debes hacer click en el botón "Registrarse", al hacerlo será enviado a una página donde debe llenar los datos solicicitados en cada pestaña, al completarlos debe hacer click al botón "Guardar y Continuar" de ahí será dirigido a la página para Ingresar al Sistema nuevamente donde podrá ingresar con sus datos.
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
				        <strong>Registrar Estudiante.</strong> Para poder registrar un estudiante primero debe hacer click en el botón "Registrar Estudiante" de ahí será llevado al formulario donde primero deberá escoger su vínculo con el estudiante a inscribir, continuamente debe llenar todos los datos solicitados sobre el estudiante. Al finalizar haga click en el botón "Registrar Estudiante" y tendrá ya registrado a un estudiante. Importante recordar que debe ingresar todos los datos solicitados.
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
				        <strong>Ver Perfil.</strong> Esta sección le permite al usuario del sistema visualizar los datos de su perfil de usuario. Asímismo en esta sección se encuentra el botón "Editar perfil" el cual le da la opción de modificar los datos en su perfil.
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
				        <strong>Gestionar Estudiante.</strong> La sección de gestionar estudiantes le permitirá consultar a los estudiantes que ha registrado bajo su usuario.
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
				        <strong>Gestionar Registros.</strong> Esta sección le permite al administrador consultar todos los registros en la base de datos.
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
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
