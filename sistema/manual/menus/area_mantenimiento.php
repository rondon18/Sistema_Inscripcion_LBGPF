
<?php if (isset($manual)): ?>
	
<section class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">

	
	<!-- Respaldos -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Respaldado de la base de datos del sistema."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Respaldos.</h6>
					<a href="?con=f1" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>


	<!-- Restauraciones -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Restauración de los datos a un punto anterior."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-export fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Restauraciones.</h6>
					<a href="?con=f2" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>


</section>

<?php endif ?>