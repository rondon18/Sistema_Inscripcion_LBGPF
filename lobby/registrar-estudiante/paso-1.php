<?php

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registrar nuevo estudiante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/all.min.css"/>
	<link rel="icon" type="img/png" href="../../img/distintivo-LGPF.png">
</head>
<body>
		<!--Banner-->
		<header class="w-100 bg-white d-flex justify-content-center justify-content-md-between shadow p-1 position-fixed top-0" style="z-index:1000;">
			<div>
				<img src="../../img/banner-gobierno.png" alt=""  height="42" class="d-inline-block align-text-top">
				<img src="../../img/banner-MPPE.png" alt=""  height="42" class="d-inline-block align-text-top">
			</div>
			<img src="../../img/banner-LGPF.png" alt=""  height="42" class="d-inline-block align-text-top">
		</header>
		<form id="FormularioRepresentante" action="paso-2.php" onsubmit="enviar();" method="POST" style="max-width: 600px; margin: 75px auto;">
			<div class="card">
				<!--Datos del representante-->
				<div class="card-header py-3">
					<h3>Formulario de registro representante.</h3>
				</div>
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
					</li>
					<li class="nav-item">
						<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de contacto</a>
					</li>
					<li class="nav-item">
						<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos de vivienda</a>
					</li>
					<li class="nav-item">
						<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Datos económicos</a>
					</li>
					<li class="nav-item">
						<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Contacto auxiliar</a>
					</li>
				</ul>
				<div class="card-body">
					<section id="seccion1">
						<!--Nombres del representante-->
						<h5>Datos personales.</h5>
						<!--Vinculo del representante con el estudiante-->
						<div>
							<label class="form-label">Vinculo con el estudiante:</label>
							<datalist id="vinculos">
								<option value="Madre">
								<option value="Padre">
								<option value="Tía">
								<option value="Tío">
								<option value="Abuela">
								<option value="Abuelo">
							</datalist>
							<input type="text" class="form-control mb-2" id="Vinculo_R" name="Vinculo_R" minlength="3" maxlength="15" placeholder="Madre, padre, tíos o abuelos, etc." list="vinculos" required>
						</div>
						<div>
							<label class="form-label">Nombres:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input type="text" class="form-control mb-2" name="Primer_Nombre_R" id="Primer_Nombre_R" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
								<input type="text" class="form-control mb-2" name="Segundo_Nombre_R" id="Segundo_Nombre_R" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							</div>
						</div>
						<!--Apellidos del representante-->
						<div>
							<label class="form-label">Apellidos:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input type="text" class="form-control mb-2" name="Primer_Apellido_R" id="Primer_Apellido_R" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
								<input type="text" class="form-control mb-2" name="Segundo_Apellido_R" id="Segundo_Apellido_R" placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							</div>
						</div>
						<!--Género del representante-->
						<div>
							<p>Género:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">F </label>
									<input class="form-check-input" type="radio" name="Género_R" value="F" required>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-label">M </label>
									<input class="form-check-input" type="radio" name="Género_R" value="M" required>
								</div>
							</div>

						</div>
						<!--Cédula del representante-->
						<div>
							<label class="form-label">Cédula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<select class="form-select" id="Tipo_Cédula_R" name="Tipo_Cédula_R" required>
									<option selected disabled value="">Tipo de cédula</option>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input type="text" class="form-control w-auto" name="Cédula_R" id="Cédula_R" maxlength="8" minlength="7" required>
							</div>
						</div>
						<!--Fecha de nacimiento del representante-->
						<div>
							<label class="form-label">Fecha de nacimiento:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input type="date" class="form-control mb-2" name="Fecha_Nacimiento_R" id="Fecha_Nacimiento_R" min="<?php echo date('Y')-100 .'-01-01'?>" max="<?php echo date('Y')-18 .'-01-01'?>" title="Debe tener al menos 18 años." required>
						</div>
						<!--Lugar de nacimiento del representante-->
						<div>
							<label class="form-label">Lugar de nacimiento:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input type="text" class="form-control mb-2" name="Lugar_Nacimiento_R" id="Lugar_Nacimiento_R" maxlength="20" minlength="3" required>
						</div>
						<!--Estado civil del representante-->
						<div>
							<label class="form-label">Estado civil:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<select class="form-select mb-2" name="Estado_Civil_R" required>
								<option selected disabled value="">Seleccione una opción</option>
								<option value="Soltero(a)">Soltero(a)</option>
								<option value="Casado(a)">Casado(a)</option>
								<option value="Divorciado(a)">Divorciado(a)</option>
								<option value="Viudo(a)">Viudo(a)</option>
							</select>
						</div>
						<div>
							<span>Grado de instrucción:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Primaria </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Primaria" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Bachillerato </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Bachillerato" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Universitario </label>
									<input class="form-check-input" type="radio" name="Grado_Instrucción_R" value="Universitario" required>
								</div>
							</div>
						</div>
						<!--Carnet de la patria-->
						<div>
							<span class="form-label">Carnet de la patria:</span>
							<div class="input-group mb-2">
								<select class="form-select w-auto" name="Tiene_Carnet_Patria_R" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Si">Si tiene</option>
									<option value="No">No tiene</option>
								</select>
								<input class="form-control" type="text" name="Código_Carnet_Patria_R" id="Código_Carnet_Patria_R" placeholder="Código" pattern="[0-9]+" minlength="10" maxlength="10">
								<input class="form-control" type="text" name="Serial_Carnet_Patria_R" id="Serial_Carnet_Patria_R" placeholder="Serial" pattern="[0-9]+" minlength="10" maxlength="10">
							</div>
						</div>
					</section>
					<section id="seccion2" style="display: none;">
						<h5>Datos de contacto.</h5>
						<div>
							<label class="form-label">Dirección de residencia:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2" name="Dirección_R" id="Dirección_R" rows="4" minlength="10" required></textarea>
						</div>
						<!--Teléfonos del representante-->
						<div>
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

							</datalist>
							<label class="form-label">Teléfonos:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>

							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_R" id="Prefijo_Principal_R" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_R" id="Teléfono_Principal_R" placeholder="Teléfono principal" pattern="[0-9]+" maxlength="7" minlength="7" required>
							</div>

							<!--Teléfono secundario-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Secundario_R" id="Prefijo_Secundario_R" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_R" id="Teléfono_Secundario_R" placeholder="Teléfono secundario" pattern="[0-9]+" maxlength="7" minlength="7">
							</div>

							<!--Teléfono auxiliar-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Auxiliar_R" id="Prefijo_Auxiliar_R" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_R" id="Teléfono_Auxiliar_R" placeholder="Teléfono auxiliar" pattern="[0-9]+" maxlength="7" minlength="7">
							</div>
						</div>
						<!--Correo Electrónico del representante-->
						<div>
							<label class="form-label">Correo electrónico:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input type="email" class="form-control mb-2" name="Correo_electrónico_R" id="Correo_electrónico_R" minlength="15" required>
						</div>
					</section>
					<section id="seccion3" style="display: none;">
						<!--Datos de vivienda del representante-->
						<div>
							<h5>Datos de vivienda.</h5>

							<span>Condiciones de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Buena </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_R" value="Buena" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Regular </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_R" value="Regular" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Mala </label>
									<input class="form-check-input" type="radio" name="Condición_vivienda_R" value="Mala" required>
								</div>
							</div>
							<span>Tipo de vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Casa </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Casa" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Apartamento </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Apartamento" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Rancho </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Rancho" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Quinta </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Quinta" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">Habitación </label>
									<input class="form-check-input" type="radio" name="Tipo_Vivienda_R" value="Habitación" required>
								</div>
							</div>
							<span>Tenencia de la vivienda:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="input-group mb-3">
								<select class="form-select" name="Tenencia_vivienda_R" required>
									<option selected disabled value="">Seleccione una opción</option>
									<option value="Propia">Propia</option>
									<option value="Alquilada">Alquilada</option>
									<option value="Prestada">Prestada</option>
									<option value="Otro">Otro</option>
								</select>
								<input class="form-control" type="text" name="Tenencia_vivienda_R_Otro" maxlength="12" minlength="3" placeholder="En Caso de ser otro, especifique">
							</div>
						</div>
					</section>
					<section id="seccion4" style="display: none;">
						<!--Datos Económicos-->
						<h5>Datos económicos.</h5>
						<div>
							<!--Datos bancarios del representante-->
							<div>
								<label class="form-label">Banco:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
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
								<div>
									<p>Tipo de cuenta:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
									<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
										<div class="form-check form-check-inline">
											<label class="form-label">Ahorro </label>
											<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-label">Corriente </label>
											<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required>
										</div>
									</div>
									<div>
										<label class="form-label">Número de cuenta:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
									 	<input type="text" class="form-control mb-2" name="Nro_Cuenta" id="Nro_Cuenta" pattern="[0-9]{20}" maxlength="20" title="Una cuenta bancaria valida consta de 20 digitos" placeholder="XXXX-XXXXXXXXXXXXXX" required>
									</div>
							</div>
						</div>
						<!--Datos laborales-->
						<h5>Datos laborales.</h5>
						<!--Trabaja el representante-->
						<div>
							<span>Trabaja:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></span>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">Si </label>
									<input class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">No </label>
									<input class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required>
								</div>
							</div>
						</div>
						<!--Cargo que ocupa el representante-->
						<div>
							<label class="form-label">Cargo que ocupa:</label>
							<input class="form-control mb-2" type="text" name="Empleo_R" id="Empleo_R" maxlength="60" minlength="3">
						</div>
						<!--Teléfono del trabajo de representante-->
						<div>
							<label class="form-label">Teléfono del trabajo:</label>
							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Trabajo_R" id="Prefijo_Trabajo_R" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_R" id="Teléfono_Trabajo_R" placeholder="Teléfono principal" pattern="[0-9]+" maxlength="7" minlength="7">
							</div>
						</div>
						<!--Lugar en el que trabaja el representante-->
						<div>
							<label class="form-label">Lugar del trabajo:</label>
							<textarea class="form-control mb-2" name="Lugar_Trabajo_R" id="Lugar_Trabajo_R" maxlength="180" minlength="3"></textarea>
						</div>
						<!--Remuneración_R del trabajo del representante-->
						<div>
							<label class="form-label">Remuneración:</label>
							<div class="input-group mb-2">
								<!--Remuneración_R en base a sueldos minimos del representante-->
								<input class="form-control text-end" type="number" name="Remuneración_R" id="Remuneración_R" placeholder="Ingrese un numero..." min="0" step="1">
								<span class="input-group-text mb-2-text">Salarios mínimos</span required>
								<!--Tipo de Remuneración_R del representante-->
								<select class="form-select" name="Tipo_Remuneración_R">
									<option value="Diaria">Remuneración diaria</option>
									<option value="Semanal">Remuneración semanal</option>
									<option value="Quincenal">Remuneración quincenal</option>
									<option value="Mensual">Remuneración mensual</option>
								</select>
							</div>
						</div>
					</section>
					<section id="seccion5" style="display: none;">
						<h5>Datos del contacto auxiliar.</h5>
						<!--Nombres del contacto auxiliar-->
						<div>
							<label class="form-label">Nombres:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input type="text" class="form-control mb-2" name="Primer_Nombre_Aux" id="Primer_Nombre_Aux" placeholder="Primer nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
								<input type="text" class="form-control mb-2" name="Segundo_Nombre_Aux" id="Segundo_Nombre_Aux" placeholder="Segundo nombre" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							</div>
						</div>

						<!--Apellidos del contacto auxiliar-->
						<div>
							<label class="form-label">Apellidos:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<input type="text" class="form-control mb-2" name="Primer_Apellido_Aux" id="Primer_Apellido_Aux" placeholder="Primer apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
								<input type="text" class="form-control mb-2" name="Segundo_Apellido_Aux" id="Segundo_Apellido_Aux" placeholder="Segundo apellido" minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Debe ingresar solo letras" required>
							</div>
						</div>
						<!--Género del contacto auxiliar-->
