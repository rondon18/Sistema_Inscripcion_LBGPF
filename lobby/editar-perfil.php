<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Perfil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<form class="card" action="../controladores/control-usuarios.php" method="POST" style="max-width: 600px; margin: 74px auto;">
		<div class="card-header">
			<h4>Editar perfi</h4>
		</div>
		<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a id="link1" class="nav-link active" href="#" onclick="seccion('seccion1')">Datos personales</a>
			</li>
			<li class="nav-item">
				<a id="link2" class="nav-link" href="#" onclick="seccion('seccion2')">Datos de representante</a>
			</li>
			<li class="nav-item">
				<a id="link3" class="nav-link" href="#" onclick="seccion('seccion3')">Datos socio-economicos</a>
			</li>
			<li class="nav-item">
				<a id="link4" class="nav-link" href="#" onclick="seccion('seccion4')">Contacto auxiliar</a>
			</li>
			<li class="nav-item">
				<a id="link5" class="nav-link" href="#" onclick="seccion('seccion5')">Datos de usuario</a>
			</li>
			
		</ul>
		<?php else: ?>
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<p class="nav-link active">Datos personales</p>
			</li>
		</ul>
		<?php endif ?>
		<div class="card-body">
			<section id="seccion1">
				<!--Datos del representante-->
				<h5>Datos personales.</h5>

				<div>
					
					<!--Nombres del representante-->
					<div>
						<label>Nombres:</label>
					
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Nombre_Representante" placeholder="Primer nombre" required value="<?php echo $_SESSION['persona']['Primer_Nombre'];?>">
							<input class="form-control mb-2" type="text" name="Segundo_Nombre_Representante" placeholder="Segundo nombre" required value="<?php echo $_SESSION['persona']['Segundo_Nombre'];?>">
						</div>
					</div>
					
					<!--Apellidos del representante-->
					<div>
						<label>Apellidos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Apellido_Representante" placeholder="Primer apellido" required value="<?php echo $_SESSION['persona']['Primer_Apellido'];?>">
							<input class="form-control mb-2" type="text" name="Segundo_Apellido_Representante" placeholder="Segundo apellido" required value="<?php echo $_SESSION['persona']['Segundo_Apellido'];?>">
						</div>
					</div>

					<!--Cédula del representante-->
					<div>
						<label>Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cédula_Representante" placeholder="Cédula de identidad" required value="<?php echo $_SESSION['persona']['Cédula'];?>">
					</div>

					<!--Genero del representante-->
					<div>	
						<p>Genero:</p>
						
						<div class="form-check">
							<label>F </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="F" required <?php if(isset($_SESSION['persona']['Género']) and $_SESSION['persona']['Género'] == "F"){ echo "checked";} ?>>
						</div>
						
						<div class="form-check">
							<label>M </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="M" required <?php if(isset($_SESSION['persona']['Género']) and $_SESSION['persona']['Género'] == "M"){ echo "checked";} ?>>
						</div>
					</div>

					<!--Fecha de nacimiento del representante-->
					<div>
						<label>Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Representante" required value="<?php echo $_SESSION['persona']['Fecha_Nacimiento'];?>">
					</div>

					<!--Lugar de nacimiento del representante-->
					<div>
						<label>Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Representante" required value="<?php echo $_SESSION['persona']['Lugar_Nacimiento'];?>">
					</div>

					<!--Correo electronico del representante-->
					<div>
						<label>Correo electrónico:</label>
						<input class="form-control mb-2" type="email" name="Correo_electrónico" required value="<?php echo $_SESSION['persona']['Correo_Electrónico'];?>">
					</div>

					<!--Estado civil del representante-->
					<div>
						<label>Estado civil:</label>
						<select class="form-select" name="Estado_Civil_Representante">
							<option value="Soltero(a)" <?php if(isset($_SESSION['persona'][11]) and $_SESSION['persona'][11] == "Soltero(a)"){ echo "selected";} ?>>Soltero(a)</option>
							<option value="Casado(a)" <?php if(isset($_SESSION['persona'][11]) and $_SESSION['persona'][11] == "Casado(a)"){ echo "selected";} ?>>Casado(a)</option>
							<option value="Divorsiado(a)" <?php if(isset($_SESSION['persona'][11]) and $_SESSION['persona'][11] == "Divorsiado(a)"){ echo "selected";} ?>>Divorsiado(a)</option>
							<option value="Viudo(a)" <?php if(isset($_SESSION['persona'][11]) and $_SESSION['persona'][11] == "Viudo(a)"){ echo "selected";} ?>>Viudo(a)</option>
						</select>
					</div>
					
					<!--Dirección de residencia-->
					<div>
						<label>Dirección de residencia:</label>
						<textarea class="form-control mb-2" name="Direccion_Representante" required><?php echo $_SESSION['persona']['Dirección'];?></textarea>
					</div>
					
					
				</div>	
			</section>
			<?php if ($_SESSION['usuario']['Privilegios'] == 2): ?>
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
						<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos" value="<?php echo $_SESSION['telefonos'][0]['Prefijo'] ?>">
						
						<!--Número-->
						<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required value="<?php echo $_SESSION['telefonos'][0]['Número_Telefónico'];?>">
					</div>
					
					<!--Teléfono secundario-->
					<div class="input-group mb-2">
						<!--Prefijo-->
						<input class="form-control col-1" type="text" name="Prefijo_Secundario_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos" value="<?php echo $_SESSION['telefonos'][1]['Prefijo'] ?>">
						
						<!--Número-->
						<input class="form-control w-auto" type="tel" name="Teléfono_Secundario_Representante" placeholder="Auxiliar" required value="<?php echo $_SESSION['telefonos'][1]['Número_Telefónico'];?>">
					</div>
					
					<!--Teléfono auxiliar-->
					<div class="input-group mb-2">
						<!--Prefijo-->
						<input class="form-control col-1" type="text" name="Prefijo_Auxiliar_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos" value="<?php echo $_SESSION['telefonos'][2]['Prefijo'] ?>">
						
						<!--Número-->
						<input class="form-control w-auto" type="tel" name="Teléfono_Auxiliar_Representante" placeholder="Auxiliar" required value="<?php echo $_SESSION['telefonos'][2]['Número_Telefónico'];?>">
					</div>
				</div>
				<!--Vinculo del representante con el estudiante-->
				<div>
					<label>Vinculo con el estudiante:</label>
				
					<div class="input-group">
						<select class="form-select" name="Vinculo_Representante" required>
							<option value="Madre" <?php if(isset($_SESSION['representante']['Vinculo']) and $_SESSION['representante']['Vinculo'] == "Madre"){ echo "selected";} ?>>Madre</option>
							<option value="Padre" <?php if(isset($_SESSION['representante']['Vinculo']) and $_SESSION['representante']['Vinculo'] == "Padre"){ echo "selected";} ?>>Padre</option>
							<option value="Abuelo(a)" <?php if(isset($_SESSION['representante']['Vinculo']) and $_SESSION['representante']['Vinculo'] == "Abuelo(a)"){ echo "selected";} ?>>Abuelo(a)</option>
							<option value="Otro" <?php if(isset($_SESSION['representante']['Vinculo']) and $_SESSION['representante']['Vinculo'] == "Otro"){ echo "selected";} ?>>Otro</option>
						</select>
						<input class="form-control" type="text" value="<?php if($_SESSION['representante']['Vinculo'] == 'Otro'){ echo $_SESSION['representante']['Vinculo'];}?>" placeholder="Otro">
					</div>
				</div>
				<!--Grado de instruccion del representante-->
				<div>
					<span>Grado de instrucción:</span>
					<div class="form-check">
						<label>Primaria </label>
						<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Primaria" required <?php if(isset($_SESSION['representante'][5]) and $_SESSION['representante'][5] == "Primaria"){ echo "checked";}?>>
					</div>
					<div class="form-check">
						<label>Bachillerato </label>
						<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Bachillerato" required <?php if(isset($_SESSION['representante'][5]) and $_SESSION['representante'][5] == "Bachillerato"){ echo "checked";}?>>
					</div>
					<div class="form-check">
						<label>Universitario </label>
						<input class="form-check-input" type="radio" name="Grado_Instrucción" value="Universitario" required <?php if(isset($_SESSION['representante'][5]) and $_SESSION['representante'][5] == "Universitario"){ echo "checked";}?>>
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
							<option value="Banco de Venezuela S.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco de Venezuela S.A."){ echo "selected";} ?>>Banco de Venezuela S.A.</option>
							<option value="Venezolano de Crédito S.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Venezolano de Crédito S.A."){ echo "selected";} ?>>Venezolano de Crédito S.A.</option>
							<option value="Banco Mercantil, C.A" <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Mercantil, C.A"){ echo "selected";} ?>>Banco Mercantil, C.A</option>
							<option value="Banco Provincial, S.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Provincial, S.A."){ echo "selected";} ?>>Banco Provincial, S.A.</option>
							<option value="Bancaribe C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Bancaribe C.A."){ echo "selected";} ?>>Bancaribe C.A.</option>
							<option value="Banco Exterior C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Exterior C.A."){ echo "selected";} ?>>Banco Exterior C.A.</option>
							<option value="Banco Occidental de Descuento, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Occidental de Descuento, C.A."){ echo "selected";} ?>>Banco Occidental de Descuento, C.A.</option>
							<option value="Banco Caroní C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Caroní C.A."){ echo "selected";} ?>>Banco Caroní C.A.</option>
							<option value="Banesco S.A.C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banesco S.A.C.A."){ echo "selected";} ?>>Banesco S.A.C.A.</option>
							<option value="Banco Sofitasa C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Sofitasa C.A."){ echo "selected";} ?>>Banco Sofitasa C.A.</option>
							<option value="Banco Plaza C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Plaza C.A."){ echo "selected";} ?>>Banco Plaza C.A.</option>
							<option value="Banco de la Gente Emprendedora C.A. - Bangente" <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco de la Gente Emprendedora C.A. - Bangente"){ echo "selected";} ?>>Banco de la Gente Emprendedora C.A. - Bangente</option>
							<option value="Banco del Pueblo Soberano, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco del Pueblo Soberano, C.A."){ echo "selected";} ?>>Banco del Pueblo Soberano, C.A.</option>
							<option value="Banco Fondo Común C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Fondo Común C.A."){ echo "selected";} ?>>Banco Fondo Común C.A.</option>
							<option value="100% Banco, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "100% Banco, C.A."){ echo "selected";} ?>>100% Banco, C.A.</option>
							<option value="DelSur, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "DelSur, C.A."){ echo "selected";} ?>>DelSur, C.A.</option>
							<option value="Banco del Tesoro, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco del Tesoro, C.A."){ echo "selected";} ?>>Banco del Tesoro, C.A.</option>
							<option value="Banco Agrícola de Venezuela, C.A" <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Agrícola de Venezuela, C.A"){ echo "selected";} ?>>Banco Agrícola de Venezuela, C.A</option>
							<option value="Bancrecer, S.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Bancrecer, S.A."){ echo "selected";} ?>>Bancrecer, S.A.</option>
							<option value="Mi Banco C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Mi Banco C.A."){ echo "selected";} ?>>Mi Banco C.A.</option>
							<option value="Banco Activo, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Activo, C.A."){ echo "selected";} ?>>Banco Activo, C.A.</option>
							<option value="Bancamiga, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Bancamiga, C.A."){ echo "selected";} ?>>Bancamiga, C.A.</option>
							<option value="Banco Internacional de Desarrollo, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Internacional de Desarrollo, C.A."){ echo "selected";} ?>>Banco Internacional de Desarrollo, C.A.</option>
							<option value="Banplus, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banplus, C.A."){ echo "selected";} ?>>Banplus, C.A.</option>
							<option value="Banco Bicentenario C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Bicentenario C.A."){ echo "selected";} ?>>Banco Bicentenario C.A.</option>
							<option value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB" <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco de la Fuerza Armada Nacional Bolivariana - BANFANB"){ echo "selected";} ?>>Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
							<option value="Citibank N.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Citibank N.A."){ echo "selected";} ?>>Citibank N.A.</option>
							<option value="Banco Nacional de Crédito, C.A." <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Banco Nacional de Crédito, C.A."){ echo "selected";} ?>>Banco Nacional de Crédito, C.A.</option>
							<option value="Instituto Municipal de Crédito Popular" <?php if(isset($_SESSION['datos_economicos']['Banco']) and $_SESSION['datos_economicos']['Banco'] == "Instituto Municipal de Crédito Popular"){ echo "selected";} ?>>Instituto Municipal de Crédito Popular</option>
						</select>

						<div>
							<p>Tipo de cuenta:</p>
							<div class="form-check">
								<label>Ahorro </label>
								<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required <?php if(isset($_SESSION['datos_economicos']['Tipo_Cuenta']) and $_SESSION['datos_economicos']['Tipo_Cuenta'] == "Ahorro"){ echo "checked";} ?>>
							</div>
							<div class="form-check">
								<label>Corriente </label>
								<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required <?php if(isset($_SESSION['datos_economicos']['Tipo_Cuenta']) and $_SESSION['datos_economicos']['Tipo_Cuenta'] == "Corriente"){ echo "checked";} ?>>
							</div>
						</div>
						<div>
							<label>Nro. de cuenta:</label>
							<input class="form-control mb-2" type="text" name="Nro_Cuenta" placeholder="0000-XXXXXXXXXXXXXX" required value="<?php echo $_SESSION['datos_economicos']['Cta_Bancaria'];?>">
						</div>
					</div>
				</div>
				<!--Datos Económicos-->
				<h5>Datos económicos.</h5>
				
				
				<!--Trabaja el representante-->
				<div>
					<span>Trabaja:</span>
					<div>
						<label>Si </label>
						<input class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required <?php if(isset($_SESSION['datos_laborales']['Empleo']) and $_SESSION['datos_laborales']['Empleo'] != "Desempleado"){ echo "checked";}?>>
						<label>No </label>
						<input class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required <?php if(isset($_SESSION['datos_laborales']['Empleo']) and ($_SESSION['datos_laborales']['Empleo'] == "Desempleado")){ echo "checked";}?>>
					</div>
				</div>

				<!--Teléfono del trabajo de representante-->
				<div>
					<label>Teléfono del trabajo:</label>
					<!--Teléfono principal-->
					<div class="input-group mb-2">
						<!--Prefijo-->
						<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos" value="<?php echo $_SESSION['telefonos'][3]['Prefijo'] ?>">
						
						<!--Número-->
						<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required value="<?php echo $_SESSION['telefonos'][3]['Número_Telefónico'];?>">
					</div>
				</div>

				<!--Cargo que ocupa el representante-->
				<div>
					<label>Cargo que ocupa:</label>
					<input class="form-control mb-2" type="text" name="Cargo_Representante" value="<?php echo $_SESSION['datos_laborales']['Empleo'];?>">
				</div>

				<!--Lugar en el que trabaja el representante-->
				<div>
					<label>Lugar del trabajo:</label>
					<textarea class="form-control mb-2" name="Lugar_Trabajo_Representante"><?php echo$_SESSION['datos_laborales']['Lugar_Trabajo'];?></textarea>
				</div>


				<div>
					<label class="form-label">Remuneración:</label>
					<div class="input-group">
						<input class="form-control text-end" type="number" name="Remuneración" placeholder="Ingrese un numero..." min="0" step="1" value="<?php echo (int)$_SESSION['representante'][9];?>">
						
						<span class="input-group-text">Salarios mínimos</span>

						<!--Tipo de remuneracion del representante-->
						<select class="form-select" name="Tipo_Remuneracion">
							<option value="Diaria" <?php if(isset($_SESSION['datos_laborales']['Tipo_Remuneración']) and $_SESSION['datos_laborales']['Tipo_Remuneración'] == "Diaria"){ echo "selected";} ?>>Remuneración diaria</option>
							<option value="Semanal" <?php if(isset($_SESSION['datos_laborales']['Tipo_Remuneración']) and $_SESSION['datos_laborales']['Tipo_Remuneración'] == "Semanal"){ echo "selected";} ?>>Remuneración semanal</option>
							<option value="Quincenal" <?php if(isset($_SESSION['datos_laborales']['Tipo_Remuneración']) and $_SESSION['datos_laborales']['Tipo_Remuneración'] == "Quincenal"){ echo "selected";} ?>>Remuneración quincenal</option>
							<option value="Mensual" <?php if(isset($_SESSION['datos_laborales']['Tipo_Remuneración']) and $_SESSION['datos_laborales']['Tipo_Remuneración'] == "Mensual"){ echo "selected";} ?>>Remuneración mensual</option>
						</select>
					</div>
				</div>
			</section>
			<section id="seccion4" style="display: none;">
				<!--Persona de contacto en caso de emergencia-->
				<h6>Otro contacto de emergencia:</h6>

				<p>Nombres:</p>
				<div class="input-group">
					
					<input class="form-control mb-2" type="text" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['ContactoAuxiliar'][0]['Primer_Nombre'];?>">
					<input class="form-control mb-2" type="text" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['ContactoAuxiliar'][0]['Segundo_Nombre'];?>">
				</div>
				<p>Apellidos:</p>
				<div class="input-group">
					
					<input class="form-control mb-2" type="text" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['ContactoAuxiliar'][0]['Primer_Apellido'];?>">
					<input class="form-control mb-2" type="text" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['ContactoAuxiliar'][0]['Segundo_Apellido'];?>">
				</div>
				<!--Relación de la persona con el representante-->
				<div>
					<span>Relación:</span>
					<input class="form-control mb-2" type="text" name="Relación_Auxiliar" placeholder="Ingrese texto aquí..." required value="<?php echo $_SESSION['auxiliar'][2];?>">
				</div>
				<!--Teléfono principal-->
					<div class="input-group mb-2">
						<!--Prefijo-->
						<input class="form-control col-1" type="text" name="Prefijo_Principal_Representante" list="prefijos" pattern="[0,9]+" maxlength="4" placeholder="Prefijo telefónico" type="Solo ingresar caracteres numericos" value="<?php echo $_SESSION['ContactoAuxiliar'][2][0]['Prefijo']?>">
						
						<!--Número-->
						<input class="form-control w-auto" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required value="<?php echo $_SESSION['ContactoAuxiliar'][2][0]['Número_Telefónico']?>">
					</div>
				<div>
					<!--Teléfono de la persona auxiliar-->
					<span>Teléfono principal:</span>
					<input class="form-control mb-2" type="tel" name="Tfl_P_Contacto_Aux" placeholder="Telefono" required value="<?php echo $_SESSION['auxiliar'][4];?>">
				</div>
				<div>
					<!--Teléfono de la persona auxiliar-->
					<span>Teléfono auxiliar:</span>
					<input class="form-control mb-2" type="tel" name="Tfl_S_Contacto_Aux" placeholder="Telefono" required value="<?php echo $_SESSION['auxiliar'][5];?>">
				</div>
			</section>
			<section id="seccion5" style="display: none;">
				<!--Datos del usuario-->
				<h5>Datos de usuario.</h5>

				<div>
					<span>Contraseña:</span>
					<?php //Si las claves no coinciden, muestra un recuadro con un mensaje de error 
					if (isset($check)) { echo '<font color="red">Las contraseñas no coinciden</font>';}?>
					<div class="input-group">
						<input class="form-control mb-2" type="password" name="Contraseña" placeholder="Contraseña">
						<input class="form-control mb-2" type="password" name="RepetirContraseña" placeholder="Repertir la contraseña">
					</div>
					<small class="d-inline-block form-text">La contraseña debe tener al menos 8 caracteres e incluir: mayusculas, minusculas, simbolos y número</small>
				</div>
			</section>
			
			<?php endif ?>
		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="index.php">Volver al inicio</a>
			<input type="hidden" name="orden" value="Editar">
			<input type="hidden" name="editar-perfil" value="editar-perfil">
			<input class="btn btn-primary" type="submit" value="Guardar y continuar">
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