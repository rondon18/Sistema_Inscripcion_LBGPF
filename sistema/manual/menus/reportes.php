
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	<!-- Reporte de estudiantes -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos y opciones sobre el reporte."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=c1" class="link-dark text-decoration-none stretched-link link-menu">Reporte de estudiantes.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Reporte de representantes -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos y opciones sobre el reporte."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-export fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=c2" class="link-dark text-decoration-none stretched-link link-menu">Reporte de representantes.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Reporte de padres -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos y opciones sobre el reporte."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=c3" class="link-dark text-decoration-none stretched-link link-menu">Reporte de padres.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Acerca de los reportes -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Información para abrir los reportes."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-info-circle fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=c4" class="link-dark text-decoration-none stretched-link link-menu">Acerca de los reportes.</a>
				</div>
			</div>
		</div>
	</div>

</section>

<?php endif ?>