<!-- 						<div>
							<p>Género:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></p>
							<div class="pt-2 px-2 pb-0 bg-light border rounded mb-3">
								<div class="form-check form-check-inline">
									<label class="form-label">F </label>
									<input class="form-check-input" type="radio" name="Género_Aux" value="F" required>
								</div>
								<div class="form-check form-check-inline">
									<label class="form-label">M </label>
									<input class="form-check-input" type="radio" name="Género_Aux" value="M" required>
								</div>
							</div>
						</div> -->
						<!--Cédula del contacto auxiliar-->
<!-- 						<div>
							<label class="form-label">Cédula:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<div class="input-group mb-2">
								<select class="form-select" name="Tipo_Cédula_Aux" required>
									<option selected disabled value="">Tipo de cédula</option>
									<option value="V">V</option>
									<option value="E">E</option>
								</select>
								<input type="text" class="form-control w-auto" name="Cédula_Aux" id="Cédula_Aux" placeholder="Cédula de identidad" pattern="[0-9]+" maxlength="8" minlength="7" required>
						</div> -->
						<!--Correo Electrónico del contacto auxiliar-->
<!-- 						<div>
							<label class="form-label">Correo electrónico:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input type="email" class="form-control mb-2" name="Correo_electrónico_Aux" id="Correo_electrónico_Aux" minlength="10" required>
						</div> -->
						<!--Teléfonos del contacto auxiliar-->
						<div>
							<label class="form-label">Teléfonos:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<!--Teléfono principal-->
							<div class="input-group mb-2">
								<!--Prefijo-->
								<input class="form-control" type="text" name="Prefijo_Principal_Aux" id="Prefijo_Principal_Aux" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								<!--Número-->
								<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Aux" id="Télefono_Principal_Aux" placeholder="Principal" maxlength="7" minlength="7" required>
							</div>

							<!--Teléfono secundario-->
