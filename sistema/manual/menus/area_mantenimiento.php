
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	
	<!-- Respaldos -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Respaldado de la base de datos del sistema."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=f1" class="link-dark text-decoration-none stretched-link link-menu">Respaldos.</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Restauraciones -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Restauración de los datos a un punto anterior."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-export fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=f2" class="link-dark text-decoration-none stretched-link link-menu">Restauraciones.</a>
				</div>
			</div>
		</div>
	</div>


</section>

<?php endif ?>