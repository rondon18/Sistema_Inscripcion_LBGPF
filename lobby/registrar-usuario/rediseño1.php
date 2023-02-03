<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/icono.png">
</head>
<body>
	<main style="max-height: 100vh; overflow-y: auto;">
		<!--Banner-->
		<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-absolute top-0" style="z-index:1000;">
			<div>
				<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
				<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-none d-md-inline-block align-text-top">
			</div>
			<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
		</header>
		
		<div class="container-md py-3 px-xl-5 my-5 mb-lg-0">
		
				<div class="card">
					<!--Datos del representante-->
					<div class="card-header text-center">
						<b class="fs-4">Formulario de registro</b>
					</div>
					
					<div class="card-body">

						<div class="row">

							<!-- Selector de seccion -->
							<div class="col-12 col-lg-3">
								<ul class="nav flex-lg-column nav-pills nav-fill mb-4 gap-2">
									<li class="nav-item">
										<a id="link1" class="nav-link active" href="#">Datos personales</a>
									</li>
									<li class="nav-item">
										<a id="link2" class="nav-link" href="#">Datos de contacto</a>
									</li>
									<li class="nav-item">
										<a id="link3" class="nav-link" href="#">Datos de vivienda</a>
									</li>
									<li class="nav-item">
										<a id="link4" class="nav-link" href="#">Datos económicos</a>
									</li>
									<li class="nav-item">
										<a id="link5" class="nav-link" href="#">Contacto auxiliar</a>
									</li>
								</ul>
							</div>
							
							<!-- Contenedor del formulario -->
							<div class="col-12 col-lg-9 py-0" style="max-height: 60vh; overflow-y: auto;">
								<form id="FormularioRepresentante" action="paso_2.php" method="POST">
									<!-- Seccion de datos personales -->
									<section id="seccion1" class="row">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-person fa-lg me-2"></i>Datos personales</span>
											</div>
										</div>

										<!-- Nombres -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Nombres:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input type="text" class="mb-2 form-control" name="Primer_Nombre_R" id="Primer_Nombre_R" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
											<div class="col-12 col-lg-5">
												<input type="text" class="mb-2 form-control" name="Segundo_Nombre_R" id="Segundo_Nombre_R" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
										</div>

										<!-- Apellidos -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label for="" class="form-label">Apellidos:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input type="text" class="mb-2 form-control" name="Primer_Apellido_R" id="Primer_Apellido_R" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
											<div class="col-12 col-lg-5">
												<input type="text" class="mb-2 form-control" name="Segundo_Apellido_R" id="Segundo_Apellido_R" placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
										</div>

										<!-- Cédula -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Cédula:</label>
											</div>

											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<select id="NacioNalidad_R" class="form-select" name="NacioNalidad_R" required>
														<option selected disabled value="">Nacionalidad</option>
														<option value="V">V</option>
														<option value="E">E</option>
													</select>
													<input type="text" class="form-control w-auto" name="Cédula_R" id="Cédula_R" maxlength="8" minlength="7" required placeholder="Número de cédula">
												</div>
											</div>
										</div>
										
										<!-- Genero y estado civil -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<p>Género:</p>		
											</div>
											
											<div class="col-12 col-lg-3">
												<div class="form-check form-check-inline">
													<label for="Genero_F" class="form-label">F</label>
													<input id="Genero_F" class="form-check-input" type="radio" name="Género_R" value="F" required>
												</div>

												<div class="form-check form-check-inline">
													<label for="Genero_M" class="form-label">M</label>
													<input id="Genero_M" class="form-check-input" type="radio" name="Género_R" value="M" required>
												</div>
											</div>

											<div class="col-12 col-lg-2">
												<label class="form-label">Estado civil:</label>
											</div>

											<div class="col-12 col-lg-5">
												<select class="form-select" name="Estado_Civil_R" required>
													<option selected disabled value="">Seleccione una opción</option>
													<option value="Soltero(a)">Soltero(a)</option>
													<option value="Casado(a)">Casado(a)</option>
													<option value="Divorciado(a)">Divorciado(a)</option>
													<option value="Viudo(a)">Viudo(a)</option>
												</select>
											</div>
										</div>
										
										<!-- Fecha y lugar de nacimiento -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">Fecha de nacimiento:</label>		
												<input type="date" class="mb-2 form-control" name="Fecha_Nacimiento_R" id="Fecha_Nacimiento_R" min="1922-01-01" max="2004-01-01" title="Debe tener al menos 18 años." required>
											</div>	
											
											<div class="col-12 col-lg-8">
												<label class="form-label">Lugar de nacimiento:</label>
												<input type="text" class="mb-2 form-control" name="Lugar_Nacimiento_R" id="Lugar_Nacimiento_R" maxlength="20" minlength="3" required>
											</div>	
										</div>

										<!-- Grado de instrucción -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span>Grado de instrucción:</span>
											</div>
											<div class="col-12 col-lg-8">
												<div class="form-check form-check-inline">
													<label for="Grado_Primaria" class="form-label">Primaria </label>
													<input id="Grado_Primaria" class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Primaria" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Grado_Bachillerato" class="form-label">Bachillerato </label>
													<input id="Grado_Bachillerato" class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Bachillerato" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Grado_Universitario" class="form-label">Universitario </label>
													<input id="Grado_Universitario" class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Universitario" required>
												</div>
											</div>
										</div>
										
										<!-- Vinculo con el estudiante -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">Vinculo con el estudiante:</label>
											</div>
											<div class="col-12 col-lg-8">
												<datalist id="vinculos">
													<option value="Madre">
													<option value="Padre">
													<option value="Tía">
													<option value="Tío">
													<option value="Abuela">
													<option value="Abuelo">
												</datalist>
												<input id="Vinculo_R" class="mb-2 form-control" name="Vinculo_R" type="text" minlength="3" maxlength="15" placeholder="Madre, padre, tíos o abuelos, etc." required>
											</div>
										</div>

										<!-- Carnet de la patria -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<span class="form-label">Carnet de la patria:</span>	
											</div>
											
											<div class="col-12 col-lg-4">
												<input class="mb-2 form-control" type="text" name="Código_Carnet_Patria_R" id="Código_Carnet_Patria_R" placeholder="Código" pattern="[0-9]+" minlength="10" maxlength="10">
											</div>
											
											<div class="col-12 col-lg-4">
												<input class="mb-2 form-control" type="text" name="Serial_Carnet_Patria_R" id="Serial_Carnet_Patria_R" placeholder="Serial" pattern="[0-9]+" minlength="10" maxlength="10">
											</div>

											<div class="col-12 col-lg-12">
												<span class="form-text">En caso de no tener, dejar vacio.</span>
											</div>
										</div>
									</section>


									<!-- Seccion de datos de contacto -->
									<section id="seccion2" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-address-book fa-lg me-2"></i>Datos de contacto</span>
											</div>
										</div>

										<!-- Dirección de residencia -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<label class="form-label">Dirección de residencia:</label>
												<textarea id="Dirección_R" class="mb-2 form-control" name="Dirección_R" rows="2" minlength="10" required style="resize: none;"></textarea>
											</div>
										</div>

										<!-- Teléfonos -->
										<div class="row mb-4">
											<!-- sugerencias de prefijo -->
											<datalist id="prefijos">
													<!--Moviles-->
													<option value="0412">
													<option value="0414">
													<option value="0416">
													<option value="0424">
													<option value="0426">

													<!--Fijos-->
													<option value="0271">
													<option value="0274">
													<option value="0275">
												</optgroup>
											</datalist>

											<div class="col-12 col-lg-12">
												<label class="form-label mb-3">Números de teléfono:</label>
											</div>

											<!-- Teléfono principal -->
											<div class="col-12 col-lg-2">
												<label class="form-label">Principal:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2 mb-2">
													<input id="Prefijo_Principal_R" class="mb-2 form-control mb-2 form-control-sm" type="text" name="Prefijo_Principal_R"  list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo" required>

													<input id="Teléfono_Principal_R" class="mb-2 form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Principal_R" placeholder="Número" pattern="[0-9]+" maxlength="12" minlength="7" required>
												</div>
											</div>

											<!-- Teléfono secundario -->
											<div class="col-12 col-lg-2">
												<label class="form-label">Secundario:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2 mb-2">
													<input id="Prefijo_Secundario_R" class="mb-2 form-control mb-2 form-control-sm" type="text" name="Prefijo_Secundario_R"  list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo">

													<input id="Teléfono_Secundario_R" class="mb-2 form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Secundario_R" placeholder="Número" pattern="[0-9]+" maxlength="12" minlength="7">
												</div>
											</div>

											<!-- Teléfono auxiliar -->
											<div class="col-12 col-lg-2">
												<label class="form-label">Auxiliar:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2 mb-2">
													<input id="Prefijo_Auxiliar_R" class="mb-2 form-control mb-2 form-control-sm" type="text" name="Prefijo_Auxiliar_R"  list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo">

													<input id="Teléfono_Auxiliar_R" class="mb-2 form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Auxiliar_R" placeholder="Número" pattern="[0-9]+" maxlength="12" minlength="7">
												</div>
											</div>

											<span class="form-text">En el caso de teléfonos extranjeros, ingresar el código en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (México)</span>
										</div>

										<!-- Dirección de residencia -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label">Correo electrónico:</label>
											</div>
											<div class="col-12 col-lg-9">
												<input id="Correo_electrónico_R" class="mb-2 form-control" type="email" name="Correo_electrónico_R"  minlength="15" required>
											</div>
										</div>
									</section>


									<!-- Seccion de datos de vivienda -->
									<section id="seccion3" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-house-circle-check fa-lg me-2"></i>Datos de vivienda</span>
											</div>
										</div>

										<!-- Condiciones de la vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">Condiciones de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="form-check form-check-inline">
													<label for="Cond_V_Buenas" class="form-label">Buena </label>
													<input id="Cond_V_Buenas" class="form-check-input" type="radio" name="Condición_vivienda_R" value="Buena" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Cond_V_Regular" class="form-label">Regular </label>
													<input id="Cond_V_Regular" class="form-check-input" type="radio" name="Condición_vivienda_R" value="Regular" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Cond_V_Mala" class="form-label">Mala </label>
													<input id="Cond_V_Mala" class="form-check-input" type="radio" name="Condición_vivienda_R" value="Mala" required>
												</div>
											</div>
										</div>

										<!-- Tipo de vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label">Tipo de vivienda:</label>
											</div>
											<div class="col-12 col-lg-9">
												<div class="form-check form-check-inline">
													<label for="V_Casa" class="form-label">Casa </label>
													<input id="V_Casa" class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Casa" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="V_Apart" class="form-label">Apartamento </label>
													<input id="V_Apart" class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Apartamento" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="V_Rancho" class="form-label">Rancho </label>
													<input id="V_Rancho" class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Rancho" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="V_Quinta" class="form-label">Quinta </label>
													<input id="V_Quinta" class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Quinta" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="V_Hab" class="form-label">Habitación </label>
													<input id="V_Hab" class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Habitación" required>
												</div>
											</div>
										</div>

										<!-- Tenencia de la vivienda -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">Tenencia de la vivienda:</label>
											</div>
											<div class="col-12 col-lg-8">
												<div class="input-group mb-2">
													<select class="form-select" name="Tenencia_vivienda_R" required>
														<option selected disabled value="">Seleccione una opción</option>
														<option value="Propia">Propia</option>
														<option value="Alquilada">Alquilada</option>
														<option value="Prestada">Prestada</option>
														<option value="Otro">Otro</option>
													</select>
													<input class="form-control w-auto" type="text" name="Tenencia_vivienda_R_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
												</div>
											</div>
										</div>
									</section>


									<!-- Seccion de datos económicos -->
									<section id="seccion4" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-piggy-bank fa-lg me-2"></i>Datos económicos</span>
											</div>
										</div>

										<!-- Banco -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Banco:</label>
											</div>
											<div class="col-12 col-lg-10">
												<select class="form-select" name="Banco" required>
														<option selected disabled value="">Seleccione una opción</option>
														<option value="Banco de Venezuela S.A.">Banco de Venezuela S.A.</option>
														<option value="Venezolano de Crédito S.A.">Venezolano de Crédito S.A.</option>
														<option value="Banco Mercantil, C.A">Banco Mercantil, C.A</option>
														<option value="Banco Provincial, S.A.">Banco Provincial, S.A.</option>
														<option value="Bancaribe C.A.">Bancaribe C.A.</option>
														<option value="Banco Exterior C.A.">Banco Exterior C.A.</option>
														<option value="Banco Occidental de Descuento, C.A.">Banco Occidental de Descuento, C.A.</option>
														<option value="Banco Caroní C.A.">Banco Caroní C.A.</option>
														<option value="Banesco S.A.C.A.">Banesco S.A.C.A.</option>
														<option value="Banco Sofitasa C.A.">Banco Sofitasa C.A.</option>
														<option value="Banco Plaza C.A.">Banco Plaza C.A.</option>
														<option value="Banco de la Gente Emprendedora C.A. - Bangente">Banco de la Gente Emprendedora C.A. - Bangente</option>
														<option value="Banco del Pueblo Soberano, C.A.">Banco del Pueblo Soberano, C.A.</option>
														<option value="Banco Fondo Común C.A.">Banco Fondo Común C.A.</option>
														<option value="100% Banco, C.A.">100% Banco, C.A.</option>
														<option value="DelSur, C.A.">DelSur, C.A.</option>
														<option value="Banco del Tesoro, C.A.">Banco del Tesoro, C.A.</option>
														<option value="Banco Agrícola de Venezuela, C.A">Banco Agrícola de Venezuela, C.A</option>
														<option value="Bancrecer, S.A.">Bancrecer, S.A.</option>
														<option value="Mi Banco C.A.">Mi Banco C.A.</option>
														<option value="Banco Activo, C.A.">Banco Activo, C.A.</option>
														<option value="Bancamiga, C.A.">Bancamiga, C.A.</option>
														<option value="Banco Internacional de Desarrollo, C.A.">Banco Internacional de Desarrollo, C.A.</option>
														<option value="Banplus, C.A.">Banplus, C.A.</option>
														<option value="Banco Bicentenario C.A.">Banco Bicentenario C.A.</option>
														<option value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB">Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
														<option value="Citibank N.A.">Citibank N.A.</option>
														<option value="Banco Nacional de Crédito, C.A.">Banco Nacional de Crédito, C.A.</option>
														<option value="Instituto Municipal de Crédito Popular">Instituto Municipal de Crédito Popular</option>
													</select>
											</div>
										</div>

										<!-- Tipo de cuenta -->
										<div class="row mb-4">
											<div class="col-12 col-lg-auto">
												<label class="form-label">Tipo de cuenta:</label>
											</div>
											<div class="col-12 col-lg-auto">
												<div class="form-check form-check-inline">
													<label for="Cta_Ahorro" class="form-label">Ahorro </label>
													<input id="Cta_Ahorro" class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Cta_Corriente" class="form-label">Corriente </label>
													<input id="Cta_Corriente" class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required>
												</div>
											</div>
										</div>

										<!-- Número de cuenta -->
										<div class="row mb-4">
											<div class="col-12 col-lg-3">
												<label class="form-label">Número de cuenta:</label>
											</div>
											<div class="col-12 col-lg-9">
											 	<input id="Nro_Cuenta" class="mb-2 form-control" type="text" name="Nro_Cuenta" pattern="[0-9]{20}" maxlength="20" title="Una cuenta bancaria valida consta de 20 digitos" placeholder="XXXX-XXXXXXXXXXXXXX" required>
											</div>
											<span class="form-text">En caso de no recordarlo, rellenar con ceros.</span>
										</div>

										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-piggy-bank fa-lg me-2"></i>Datos laborales</span>
											</div>
										</div>

										<!-- Representante trabaja -->
										<div class="row mb-4">
											<div class="col-12 col-lg-auto">
												<label class="form-label">Trabaja:</label>
											</div>
											<div class="col-12 col-lg-auto">
												<div class="form-check form-check-inline">
													<label for="Trabaja_S" class="form-label">Si </label>
													<input id="Trabaja_S" class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required>
												</div>
												<div class="form-check form-check-inline">
													<label for="Trabaja_N" class="form-label">No </label>
													<input id="Trabaja_N" class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required>
												</div>
											</div>
											<span class="form-text">En caso de marcar NO, se inhabilitaran los campos y se establecerá como desempleado.</span>	
										</div>

										<!-- Campos si el representante trabaja -->
										<fieldset id="Datos_Trabajo">
											<!-- Cargo que ocupa -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Cargo que ocupa:</label>
												</div>
												<div class="col-12 col-lg-9">
													<input id="Empleo_R" class="mb-2 form-control" type="text" name="Empleo_R" maxlength="60" minlength="3">
												</div>
											</div>

											<!-- Teléfono del trabajo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-3">
													<label class="form-label">Teléfono del trabajo:</label>
												</div>
												<div class="col-12 col-lg-9">
													<div class="input-group mb-2">
														<input id="Prefijo_Trabajo_R" class="mb-2 form-control mb-2 form-control-sm" type="text" name="Prefijo_Trabajo_R"  list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo">

														<input id="Teléfono_Trabajo_R" class="mb-2 form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Trabajo_R" placeholder="Número" pattern="[0-9]+" maxlength="12" minlength="7">
													</div>
												</div>
												<span class="form-text">En el caso de teléfonos extranjeros, ingresar el código en el campo de prefijo rellenando con ceros a la izquierda. Ejemplo: 0052 (México)</span>
											</div>

											<!-- Lugar del trabajo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-12">
													<label class="form-label">Lugar del trabajo:</label>
													<textarea id="Lugar_Trabajo_R" class="mb-2 form-control" name="Lugar_Trabajo_R" rows="2" maxlength="180" minlength="3" style="resize: none;"></textarea>
												</div>
											</div>

											<!-- Remuneración y tipo -->
											<div class="row mb-4">
												<div class="col-12 col-lg-6">
													<label class="form-label">Remuneración:</label>
													<input id="Remuneración_R" class="mb-2 form-control text-end" type="number" name="Remuneración_R"  placeholder="Ingrese un numero..." min="0" step="0.5">
													<span class="form-text">Remuneración aproximada en sueldos minimos.</span>
												</div>
												<div class="col-12 col-lg-6">
													<label class="form-label">Tipo de remuneración:</label>
													<select class="form-select" name="Tipo_Remuneración_R">
														<option value="Diaria">Diaria</option>
														<option value="Semanal">Semanal</option>
														<option value="Quincenal">Quincenal</option>
														<option value="Mensual">Mensual</option>
													</select>
												</div>
											</div>
										</fieldset>
									</section>


									<!-- Datos del contacto auxiliar -->
									<section id="seccion5" class="row" style="display:none;">
										<!-- Titulo de la seccion -->
										<div class="row mb-4">
											<div class="col-12 col-lg-12">
												<span class="h5"><i class="fa-solid fa-handshake-angle fa-lg me-2"></i>Contacto auxiliar</span>
											</div>
										</div>

										<!-- Nombres del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Nombres:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Primer_Nombre_Aux" class="mb-2 form-control" type="text" name="Primer_Nombre_Aux" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Segundo_Nombre_Aux" class="mb-2 form-control" type="text" name="Segundo_Nombre_Aux" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
										</div>

										<!-- Apellidos del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Apellidos:</label>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Primer_Apellido_Aux" class="mb-2 form-control" type="text" name="Primer_Apellido_Aux"  placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
											<div class="col-12 col-lg-5">
												<input id="Segundo_Apellido_Aux" class="mb-2 form-control" type="text" name="Segundo_Apellido_Aux"  placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
											</div>
										</div>

										<!-- Teléfono del contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-2">
												<label class="form-label">Teléfono:</label>
											</div>
											<div class="col-12 col-lg-10">
												<div class="input-group mb-2">
													<input id="Prefijo_Principal_Aux" class="mb-2 form-control mb-2 form-control-sm" type="text" name="Prefijo_Principal_Aux" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo" required>
													<input id="Télefono_Principal_Aux" class="mb-2 form-control mb-2 form-control-sm w-auto" type="tel" name="Teléfono_Principal_Aux" placeholder="Número" maxlength="7" minlength="7" required>
												</div>
											</div>
											<span class="form-text">El número de teléfono del contacto auxiliar debe ser local.</span>
										</div>

										<!-- Relación del representante con el contacto auxiliar -->
										<div class="row mb-4">
											<div class="col-12 col-lg-4">
												<label class="form-label">Relación con la persona:</label>
											</div>
											<div class="col-12 col-lg-8">
												<input id="Relación_Auxiliar" class="mb-2 form-control" type="text" name="Relación_Auxiliar" placeholder="Vecino, familiar, etc." maxlength="12" minlength="3" required>
											</div>
										</div>


									</section>
								</form>
							</div>

						</div>
					</div>
					<div class="card-footer">
						<input type="hidden" name="Datos_Representante" value="Datos_Representante">
						<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
						<button id="B_enviar" class="btn btn-primary" type="button">Guardar y continuar</button>
					</div>		
				</div>
			
		</div>

		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0" style="z-index: 100;">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php'; ?>
	</main>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="../../js/validaciones_inscripcion.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