<!-- 							<div class="input-group mb-2">
								
								<input class="form-control" type="text" name="Prefijo_Secundario_Aux" id="Prefijo_Secundario_Aux" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								
								<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Aux" id="Télefono_Secundario_Aux" placeholder="Auxiliar" maxlength="7" minlength="7" required>
							</div> -->

							<!--Teléfono auxiliar-->
<!-- 							<div class="input-group mb-2">
								
								<input class="form-control" type="text" name="Prefijo_Auxiliar_Aux" id="Prefijo_Auxiliar_Aux" list="prefijos" pattern="[0-9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos" required>
								
								<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_Aux" id="Teléfono_Auxiliar_Aux" placeholder="Auxiliar" maxlength="7" minlength="7" required>
							</div> -->
						</div>
						<!--Dirección de residencia del contacto auxiliar-->
<!-- 						<div>
							<label class="form-label">Dirección de residencia:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<textarea class="form-control mb-2" name="Dirección_Aux" id="Dirección_Aux" minlength="10"></textarea>
						</div> -->
						<!--Relación del contacto auxiliar-->
						<div>
							<label class="form-label">Relación con la persona:<small class="text-danger"><i class="fa-solid fa-circle-exclamation ms-2"></i> (Campo requerido)</small></label>
							<input type="text" class="form-control mb-2" name="Relación_Auxiliar" id="Relación_Auxiliar" placeholder="Vecino, familiar, etc." maxlength="12" minlength="3" required>
						</div>
					</section>
				</div>
				<div class="card-footer">
					<input type="hidden" name="Datos_Representante" value="Datos_Representante">
					<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
					<input class="btn btn-primary" type="submit" onclick="enviar()" value="Guardar y continuar">
				</div>
			</div>
		</form>
		<!--Footer-->
		<footer class="w-100 bg-secondary d-flex justify-content-center text-center p-2 position-fixed bottom-0">
			<span class="text-white">Sistema de inscripción L.B. G.P.F - <i class="far fa-copyright"></i> 2022-<?php echo date("Y"); ?></span>
		</footer>
		<?php include '../../ayuda.php';?>
