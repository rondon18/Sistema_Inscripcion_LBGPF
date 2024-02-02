
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	<!-- Inicio de sesión -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Pantalla de inicio de sesión."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-clipboard-list fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=a1" class="link-dark text-decoration-none stretched-link link-menu">Inicio de sesión.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Inicio auxiliar -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Incio de sesión con preguntas de seguridad."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-file-export fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=a2" class="link-dark text-decoration-none stretched-link link-menu">Inicio auxiliar.</a>
				</div>
			</div>
		</div>
	</div>

</section>

<?php endif ?>