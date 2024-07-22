
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	
	<!-- Version del sistema -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Version actual del sistema y capacidades."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-computer fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=g1" class="link-dark text-decoration-none stretched-link link-menu">Informacion del sistema.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Sobre los desarrolladores -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Sobre los autores del sistema."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-users fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=g2" class="link-dark text-decoration-none stretched-link link-menu">Sobre los desarrolladores.</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['login'])): ?>
	<!-- Descargar el manual -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Presione para acceder al manual escrito del sistema."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-pdf fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=g3" target="_blank" class="link-dark text-decoration-none stretched-link link-menu">Visualizar/Descargar el manual.</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php endif ?>


	

</section>

<?php endif ?>