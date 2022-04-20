<?php 
session_start();

//los datos se mandan a la misma pagina, se capturan y se redirigen a la siguente pagina
//Solo se activa si se envia desde este formulario, no si regresa de uno posterior
if (isset($_POST['Paso_1'])) {
	$_SESSION['Primer_Nombre_Representante'] = $_POST["Primer_Nombre_Representante"];
	$_SESSION['Segundo_Nombre_Representante'] = $_POST["Segundo_Nombre_Representante"];
	$_SESSION['Primer_Apellido_Representante'] = $_POST["Primer_Apellido_Representante"];
	$_SESSION['Segundo_Apellido_Representante'] = $_POST["Segundo_Apellido_Representante"];
	$_SESSION['Genero_Representante'] = $_POST["Genero_Representante"];
	$_SESSION['Vinculo_Representante'] = $_POST["Vinculo_Representante"];
	$_SESSION['Otro_Vinculo'] = $_POST["Otro_Vinculo"];
	$_SESSION['Cédula_Representante'] = $_POST["Cédula_Representante"];
	$_SESSION['Fecha_Nacimiento_Representante'] = $_POST["Fecha_Nacimiento_Representante"];
	$_SESSION['Lugar_Nacimiento_Representante'] = $_POST["Lugar_Nacimiento_Representante"];
	$_SESSION['Correo_electrónico'] = $_POST["Correo_electrónico"];
	$_SESSION['Teléfono_Principal_Representante'] = $_POST["Teléfono_Principal_Representante"];
	$_SESSION['Teléfono_Auxiliar_Representante'] = $_POST["Teléfono_Auxiliar_Representante"];
	$_SESSION['Estado_Civil_Representante'] = $_POST["Estado_Civil_Representante"];
	$_SESSION['Direccion_Representante'] = $_POST["Direccion_Representante"];
	$_SESSION['Nombre_Contacto_Emergencia'] = $_POST["Nombre_Contacto_Emergencia"];
	$_SESSION['Relación_Auxiliar'] = $_POST["Relación_Auxiliar"];
	$_SESSION['Tfl_P_Contacto_Aux'] = $_POST["Tfl_P_Contacto_Aux"];
	$_SESSION['Tfl_S_Contacto_Aux'] = $_POST["Tfl_S_Contacto_Aux"];
	$_SESSION['Banco'] = $_POST["Banco"];
	$_SESSION['Tipo_Cuenta'] = $_POST["Tipo_Cuenta"];
	$_SESSION['Nro_Cuenta'] = $_POST["Nro_Cuenta"];

	$_SESSION['Paso_1'] = $_POST['Paso_1'];

	header('Location: paso-2.php');
}
?>
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
			<div class="card-header">
				<h1>Datos personales.</h1>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
				</li>
				<li class="nav-item">
					<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de representante</a>
				</li>
				<li class="nav-item">
					<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos laborales y economicos</a>
				</li>
				<li class="nav-item">
					<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Contacto auxiliar</a>
				</li>
				<li class="nav-item">
					<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Datos de usuario</a>
				</li>
			</ul>
			<div class="card-body">

				<section id="seccion1">
					<!--Nombres del representante-->
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="Primer_Nombre_Representante" placeholder="Primer nombre" required value="<?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?>">
							<input type="text" class="form-control" name="Segundo_Nombre_Representante" placeholder="Segundo nombre" required value="<?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?>">
						</div>
						
					</div>
					
					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group">
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

					<!--Fecha de nacimiento del representante-->
					<div>
						<label class="form-label">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="Fecha_Nacimiento_Representante" required value="<?php echo $_SESSION['Fecha_Nacimiento_Representante'] ?? NULL;?>">
					</div>

					<!--Lugar de nacimiento del representante-->
					<div>
						<label class="form-label">Lugar de nacimiento:</label>
						<input type="text" class="form-control" name="Lugar_Nacimiento_Representante" required value="<?php echo $_SESSION['Lugar_Nacimiento_Representante'] ?? NULL;?>">
					</div>

					<!--Correo electronico del representante-->
					<div>
						<label class="form-label">Correo electrónico:</label>
						<input type="email" class="form-control" name="Correo_electrónico" required value="<?php echo $_SESSION['Correo_electrónico'] ?? NULL;?>">
					</div>

					<!--Estado civil del representante-->
					<div>
						<label class="form-label">Estado civil:</label>
						<select class="form-select mb-2" name="Estado_Civil_Representante">
							<option value="Soltero(a)" <?php if(isset($_SESSION['Estado_Civil_Representante']) and $_SESSION['Estado_Civil_Representante'] == "Soltero(a)"){ echo "selected";} ?>>Soltero(a)</option>
							<option value="Casado(a)" <?php if(isset($_SESSION['Estado_Civil_Representante']) and $_SESSION['Estado_Civil_Representante'] == "Casado(a)"){ echo "selected";} ?>>Casado(a)</option>
							<option value="Divorsiado(a)" <?php if(isset($_SESSION['Estado_Civil_Representante']) and $_SESSION['Estado_Civil_Representante'] == "Divorsiado(a)"){ echo "selected";} ?>>Divorsiado(a)</option>
							<option value="Viudo(a)" <?php if(isset($_SESSION['Estado_Civil_Representante']) and $_SESSION['Estado_Civil_Representante'] == "Viudo(a)"){ echo "selected";} ?>>Viudo(a)</option>
						</select>
					</div>
					
					<!--Dirección de residencia-->
					<div>
						<label class="form-label">Dirección de residencia:</label>
						<textarea class="form-control" name="Direccion_Representante" required><?php echo $_SESSION['Direccion_Representante'] ?? NULL;?></textarea>
					</div>
				</section>
				<section id="seccion2" style="display: none;">
					<!--Teléfonos del representante-->
					<div>
						<label>Teléfonos:</label>
						
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
						
						<!--Teléfono principal-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required>
						</div>
						
						<!--Teléfono secundario-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Secundario_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Representante" placeholder="Auxiliar" required>
						</div>
						
						<!--Teléfono auxiliar-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Auxiliar_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_Representante" placeholder="Auxiliar" required>
						</div>
					</div>
					<!--Vinculo del representante con el estudiante-->
					<div>
						<label class="form-label">Vinculo con el estudiante:</label>
						
						<div class="input-group mb-2">
							
							<select class="form-select" name="Vinculo_Representante" required>
					
								<option value="Madre" <?php if(isset($_SESSION['Vinculo_Representante']) and $_SESSION['Vinculo_Representante'] == "Madre"){ echo "selected";} ?>>Madre</option>
								<option value="Padre" <?php if(isset($_SESSION['Vinculo_Representante']) and $_SESSION['Vinculo_Representante'] == "Padre"){ echo "selected";} ?>>Padre</option>
								<option value="Abuelo(a)" <?php if(isset($_SESSION['Vinculo_Representante']) and $_SESSION['Vinculo_Representante'] == "Abuelo(a)"){ echo "selected";} ?>>Abuelo(a)</option>
								<option value="Otro" <?php if(isset($_SESSION['Vinculo_Representante']) and $_SESSION['Vinculo_Representante'] == "Otro"){ echo "selected";} ?>>Otro</option>
					
							</select>
						
							<input type="text" class="form-control" name="Otro_Vinculo" placeholder="Si es otro, ¿Cual?" value="<?php echo $_SESSION['Otro_Vinculo'] ?? NULL;?>">
						</div>
					</div>
					<!--Grado de instruccion del representante-->
					<div>
						<span>Grado de instrucción:</span>
						<div class="form-check mb-2">
							<label>Primaria </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Primaria" required >
						</div>
						<div class="form-check mb-2">
							<label>Bachillerato </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Bachillerato" required >
						</div>
						<div class="form-check mb-2">
							<label>Universitario </label>
							<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Universitario" required >
						</div>
					</div>
				</section>
				<section id="seccion3" style="display: none;">
					<!--Datos Económicos-->
					<h5>Datos económicos.</h5>

					<div>
						<!--Datos bancarios del representante-->
						<div>
							<label>Banco:</label>

							<select class="form-select" name="Banco">
								<option value="Banco de Venezuela S.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco de Venezuela S.A."){ echo "selected";} ?>>Banco de Venezuela S.A.</option>
								<option value="Venezolano de Crédito S.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Venezolano de Crédito S.A."){ echo "selected";} ?>>Venezolano de Crédito S.A.</option>
								<option value="Banco Mercantil, C.A" <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Mercantil, C.A"){ echo "selected";} ?>>Banco Mercantil, C.A</option>
								<option value="Banco Provincial, S.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Provincial, S.A."){ echo "selected";} ?>>Banco Provincial, S.A.</option>
								<option value="Bancaribe C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Bancaribe C.A."){ echo "selected";} ?>>Bancaribe C.A.</option>
								<option value="Banco Exterior C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Exterior C.A."){ echo "selected";} ?>>Banco Exterior C.A.</option>
								<option value="Banco Occidental de Descuento, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Occidental de Descuento, C.A."){ echo "selected";} ?>>Banco Occidental de Descuento, C.A.</option>
								<option value="Banco Caroní C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Caroní C.A."){ echo "selected";} ?>>Banco Caroní C.A.</option>
								<option value="Banesco S.A.C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banesco S.A.C.A."){ echo "selected";} ?>>Banesco S.A.C.A.</option>
								<option value="Banco Sofitasa C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Sofitasa C.A."){ echo "selected";} ?>>Banco Sofitasa C.A.</option>
								<option value="Banco Plaza C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Plaza C.A."){ echo "selected";} ?>>Banco Plaza C.A.</option>
								<option value="Banco de la Gente Emprendedora C.A. - Bangente" <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco de la Gente Emprendedora C.A. - Bangente"){ echo "selected";} ?>>Banco de la Gente Emprendedora C.A. - Bangente</option>
								<option value="Banco del Pueblo Soberano, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco del Pueblo Soberano, C.A."){ echo "selected";} ?>>Banco del Pueblo Soberano, C.A.</option>
								<option value="Banco Fondo Común C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Fondo Común C.A."){ echo "selected";} ?>>Banco Fondo Común C.A.</option>
								<option value="100% Banco, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "100% Banco, C.A."){ echo "selected";} ?>>100% Banco, C.A.</option>
								<option value="DelSur, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "DelSur, C.A."){ echo "selected";} ?>>DelSur, C.A.</option>
								<option value="Banco del Tesoro, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco del Tesoro, C.A."){ echo "selected";} ?>>Banco del Tesoro, C.A.</option>
								<option value="Banco Agrícola de Venezuela, C.A" <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Agrícola de Venezuela, C.A"){ echo "selected";} ?>>Banco Agrícola de Venezuela, C.A</option>
								<option value="Bancrecer, S.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Bancrecer, S.A."){ echo "selected";} ?>>Bancrecer, S.A.</option>
								<option value="Mi Banco C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Mi Banco C.A."){ echo "selected";} ?>>Mi Banco C.A.</option>
								<option value="Banco Activo, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Activo, C.A."){ echo "selected";} ?>>Banco Activo, C.A.</option>
								<option value="Bancamiga, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Bancamiga, C.A."){ echo "selected";} ?>>Bancamiga, C.A.</option>
								<option value="Banco Internacional de Desarrollo, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Internacional de Desarrollo, C.A."){ echo "selected";} ?>>Banco Internacional de Desarrollo, C.A.</option>
								<option value="Banplus, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banplus, C.A."){ echo "selected";} ?>>Banplus, C.A.</option>
								<option value="Banco Bicentenario C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Bicentenario C.A."){ echo "selected";} ?>>Banco Bicentenario C.A.</option>
								<option value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB" <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco de la Fuerza Armada Nacional Bolivariana - BANFANB"){ echo "selected";} ?>>Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
								<option value="Citibank N.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Citibank N.A."){ echo "selected";} ?>>Citibank N.A.</option>
								<option value="Banco Nacional de Crédito, C.A." <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Banco Nacional de Crédito, C.A."){ echo "selected";} ?>>Banco Nacional de Crédito, C.A.</option>
								<option value="Instituto Municipal de Crédito Popular" <?php if(isset($_SESSION['Banco']) and $_SESSION['Banco'] == "Instituto Municipal de Crédito Popular"){ echo "selected";} ?>>Instituto Municipal de Crédito Popular</option>
							</select>

							<div>
								<div>
								<p>Tipo de cuenta:</p>

								<div class="form-check">
									
									<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required <?php if(isset($_SESSION['Tipo_Cuenta']) and $_SESSION['Tipo_Cuenta'] == "Ahorro"){ echo "checked";} ?>>
									<label class="form-label">Ahorro </label>
								</div>
								
								<div class="form-check">
									<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required <?php if(isset($_SESSION['Tipo_Cuenta']) and $_SESSION['Tipo_Cuenta'] == "Corriente"){ echo "checked";} ?>>
									<label class="form-label">Corriente </label>
								</div>
								<div>
									<label class="form-label">Número de cuenta:</label>
									<input type="text" class="form-control mb-2" name="Nro_Cuenta" placeholder="0000-XXXXXXXXXXXXXX" required value="<?php echo $_SESSION['Nro_Cuenta'] ?? NULL;?>">
								</div>
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

					<!--Teléfono del trabajo de representante-->
					<div>
						<label>Teléfono del trabajo:</label>
						<!--Teléfono principal-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required >
						</div>
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<label>Cargo que ocupa:</label>
						<input class="form-control mb-2" type="text" name="Cargo_Representante">
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<label>Lugar del trabajo:</label>
						<textarea class="form-control mb-2" name="Lugar_Trabajo_Representante"></textarea>
					</div>


					<div>
						<label class="form-label">Remuneración:</label>
						<div class="input-group">
							<input class="form-control text-end" type="number" name="Remuneración" placeholder="Ingrese un numero..." min="0" step="1">
							
							<span class="input-group-text">Salarios mínimos</span>

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
				<section id="seccion4" style="display: none;">
					<!--Nombres del representante-->
					<div>
						<label class="form-label">Nombres:</label>
						<div class="input-group">
							<input type="text" class="form-control" name="Primer_Nombre_Representante" placeholder="Primer nombre" required value="<?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?>">
							<input type="text" class="form-control" name="Segundo_Nombre_Representante" placeholder="Segundo nombre" required value="<?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?>">
						</div>
						
					</div>
					
					<!--Apellidos del representante-->
					<div>
						<label class="form-label">Apellidos:</label>
						<div class="input-group">
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
							<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required>
						</div>
						
						<!--Teléfono secundario-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Secundario_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
							<!--Número-->
							<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Representante" placeholder="Auxiliar" required>
						</div>
						
						<!--Teléfono auxiliar-->
						<div class="input-group mb-2">
							<!--Prefijo-->
							<input class="form-control col-1" type="text" name="Prefijo_Auxiliar_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos">
							
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
						<div class="input-group">
							<!--Telefono de la persona auxiliar-->
							<input type="tel" class="form-control" name="Tfl_P_Contacto_Aux" placeholder="Telefono" placeholder="Principal" required value="<?php echo $_SESSION['Tfl_P_Contacto_Aux'] ?? NULL;?>">
							
							<!--Telefono de la persona auxiliar-->
							<input type="tel" class="form-control" name="Tfl_S_Contacto_Aux" placeholder="Telefono" placeholder="Auxiliar" required value="<?php echo $_SESSION['Tfl_S_Contacto_Aux'] ?? NULL;?>">
						</div>
					</div>
				</section>
				<section id="seccion5" style="display: none;">
					<!--Contraseña y validación-->
					<div>
						<span>Contraseña:</span>
						<?php //Si las claves no coinciden, muestra un recuadro con un mensaje de error 
						if (isset($check)) { echo '<font color="red">Las contraseñas no coinciden</font>';}?>
						<div class="input-group">
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