<script type="text/javascript" src="../../js/sweetalert2.js"></script>
<script type="text/javascript" src="../../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../../js/validaciones-inscripcion.js"></script>
<script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
<script>

function enviar() {

	var FormularioRepresentante = document.getElementById("FormularioRepresentante");

	var a = document.getElementById("seccion1");
	var b = document.getElementById("seccion2");
	var c = document.getElementById("seccion3");
	var d = document.getElementById("seccion4");
	var e = document.getElementById("seccion5");

	a.style.display = "block";
	b.style.display = "block";
	c.style.display = "block";
	d.style.display = "block";
	e.style.display = "block";

	if (FormularioRepresentante.checkValidity()) {
		FormularioRepresentante.submit();
	}
	else {
		Swal.fire(
	      'Atención',
	      'Faltan campos por llenar',
	      'info'
	    );
	}
	setTimeout(function(){
		a.style.display = "block";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";
		e.style.display = "none";
	}, 1000);


}

function seccion(seccion) {


		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		var e = document.getElementById("seccion5");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");
		var link_e = document.getElementById("link5");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";
		e.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");
		link_e.classList.remove("active");

		if (seccion == a) {
			a.style.display = "block";
			link_a.classList.add("active");
		}
		else if (seccion == b) {
			b.style.display = "block";
			link_b.classList.add("active");
		}
		else if (seccion == c) {
			c.style.display = "block";
			link_c.classList.add("active");
		}
		else if (seccion == d) {
			d.style.display = "block";
			link_d.classList.add("active");
		}
		else if (seccion == e) {
			e.style.display = "block";
			link_e.classList.add("active");
		}
	}
</script>

</body>
</html>
