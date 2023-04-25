
<?php if (isset($manual)): ?>
	
<section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

	<!-- Inicio de sesión -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Pantalla de inicio de sesión."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Inicio de sesión.</h6>
					<a href="?con=a1" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Inicio auxiliar -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Incio de sesión con preguntas de seguridad."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-export fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Inicio auxiliar.</h6>
					<a href="?con=a2" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

</section>

<?php endif ?>