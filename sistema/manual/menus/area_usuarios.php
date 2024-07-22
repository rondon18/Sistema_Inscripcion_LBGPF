
<?php if (isset($manual)): ?>
	
<section class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 px-md-5 g-4 mb-4">

	
	<!-- El perfil -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Acerca del módulo del perfil de usuario."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e1" class="link-dark text-decoration-none stretched-link link-menu">El perfil.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Edición del perfil -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Gestión de los datos de su perfil de usuario."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-pen fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e2" class="link-dark text-decoration-none stretched-link link-menu">Edición del perfil.</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Estadísticas -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Eliminación de su usuario."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-minus fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e3" class="link-dark text-decoration-none stretched-link link-menu">Darse de baja.</a>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] == 0): ?>
	<!-- Capacidades como desarrollador -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user-shield fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e4" class="link-dark text-decoration-none stretched-link link-menu">Rol como desarrollador.</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php elseif (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] == 1): ?>
	<!-- Capacidades como administrador -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e5" class="link-dark text-decoration-none stretched-link link-menu">Rol como administrador.</a>
				</div>
			</div>
		</div>
	</div>
		
	<?php elseif (isset($_SESSION['login']) and $_SESSION['datos_login']['privilegios'] >= 2): ?>
	<!-- Capacidades como usuario -->
	<div 
		class="col"
		data-bs-toggle="tooltip" 
		data-bs-placement="top" 
		title="Perfiles, capacidades y acciones posibles."
	>
		<div class="card bg-light shadow hover-grow card-menu">
			<div class="card-body d-flex align-items-center">
				<i class="fa-solid fa-user fa-2xl m-2"></i>
				<div class="px-sm-2 w-100">
					<a href="?con=e6" class="link-dark text-decoration-none stretched-link link-menu">Rol como usuario.</a>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		
	<?php endif ?>

</section>

<?php endif ?>