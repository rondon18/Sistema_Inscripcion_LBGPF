
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	
	<!-- Estadíticas de estudiantes -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos visibles, funcion y uso."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=d1" class="link-dark text-decoration-none stretched-link link-menu">Estadíticas de estudiantes.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Estadísticas de representantes -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos visibles, funcion y uso."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=d2" class="link-dark text-decoration-none stretched-link link-menu">Estadísticas de representantes.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Estadísticas de padres -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos visibles, funcion y uso."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-chart-column fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=d3" class="link-dark text-decoration-none stretched-link link-menu">Estadísticas de padres.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Área del usuario -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Datos visibles, funcion y uso."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-info-circle fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=d4" class="link-dark text-decoration-none stretched-link link-menu">Acerca de las estadísticas.</a>
				</div>
			</div>
		</div>
	</div>

</section>

<?php endif ?>