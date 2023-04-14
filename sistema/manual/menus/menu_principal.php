<?php 

	/*

		Este menu viene segmentado con filtros que permiten dar multiples vistas dependiendo de si:
		1. El usuario no ha iniciado sesión (Ve la ayuda del login y recuperación de contraseña)
		
		2. El usuario ha iniciado sesión y es usuario regular (Ve todos los tópicos con algunas 
		restricciones, pero no ve el de mantenimiento).
		
		3. El usuaario ha iniciado sesion y es administrador (Cuenta con todos los tópicos con 
		información completa).

	*/

?>





<?php if (isset($manual)): ?>
	
<section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">



	<!-- Inicio de sesión -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Inicio de sesión e ingreso auxiliar."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-right-to-bracket fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Inicio de sesión.</h6>
					<a href="?con=a" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['login'])): ?>
		
	
		<!-- Gestionar registros -->
		<div 
			class="col px-2 px-md-4 py-2"
			data-bs-toggle="tooltip" 
			data-bs-placement="top" 
			title="Proceso de inscripción, reportes rápidos y planillas."
		>
			<div class="card bg-light">
				<div class="card-body d-flex align-items-center">
					<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
					<div class="px-2 w-100">
						<h6 class="card-title mb-2">Gestionar registros.</h6>
						<a href="?con=b" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
					</div>
				</div>
			</div>
		</div>


		<!-- Reporte -->
		<div 
			class="col px-2 px-md-4 py-2"
			data-bs-toggle="tooltip" 
			data-bs-placement="top" 
			title="Reportes complejos y sus variantes."
		>
			<div class="card bg-light">
				<div class="card-body d-flex align-items-center">
					<i class="fa-solid fa-file-export fa-2xl m-2"></i>
					<div class="px-2 w-100">
						<h6 class="card-title mb-2">Reportes.</h6>
						<a href="?con=c" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
					</div>
				</div>
			</div>
		</div>


		<!-- Estadísticas -->
		<div 
			class="col px-2 px-md-4 py-2"
			data-bs-toggle="tooltip" 
			data-bs-placement="top" 
			title="Filtros e información mostrada."
		>
			<div class="card bg-light">
				<div class="card-body d-flex align-items-center">
					<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
					<div class="px-2 w-100">
						<h6 class="card-title mb-2">Estadística.</h6>
						<a href="?con=d" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Área del usuario -->
		<div 
			class="col px-2 px-md-4 py-2"
			data-bs-toggle="tooltip" 
			data-bs-placement="top" 
			title="Perfiles, capacidades y acciones posibles."
		>
			<div class="card bg-light">
				<div class="card-body d-flex align-items-center">
					<i class="fa-solid fa-user fa-2xl m-2"></i>
					<div class="px-2 w-100">
						<h6 class="card-title mb-2">Área del usuario.</h6>
						<a href="?con=e" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] < 2): ?>

		<!-- Área de mantenimiento -->
		<div 
			class="col px-2 px-md-4 py-2"
			data-bs-toggle="tooltip" 
			data-bs-placement="top" 
			title="Respaldos y restauraciones del sistema."
		>
			<div class="card bg-light">
				<div class="card-body d-flex align-items-center">
					<i class="fa-solid fa-broom fa-2xl m-2"></i>
					<div class="px-2 w-100">
						<h6 class="card-title mb-2">Área de mantenimiento.</h6>
						<a href="?con=f" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
					</div>
				</div>
			</div>
		</div>
		<?php endif ?>
	<?php endif ?>

	<!-- Acerca del sistema -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Versíón actual, info. del sistema y de los autores."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-circle-info fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Acerca del sistema.</h6>
					<a href="?con=g" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>


</section>

<?php endif ?>