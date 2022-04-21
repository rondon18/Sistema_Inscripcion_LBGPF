<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro - Datos del representante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<form action="paso-1.php" method="POST" style="max-width: 600px; margin: 75px auto;">
		<div class="card">
			<!--Datos del representante-->
			<div class="card-header py-3">
				<h2>Formulario de registro de usuario.</h2>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de representante</a>
				</li>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos de vivienda</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Datos laborales y economicos</a>
				</li>
				<li class="nav-item">
					<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Contacto auxiliar</a>
				</li>
				<li class="nav-item">
					<a id="link6" class="nav-link" href="#" onclick="seccion('seccion6')">Datos de usuario</a>
				</li>
			</ul>
			<div class="card-body">
				<section id="seccion1">
					<!--Nombres del representante-->
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group mb-2">
							<input type="text" class="form-control" name="Primer_Nombre_R" placeholder="Primer nombre" required>
							<input type="text" class="form-control" name="Segundo_Nombre_R" placeholder="Segundo nombre" required>
						</div>
					</div>
					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group mb-2">
							<input type="text" class="form-control" name="Primer_Apellido_R" placeholder="Primer apellido" required>
							<input type="text" class="form-control" name="Segundo_Apellido_R" placeholder="Segundo apellido" required>
						</div>
					</div>
					<!--Genero del representante-->
					<div>
						<p>Genero:</p>
						<div class="form-check">
							<label class="form-label">F </label>
							<input class="form-check-input" type="radio" name="Genero_R" value="F" required>
						</div>

						<div class="form-check">
							<label class="form-label">M </label>
							<input class="form-check-input" type="radio" name="Genero_R" value="M" required>
						</div>
					</div>
					<!--Cédula del representante-->
					<div>
						<label class="form-label">Cédula:</label>
						<input type="text" class="form-control" name="Cédula_R" required>
					</div>
					<!--Fecha de nacimiento del representante-->
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="Fecha_Nacimiento_R" required>
					</div>
					<!--Lugar de nacimiento del representante-->
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input type="text" class="form-control" name="Lugar_Nacimiento_R" required>
					</div>
					<!--Correo electronico del representante-->
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input type="email" class="form-control" name="Correo_electrónico_R" required>
					</div>
					<!--Estado civil del representante-->
					<div>
						<label class="form-label">Estado civil:</label>
						<select class="form-select mb-2" name="Estado_Civil_R" required>
							<option value="Soltero(a)">Soltero(a)</option>
							<option value="Casado(a)">Casado(a)</option>
							<option value="Divorsiado(a)">Divorsiado(a)</option>
							<option value="Viudo(a)">Viudo(a)</option>
						</select>
					</div>
					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control" name="Direccion_R" rows="4" required></textarea>
					</div>
				</section>
				<section id="seccion2" style="display: none;">
					<!--Teléfonos del representante-->
					<div>
						<datalist id="prefijos">
							<!--Moviles-->
							<option value="0416">
							<option value="0426">
							<option value="0414">
							<option value="0412">

							<!--Fijos-->
							<option value="0212">
							<option value="0234">
							<option value="0235">
							<option value="0238">
							<option value="0239">
							<option value="0240">
							<option value="0241">
							<option value="0242">
							<option value="0243">
							<option value="0244">
							<option value="0245">
							<option value="0246">
							<option value="0247">
							<option value="0248">
							<option value="0249">
							<option value="0251">
							<option value="0252">
							<option value="0253">
							<option value="0254">
							<option value="0255">
							<option value="0256">
							<option value="0257">
							<option value="0258">
							<option value="0259">
							<option value="0261">
							<option value="0262">
							<option value="0263">
							<option value="0264">
							<option value="0265">
							<option value="0266">
							<option value="0267">
							<option value="0268">
							<option value="0269">
							<option value="0271">
							<option value="0272">
							<option value="0273">
							<option value="0274">
							<option value="0275">
							<option value="0276">
							<option value="0277">
							<option value="0278">
							<option value="0279">
							<option value="0281">
							<option value="0282">
							<option value="0283">
							<option value="0284">
							<option value="0285">
							<option value="0286">
							<option value="0287">
							<option value="0288">
							<option value="0289">
							<option value="0291">
							<option value="0292">
							<option value="0293">
							<option value="0294">
							<option value="0295">
						</datalist>
						<label>Teléfonos:</label>

						<!--Teléfono principal-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Principal_R" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Principal_R" placeholder="Teléfono principal" pattern="[0,9]+" required>
						</div>

						<!--Teléfono secundario-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Secundario_R" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_R" placeholder="Teléfono secundario" pattern="[0,9]+" required>
						</div>

						<!--Teléfono auxiliar-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Auxiliar_R" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_R" placeholder="Teléfono auxiliar" pattern="[0,9]+" required>
						</div>
					</div>
					<!--Vinculo del representante con el estudiante-->
					<div>
						<label class="form-label">Vinculo con el estudiante:</label>
						<div class="input-group mb-2">
							<select class="form-select" name="Vinculo_R" required>
								<option value="Madre">Madre</option>
								<option value="Padre">Padre</option>
								<option value="Abuelo(a)">Abuelo(a)</option>
								<option value="Otro">Otro</option>
							</select>
							<input type="text" class="form-control" name="Otro_Vinculo" placeholder="Si es otro, ¿Cual?">
						</div>
					</div>
					<!--Grado de instruccion del representante-->
					<div>
						<span>Grado de instrucción:</span>
						<div class="form-check mb-2">
							<label>Primaria </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Primaria" required>
						</div>
						<div class="form-check mb-2">
							<label>Bachillerato </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Bachillerato" required>
						</div>
						<div class="form-check mb-2">
							<label>Universitario </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Universitario" required>
						</div>
					</div>
				</section>
				<section id="seccion3" style="display: none;">
					<!--Datos de vivienda del representante-->
					<div>
						<h5>Datos de vivienda.</h5>

						<span>Condiciones de la vivienda:</span>
						<div class="mb-3">
							<div class="form-check mb-2">
								<label>Buena </label>
								<input class="form-check-input" type="radio" name="Condicion_vivienda" value="Buena" required>
							</div>
							<div class="form-check mb-2">
								<label>Regular </label>
								<input class="form-check-input" type="radio" name="Condicion_vivienda" value="Regular" required>
							</div>
							<div class="form-check mb-2">
								<label>Mala </label>
								<input class="form-check-input" type="radio" name="Condicion_vivienda" value="Mala" required>
							</div>
						</div>
						<span>Tipo de vivienda:</span>
						<div class="mb-3">
							<div class="form-check mb-2">
								<label>Casa </label>
								<input class="form-check-input" type="radio" name="Tipo_Vivienda" value="Casa" required>
							</div>
							<div class="form-check mb-2">
								<label>Apartamento </label>
								<input class="form-check-input" type="radio" name="Tipo_Vivienda" value="Apartamento" required>
							</div>
							<div class="form-check mb-2">
								<label>Rancho </label>
								<input class="form-check-input" type="radio" name="Tipo_Vivienda" value="Rancho" required>
							</div>
							<div class="form-check mb-2">
								<label>Quinta </label>
								<input class="form-check-input" type="radio" name="Tipo_Vivienda" value="Quinta" required>
							</div>
							</div>
							<div class="form-check mb-2">
								<label>Habitación </label>
								<input class="form-check-input" type="radio" name="Tipo_Vivienda" value="Habitación" required>
							</div>
						</div>
						<span>Tenencia de la vivienda:</span>
						<div class="mb-3">
							<div class="form-check mb-2">
								<label>Primaria </label>
								<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Primaria" required>
							</div>
							<div class="form-check mb-2">
								<label>Bachillerato </label>
								<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Bachillerato" required>
							</div>
							<div class="form-check mb-2">
								<label>Universitario </label>
								<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Universitario" required>
							</div>
						</div>
					</div>
				</section>
				<section id="seccion4" style="display: none;">
					<!--Datos Económicos-->
					<h5>Datos económicos.</h5>

					<div>
						<!--Datos bancarios del representante-->
						<div>
							<label>Banco:</label>
							<select class="form-select" name="Banco">
								<option value="Banco de Venezuela S.A.">Banco de Venezuela S.A.</option>
								<option value="Venezolano de Crédito S.A.">Venezolano de Crédito S.A.</option>
								<option value="Banco Mercantil, C.A">Banco Mercantil, C.A</option>
								<option value="Banco Provincial, S.A." >Banco Provincial, S.A.</option>
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
								<p>Tipo de cuenta:</p>

								<div class="form-check">
									<label class="form-label">Ahorro </label>
									<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required>
								</div>
								<div class="form-check">
									<label class="form-label">Corriente </label>
									<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required>
								</div>
								<div>
									<label class="form-label">Número de cuenta:</label>
									<input type="text" class="form-control mb-2" name="Nro_Cuenta" placeholder="0000-XXXXXXXXXXXXXX" required>
								</div>
						</div>
					</div>

					<!--Datos laborales-->
					<h5>Datos laborales.</h5>

					<!--Trabaja el representante-->
					<div>
						<span>Trabaja:</span>
						<div class="form-check">
							<label>Si </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required>
						</div>
						<div class="form-check">
							<label>No </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required>
						</div>
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<label>Cargo que ocupa:</label>
						<input class="form-control mb-2" type="text" name="Empleo_R">
					</div>

					<!--Teléfono del trabajo de representante-->
					<div>
						<label>Teléfono del trabajo:</label>
						<!--Teléfono principal-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Trabajo_R" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Trabajo_R" placeholder="Teléfono principal" pattern="[0,9]+" required>
						</div>
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<label>Lugar del trabajo:</label>
						<textarea class="form-control mb-2" name="Lugar_Trabajo_R"></textarea>
					</div>

					<div>
						<label class="form-label">Remuneración:</label>
						<div class="input-group mb-2">
							<input class="form-control text-end" type="number" name="Remuneración" placeholder="Ingrese un numero..." min="0" step="1">

							<span class="input-group-text mb-2-text">Salarios mínimos</span>

							<!--Tipo de remuneracion del representante-->
							<select class="form-select" name="Tipo_Remuneracion">
								<option value="Diaria">Remuneración diaria</option>
								<option value="Semanal">Remuneración semanal</option>
								<option value="Quincenal">Remuneración quincenal</option>
								<option value="Mensual">Remuneración mensual</option>
							</select>
						</div>
					</div>
				</section>
				<section id="seccion5" style="display: none;">
					<!--Nombres del representante-->
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group mb-2">
							<input type="text" class="form-control" name="Primer_Nombre_Representante" placeholder="Primer nombre" required value="<?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?>">
							<input type="text" class="form-control" name="Segundo_Nombre_Representante" placeholder="Segundo nombre" required value="<?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?>">
						</div>

					</div>

					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group mb-2">
							<input type="text" class="form-control" name="Primer_Apellido_Representante" placeholder="Primer apellido" required value="<?php echo $_SESSION['Primer_Apellido_Representante'] ?? NULL;?>">
							<input type="text" class="form-control" name="Segundo_Apellido_Representante" placeholder="Segundo apellido" required value="<?php echo $_SESSION['Segundo_Apellido_Representante'] ?? NULL;?>">
						</div>
					</div>

					<!--Genero del representante-->
					<div>
						<p>Genero:</p>
						<div class="form-check">
							<label class="form-label">F </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="F" required <?php if(isset($_SESSION['Genero_Representante']) and $_SESSION['Genero_Representante'] == "F"){ echo "checked";} ?>>
						</div>

						<div class="form-check">
							<label class="form-label">M </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="M" required <?php if(isset($_SESSION['Genero_Representante']) and $_SESSION['Genero_Representante'] == "M"){ echo "checked";} ?>>
						</div>

					</div>
					<!--Cédula del representante-->
					<div>
						<label class="form-label">Cédula:</label>
						<input type="text" class="form-control" name="Cédula_Representante" placeholder="Cédula de identidad" required value="<?php echo $_SESSION['Cédula_Representante'] ?? NULL;?>">
					</div>

					<!--Correo electronico del representante-->
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input type="email" class="form-control" name="Correo_electrónico" required value="<?php echo $_SESSION['Correo_electrónico'] ?? NULL;?>">
					</div>

					<!--Teléfonos-->
					<div>
						<label>Teléfonos:</label>
						<!--Teléfono principal-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required>
						</div>

						<!--Teléfono secundario-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Secundario_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Representante" placeholder="Auxiliar" required>
						</div>

						<!--Teléfono auxiliar-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control" type="text" name="Prefijo_Auxiliar_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" title="Solo ingresar caracteres numericos">
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_Representante" placeholder="Auxiliar" required>
						</div>
					</div>

					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control" name="Direccion_Representante" required><?php echo $_SESSION['Direccion_Representante'] ?? NULL;?></textarea>
					</div>


					<!--Persona de contacto en caso de emergencia-->
					<div>
						<label class="form-label">Otro contacto de emergencia:</label>
						<input type="text" class="form-control" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['Nombre_Contacto_Emergencia'] ?? NULL;?>">

						<!--Relacion de la persona con el representante-->
						<span class="form-label">Relación:</span>
						<input type="text" class="form-control" name="Relación_Auxiliar" placeholder="Ingrese texto aquí..." required value="<?php echo $_SESSION['Relación_Auxiliar'] ?? NULL;?>">

						<span class="form-label">Teléfonos:</span>
						<div class="input-group mb-2">
							<!--Telefono de la persona auxiliar-->
							<input type="tel" class="form-control" name="Tfl_P_Contacto_Aux" placeholder="Telefono" placeholder="Principal" required value="<?php echo $_SESSION['Tfl_P_Contacto_Aux'] ?? NULL;?>">

							<!--Telefono de la persona auxiliar-->
							<input type="tel" class="form-control" name="Tfl_S_Contacto_Aux" placeholder="Telefono" placeholder="Auxiliar" required value="<?php echo $_SESSION['Tfl_S_Contacto_Aux'] ?? NULL;?>">
						</div>
					</div>
				</section>
				<section id="seccion6" style="display: none;">
					<!--Contraseña y validación-->
					<div>
						<span>Contraseña:</span>
						<?php //Si las claves no coinciden, muestra un recuadro con un mensaje de error
						if (isset($check)) { echo '<font color="red">Las contraseñas no coinciden</font>';}?>
						<div class="input-group mb-2">
							<input class="form-control" type="password" name="Contraseña" placeholder="Contraseña">
							<input class="form-control" type="password" name="RepetirContraseña" placeholder="Repertir la contraseña">
						</div>
						<small class="d-inline-block form-text">La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y número</small>
					</div>
				</section>
			</div>
			<div class="card-footer">
				<input type="hidden" name="Paso_1" value="Paso_1">
				<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
				<input class="btn btn-primary" type="submit" value="Guardar y continuar">
			</div>
		</div>
	</form>
<script>
	function seccion(seccion) {

		//secciones
		var a = document.getElementById("seccion1");
		var b = document.getElementById("seccion2");
		var c = document.getElementById("seccion3");
		var d = document.getElementById("seccion4");
		var e = document.getElementById("seccion5");
		var f = document.getElementById("seccion6");

		//botones en la navegación
		var link_a = document.getElementById("link1");
		var link_b = document.getElementById("link2");
		var link_c = document.getElementById("link3");
		var link_d = document.getElementById("link4");
		var link_e = document.getElementById("link5");
		var link_f = document.getElementById("link6");

		//seccion seleccionada como activa(seccion 1 por defecto)
		var seccion = document.getElementById(seccion);

		a.style.display = "none";
		b.style.display = "none";
		c.style.display = "none";
		d.style.display = "none";
		e.style.display = "none";
		f.style.display = "none";

		link_a.classList.remove("active");
		link_b.classList.remove("active");
		link_c.classList.remove("active");
		link_d.classList.remove("active");
		link_e.classList.remove("active");
		link_f.classList.remove("active");

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
		else if (seccion == f) {
			f.style.display = "block";
			link_f.classList.add("active");
		}
	}
</script>
</body>
</html>
