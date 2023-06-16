
<?php if (isset($manual)): ?>
	
<section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">

	
	<!-- Version del sistema -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Version actual del sistema y capacidades."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-computer fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Informacion del sistema.</h6>
					<a href="?con=g1" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Sobre los desarrolladores -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Sobre los autores del sistema."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-users fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Sobre los desarrolladores.</h6>
					<a href="?con=g2" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['login'])): ?>
	<!-- Descargar el manual -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Presione para acceder al manual escrito del sistema."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-pdf fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Visualizar/Descargar el manual.</h6>
					<a href="?con=g3" target="_blank" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php endif ?>


	

</section>

<?php endif ?>