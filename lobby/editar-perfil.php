<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

$nombres = explode(" ", $_SESSION['persona'][1]);
$apellidos = explode(" ", $_SESSION['persona'][2]);


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
			<h4>Editar perfil</h4>
		</div>
		<div class="card-body">
			<div>
				<!--Datos del representante-->
				<h5>Datos personales.</h5>

				<div>
					
					<!--Nombres del representante-->
					<div>
						<label>Nombres:</label>
					
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Nombre_Representante" placeholder="Primer nombre" required value="<?php echo $nombres[0];?>">
							<input class="form-control mb-2" type="text" name="Segundo_Nombre_Representante" placeholder="Segundo nombre" required value="<?php echo $nombres[1];?>">
						</div>

						
					</div>
					
					<!--Apellidos del representante-->
					<div>
						<label>Apellidos:</label>
						<div class="input-group">
							<input class="form-control mb-2" type="text" name="Primer_Apellido_Representante" placeholder="Primer apellido" required value="<?php echo $apellidos[0];?>">
							<input class="form-control mb-2" type="text" name="Segundo_Apellido_Representante" placeholder="Segundo apellido" required value="<?php echo $apellidos[1];?>">
						</div>
					</div>

					<!--Genero del representante-->
					<div>
								
						<p>Genero:</p>
						
						<div class="form-check">
							<label>F </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="F" required <?php if(isset($_SESSION['persona'][6]) and $_SESSION['persona'][6] == "F"){ echo "checked";} ?>>
						</div>
						
						<div class="form-check">
							<label>M </label>
							<input class="form-check-input" type="radio" name="Genero_Representante" value="M" required <?php if(isset($_SESSION['persona'][6]) and $_SESSION['persona'][6] == "M"){ echo "checked";} ?>>
						</div>

					</div>

					<!--Cédula del representante-->
					<div>
						<label>Cédula:</label>
						<input class="form-control mb-2" type="text" name="Cédula_Representante" placeholder="Cédula de identidad" required value="<?php echo $_SESSION['persona'][3];?>">
					</div>

					<!--Fecha de nacimiento del representante-->
					<div>
						<label>Fecha de nacimiento:</label>
						<input class="form-control mb-2" type="date" name="Fecha_Nacimiento_Representante" required value="<?php echo $_SESSION['persona'][4];?>">
					</div>

					<!--Lugar de nacimiento del representante-->
					<div>
						<label>Lugar de nacimiento:</label>
						<input class="form-control mb-2" type="text" name="Lugar_Nacimiento_Representante" required value="<?php echo $_SESSION['persona'][5];?>">
					</div>

					<!--Vinculo del representante con el estudiante-->
					<div>
						<label>Vinculo con el estudiante:</label>
					
						<select class="form-select" name="Vinculo_Representante" required>
							<option value="Madre" <?php if(isset($_SESSION['representante'][1]) and $_SESSION['representante'][1] == "Madre"){ echo "selected";} ?>>Madre</option>
							<option value="Padre" <?php if(isset($_SESSION['representante'][1]) and $_SESSION['representante'][1] == "Padre"){ echo "selected";} ?>>Padre</option>
							<option value="Abuelo(a)" <?php if(isset($_SESSION['representante'][1]) and $_SESSION['representante'][1] == "Abuelo(a)"){ echo "selected";} ?>>Abuelo(a)</option>
							<option value="Otro" <?php if(isset($_SESSION['representante'][1]) and $_SESSION['representante'][1] == "Otro"){ echo "selected";} ?>>Otro</option>
						</select>
					
					</div>

					<!--Correo electronico del representante-->
					<div>
						<label>Correo electrónico:</label>
						<input class="form-control mb-2" type="email" name="Correo_electrónico" required value="<?php echo $_SESSION['persona'][7];?>">
					</div>

					<!--Telefonos principal y auxiliar del representante-->
					<div>
						<label>Teléfonos:</label>
						<input class="form-control mb-2" type="tel" name="Teléfono_Principal_Representante" placeholder="Principal" required value="<?php echo $_SESSION['persona'][9];?>">
						<input class="form-control mb-2" type="tel" name="Teléfono_Auxiliar_Representante" placeholder="Auxiliar" required value="<?php echo $_SESSION['persona'][10];?>">
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
						<textarea class="form-control mb-2" name="Direccion_Representante" required><?php echo $_SESSION['persona'][8];?></textarea>
					</div>
					
					<!--Persona de contacto en caso de emergencia-->
					<div>
						<label>Otro contacto de emergencia:</label>
						<input class="form-control mb-2" type="text" name="Nombre_Contacto_Emergencia" placeholder="Nombre de la persona" required value="<?php echo $_SESSION['auxiliar'][3];?>">
						<div>
							<!--Relacion de la persona con el representante-->
							<span>Relación:</span>
							<input class="form-control mb-2" type="text" name="Relación_Auxiliar" placeholder="Ingrese texto aquí..." required value="<?php echo $_SESSION['auxiliar'][2];?>">
						</div>
						<div>
							<!--Telefono de la persona auxiliar-->
							<span>Teléfono principal:</span>
							<input class="form-control mb-2" type="tel" name="Tfl_P_Contacto_Aux" placeholder="Telefono" required value="<?php echo $_SESSION['auxiliar'][4];?>">
						</div>
						<div>
							<!--Telefono de la persona auxiliar-->
							<span>Teléfono auxiliar:</span>
							<input class="form-control mb-2" type="tel" name="Tfl_S_Contacto_Aux" placeholder="Telefono" required value="<?php echo $_SESSION['auxiliar'][5];?>">
						</div>
					</div>
					
					<!--Datos bancarios del representante-->
					<div>
						<label>Banco:</label>

						<select class="form-select" name="Banco">
							<option value="Banco de Venezuela S.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco de Venezuela S.A."){ echo "selected";} ?>>Banco de Venezuela S.A.</option>
							<option value="Venezolano de Crédito S.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Venezolano de Crédito S.A."){ echo "selected";} ?>>Venezolano de Crédito S.A.</option>
							<option value="Banco Mercantil, C.A" <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Mercantil, C.A"){ echo "selected";} ?>>Banco Mercantil, C.A</option>
							<option value="Banco Provincial, S.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Provincial, S.A."){ echo "selected";} ?>>Banco Provincial, S.A.</option>
							<option value="Bancaribe C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Bancaribe C.A."){ echo "selected";} ?>>Bancaribe C.A.</option>
							<option value="Banco Exterior C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Exterior C.A."){ echo "selected";} ?>>Banco Exterior C.A.</option>
							<option value="Banco Occidental de Descuento, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Occidental de Descuento, C.A."){ echo "selected";} ?>>Banco Occidental de Descuento, C.A.</option>
							<option value="Banco Caroní C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Caroní C.A."){ echo "selected";} ?>>Banco Caroní C.A.</option>
							<option value="Banesco S.A.C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banesco S.A.C.A."){ echo "selected";} ?>>Banesco S.A.C.A.</option>
							<option value="Banco Sofitasa C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Sofitasa C.A."){ echo "selected";} ?>>Banco Sofitasa C.A.</option>
							<option value="Banco Plaza C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Plaza C.A."){ echo "selected";} ?>>Banco Plaza C.A.</option>
							<option value="Banco de la Gente Emprendedora C.A. - Bangente" <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco de la Gente Emprendedora C.A. - Bangente"){ echo "selected";} ?>>Banco de la Gente Emprendedora C.A. - Bangente</option>
							<option value="Banco del Pueblo Soberano, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco del Pueblo Soberano, C.A."){ echo "selected";} ?>>Banco del Pueblo Soberano, C.A.</option>
							<option value="Banco Fondo Común C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Fondo Común C.A."){ echo "selected";} ?>>Banco Fondo Común C.A.</option>
							<option value="100% Banco, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "100% Banco, C.A."){ echo "selected";} ?>>100% Banco, C.A.</option>
							<option value="DelSur, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "DelSur, C.A."){ echo "selected";} ?>>DelSur, C.A.</option>
							<option value="Banco del Tesoro, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco del Tesoro, C.A."){ echo "selected";} ?>>Banco del Tesoro, C.A.</option>
							<option value="Banco Agrícola de Venezuela, C.A" <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Agrícola de Venezuela, C.A"){ echo "selected";} ?>>Banco Agrícola de Venezuela, C.A</option>
							<option value="Bancrecer, S.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Bancrecer, S.A."){ echo "selected";} ?>>Bancrecer, S.A.</option>
							<option value="Mi Banco C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Mi Banco C.A."){ echo "selected";} ?>>Mi Banco C.A.</option>
							<option value="Banco Activo, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Activo, C.A."){ echo "selected";} ?>>Banco Activo, C.A.</option>
							<option value="Bancamiga, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Bancamiga, C.A."){ echo "selected";} ?>>Bancamiga, C.A.</option>
							<option value="Banco Internacional de Desarrollo, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Internacional de Desarrollo, C.A."){ echo "selected";} ?>>Banco Internacional de Desarrollo, C.A.</option>
							<option value="Banplus, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banplus, C.A."){ echo "selected";} ?>>Banplus, C.A.</option>
							<option value="Banco Bicentenario C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Bicentenario C.A."){ echo "selected";} ?>>Banco Bicentenario C.A.</option>
							<option value="Banco de la Fuerza Armada Nacional Bolivariana - BANFANB" <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco de la Fuerza Armada Nacional Bolivariana - BANFANB"){ echo "selected";} ?>>Banco de la Fuerza Armada Nacional Bolivariana - BANFANB</option>
							<option value="Citibank N.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Citibank N.A."){ echo "selected";} ?>>Citibank N.A.</option>
							<option value="Banco Nacional de Crédito, C.A." <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Banco Nacional de Crédito, C.A."){ echo "selected";} ?>>Banco Nacional de Crédito, C.A.</option>
							<option value="Instituto Municipal de Crédito Popular" <?php if(isset($_SESSION['representante'][2]) and $_SESSION['representante'][2] == "Instituto Municipal de Crédito Popular"){ echo "selected";} ?>>Instituto Municipal de Crédito Popular</option>
						</select>

						<div>
								
							<p>Tipo de cuenta:</p>
							<div class="form-check">
								<label>Ahorro </label>
								<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Ahorro" required <?php if(isset($_SESSION['representante'][3]) and $_SESSION['representante'][3] == "Ahorro"){ echo "checked";} ?>>
							</div>
							<div class="form-check">
								<label>Corriente </label>
								<input class="form-check-input" type="radio" name="Tipo_Cuenta" value="Corriente" required <?php if(isset($_SESSION['representante'][3]) and $_SESSION['representante'][3] == "Corriente"){ echo "checked";} ?>>
							</div>
						</div>
					</div>
					<div>
						<label>Nro. de cuenta:</label>
						<input class="form-control mb-2" type="text" name="Nro_Cuenta" placeholder="0000-XXXXXXXXXXXXXX" required value="<?php echo $_SESSION['representante'][4];?>">
					</div>
				</div>
			</div>

			<div>
				<!--Datos Económicos-->
				<h5>Datos económicos.</h5>

				<div>
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
					
					<!--Trabaja el representante-->
					<div>
						<span>Trabaja:</span>
						<div>
							<label>Si </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="Si" required <?php if(isset($_SESSION['representante'][6]) and $_SESSION['representante'][6] != "Desempleado"){ echo "checked";}?>>
							<label>No </label>
							<input class="form-check-input" type="radio" name="Representante_Trabaja" value="No" required <?php if(isset($_SESSION['representante'][6]) and ($_SESSION['representante'][6] == "Desempleado")){ echo "checked";}?>>
						</div>
					</div>

					<!--Telefono del trabajo de representante-->
					<div>
						<label>Teléfono del trabajo:</label>
						<input class="form-control mb-2" type="tel" name="Telefono_Trabajo_Representante" placeholder="Movil" value="<?php echo $_SESSION['representante'][8];?>">
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<label>Cargo que ocupa:</label>
						<input class="form-control mb-2" type="text" name="Cargo_Representante" value="<?php echo $_SESSION['representante'][6];?>">
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<label>Lugar del trabajo:</label>
						<textarea class="form-control mb-2" name="Lugar_Trabajo_Representante"><?php echo $_SESSION['representante'][7];?></textarea>
					</div>


					<div>
						<label class="form-label">Remuneración:</label>
						<div class="input-group">
							<input class="form-control text-end" type="number" name="Remuneración" placeholder="Ingrese un numero..." min="0" value="<?php echo (int)$_SESSION['representante'][9];?>">
							
							<span class="input-group-text">BsD.</span>

							<!--Tipo de remuneracion del representante-->
							<select class="form-select" name="Tipo_Remuneracion">
								<option value="Diaria" <?php if(isset($_SESSION['representante'][10]) and $_SESSION['representante'][10] == "Diaria"){ echo "selected";} ?>>Remuneración diaria</option>
								<option value="Semanal" <?php if(isset($_SESSION['representante'][10]) and $_SESSION['representante'][10] == "Semanal"){ echo "selected";} ?>>Remuneración semanal</option>
								<option value="Quincenal" <?php if(isset($_SESSION['representante'][10]) and $_SESSION['representante'][10] == "Quincenal"){ echo "selected";} ?>>Remuneración quincenal</option>
								<option value="Mensual" <?php if(isset($_SESSION['representante'][10]) and $_SESSION['representante'][10] == "Mensual"){ echo "selected";} ?>>Remuneración mensual</option>
							</select>
						</div>
						<small class="form-text">Monto aproximado</small>
					</div>
				</div>
			</div>
			
			<div>
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

			</div>

		</div>
		<div class="card-footer">
			<a class="btn btn-primary" href="index.php">Volver al inicio</a>
			<input type="hidden" name="orden" value="Editar">
			<input type="hidden" name="editar-perfil" value="editar-perfil">
			<input class="btn btn-primary" type="submit" value="Guardar y continuar">
		</div>
		
	</form>
</body>
</html>