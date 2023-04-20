
<?php if (isset($manual)): ?>
	
<section class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

	
	<!-- El perfil -->
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
					<h6 class="card-title mb-2">El perfil.</h6>
					<a href="?con=e1" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Edición del perfil -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-pen fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Edición del perfil.</h6>
					<a href="?con=e2" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Estadísticas -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-minus fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Darse de baja.</h6>
					<a href="?con=e3" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] == 0): ?>
	<!-- Capacidades como desarrollador -->
	<div 
		class="col px-2 px-md-4 py-2"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-shield fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Rol como desarrollador.</h6>
					<a href="?con=e4" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php elseif (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] == 1): ?>
	<!-- Capacidades como administrador -->
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
					<h6 class="card-title mb-2">Rol como administrador.</h6>
					<a href="?con=e5" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php elseif (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] >= 2): ?>
	<!-- Capacidades como usuario -->
	<div class="col px-2 px-md-4 py-2">
		<div class="card bg-light">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user fa-2xl m-2"></i>
				<div class="px-2 w-100">
					<h6 class="card-title mb-2">Rol como usuario.</h6>
					<a href="?con=e6" class="btn btn-primary w-100 btn-sm stretched-link">Consultar</a>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		
	<?php endif ?>

</section>

<?php endif ?>