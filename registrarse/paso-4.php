<?php  
session_start();

if (!isset($_SESSION['Paso_1'],$_SESSION['Paso_2'],$_SESSION['Paso_3'])) {
	header('Location: paso-1.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verificación de datos ingresados<title>
</head>
<style type="text/css">
	div {
		padding: .4rem;
		margin: 16px 2px;
		border: solid 1px #000000AA;
	}
	html{
		font-family: Calibri;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - Datos del usuario</title>
</head>
<style type="text/css">
	div {
		padding: .4rem;
		margin: 16px 2px;
		border: solid 1px #000000AA;
	}
	html{
		font-family: Calibri;
	}
</style>

<body>
	<div style="max-width: 600px; margin:auto;">
		<div>
			<div>
				<!--Datos del representante-->
				<h1>Datos personales. <a href="paso-1.php">Editar</a></h1>

				<div>
					
					<!--Nombres del representante-->
					<div>
						<span>Nombres:</span><br>
					
						<span><?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?></span>
						<span><?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?></span>
					</div>
					
					<!--Apellidos del representante-->
					<div>
						<span>Apellidos:</span><br>

						<span><?php echo $_SESSION['Primer_Apellido_Representante'] ?? NULL;?></span>
						<span><?php echo $_SESSION['Segundo_Apellido_Representante'] ?? NULL;?></span>
					</div>

					<!--Genero del representante-->
					<div>
							<span>Genero:</span><br>

							<span><?php echo $_SESSION['Genero_Representante'] ?? NULL;?></span>
					</div>
					
					<!--Vinculo del representante con el estudiante-->
					<div>
						<span>Vinculo con el estudiante:</span><br>
					
						<span><?php echo $_SESSION['Vinculo_Representante'] ?? NULL;?></span>
					</div>

					<!--Cédula del representante-->
					<div>
						<span>Cédula:</span><br>
						<span><?php echo $_SESSION['Cédula_Representante'] ?? NULL;?></span>
					</div>

					<!--Fecha de nacimiento del representante-->
					<div>
						<span>Fecha de nacimiento:</span><br>
						<span><?php echo $_SESSION['Fecha_Nacimiento_Representante'] ?? NULL;?></span>
					</div>

					<!--Lugar de nacimiento del representante-->
					<div>
						<span>Lugar de nacimiento:</span><br>
						<span><?php echo $_SESSION['Lugar_Nacimiento_Representante'] ?? NULL;?></span>
					</div>

					<!--Correo electronico del representante-->
					<div>
						<span>Correo electrónico:</span><br>
						<span><?php echo $_SESSION['Correo_electrónico'] ?? NULL;?></span>
					</div>

					<!--Telefonos principal y auxiliar del representante-->
					<div>
						<span>Teléfonos:</span><br>
						<span>Principal: <?php echo $_SESSION['Teléfono_Principal_Representante'] ?? NULL;?></span>
						<span>Auxiliar: <?php echo $_SESSION['Teléfono_Auxiliar_Representante'] ?? NULL;?></span>
					</div>
					
					<!--Dirección de residencia del representante-->
					<div>
						<span>Estado civil:</span><br>
						<span><?php echo $_SESSION['Estado_Civil_Representante'] ?? NULL;?></span>
					</div>
					
					<!--Dirección de residencia-->
					<div>
						<span>Dirección de residencia:</span><br>
						<span><?php echo $_SESSION['Direccion_Representante'] ?? NULL;?></span>
					</div>
					
					<!--Persona de contacto en caso de emergencia-->
					<div>
						<span>Otro contacto de emergencia:</span><br>
						<span><?php echo $_SESSION['Nombre_Contacto_Emergencia'] ?? NULL;?></span>
						<div>
							<!--Relacion de la persona con el representante-->
							<span>Relación:</span><br>
							<span><?php echo $_SESSION['Relación_Auxiliar'] ?? NULL;?></span>
						</div>
						<div>
							<!--Telefono de la persona auxiliar-->
							<span>Teléfono principal:</span><br>
							<span><?php echo $_SESSION['Tfl_P_Contacto_Aux'] ?? NULL;?></span>
						</div>
						<div>
							<!--Telefono de la persona auxiliar-->
							<span>Teléfono auxiliar:</span><br>
							<span><?php echo $_SESSION['Tfl_S_Contacto_Aux'] ?? NULL;?></span>
						</div>
					</div>
					
					<!--Datos bancarios del representante-->
					<div>
						<span>Banco:</span><br>

						<span><?php echo $_SESSION['Banco'] ?? NULL;?></span>

						<div>
							<div>
								<span>Tipo de cuenta:</span><br>
								<span><?php echo $_SESSION['Tipo_Cuenta'] ?? NULL;?></span>
							</div>
							<div>
								<span>Nro. de cuenta:</span><br>
								<span><?php echo $_SESSION['Nro_Cuenta'] ?? NULL;?></span>
							</div>
							
							</div>
					</div>
				</div>
			</div>
			<div>
				<!--Datos del padre o la madre-->
				<h1>Datos del padre o la madre. <a href="paso-2.php">Editar</a></h1>

				<div>
					<!--Nombres del familiar-->
					<div>
						<span>Nombres:</span><br>
						<span><?php echo $_SESSION['Primer_Nombre_Familiar'] ?? NULL;?></span>
						<span><?php echo $_SESSION['Segundo_Nombre_Familiar'] ?? NULL;?></span>
					</div>

					<!--Apellidos del familiar-->
					<div>
						<span>Apellidos:</span><br>
						<span><?php echo $_SESSION['Primer_Apellido_Familiar'] ?? NULL;?></span>
						<span><?php echo $_SESSION['Segundo_Apellido_Familiar'] ?? NULL;?></span>
					</div>

					<!--Genero del representante-->
					<div>
							<span>Genero:</span><br>

							<span><?php echo $_SESSION['Genero_Familiar'] ?? NULL;?></span>
					</div>

					<!--Vinculo con el estudiante del familiar-->
					<div>
						<span>Vinculo con el estudiante:</span><br>
						<span><?php echo $_SESSION['Vinculo_Familiar'] ?? NULL;?></span>
					</div>

					<!--Cédula del familiar-->
					<div>
						<span>Cédula:</span><br>
						<span><?php echo $_SESSION['Cédula_Familiar'] ?? NULL;?></span>
					</div>

					<!--Fecha de nacimiento del familiar-->
					<div>
						<span>Fecha de nacimiento:</span><br>
						<span><?php echo $_SESSION['Fecha_Nacimiento_Familiar'] ?? NULL;?></span>
					</div>

					<!--Lugar de nacimiento del familiar-->
					<div>
						<span>Lugar de nacimiento:</span><br>
						<span><?php echo $_SESSION['Lugar_Nacimiento_Familiar'] ?? NULL;?></span>
					</div>

					<!--Correo electrónico del familiar-->
					<div>
						<span>Correo electrónico:</span><br>
						<span><?php echo $_SESSION['Correo_electrónico_Familiar'] ?? NULL;?></span>
					</div>

					<!--Teléfono del familiar-->
					<div>
						<span>Teléfono:</span><br>
						<span>Principal: <?php echo $_SESSION['Teléfono_Principal_Familiar'] ?? NULL;?></span>
						<span>Auxiliar: <?php echo $_SESSION['Teléfono_Auxiliar_Familiar'] ?? NULL;?></span>
					</div>

					<!--Estado civil del familiar-->
					<div>
						<span>Estado civil:</span><br>
						<span><?php echo $_SESSION['Estado_Civil_Familiar'] ?? NULL;?></span>
					</div>
					
					<!--Dirección de residencia del Familiar-->
					<div>
						<span>Dirección de residencia:</span><br>
						<span><?php echo $_SESSION['Direccion_Familiar'] ?? NULL;?></span>
					</div>
					
					<!--Se encuentra el familiar en el país-->
					<div>
						<span>Se encuentra en el país:</span><br>

						<span><?php echo $_SESSION['Reside_En_El_País'] ?? NULL;?></span><br>
					</div>
					<div>
						<span>¿Donde?</span><br>
						<span><?php echo $_SESSION['País'] ?? NULL;?></span>
					</div>
				</div>
			</div>
			<div>
				<!--Datos Económicos-->
				<h1>Datos económicos. <a href="paso-3.php">Editar</a></h1>

				<div>
					<!--Trabaja el representante-->
					<div>
						<span>Trabaja:</span><br>
						<span><?php echo $_SESSION['Representante_Trabaja'] ?? NULL;?></span>
					</div>

					<!--Telefono del trabajo de representante-->
					<div>
						<span>Teléfonos del trabajo:</span><br>
						<span><?php echo $_SESSION['Telefono_Trabajo_Representante'] ?? NULL;?></span>
					</div>

					<!--Cargo que ocupa el representante-->
					<div>
						<span>Cargo que ocupa:</span><br>
						<span><?php echo $_SESSION['Cargo_Representante'] ?? NULL;?></span>
					</div>

					<!--Lugar en el que trabaja el representante-->
					<div>
						<span>Lugar del trabajo:</span><br>
						<span><?php echo $_SESSION['Lugar_Trabajo_Representante'] ?? NULL;?></span>
					</div>

					<!--Grado de instruccion del representante-->
					<div>
						<span>Grado de instrucción:</span><br>
						<span><?php echo $_SESSION['Grado_Instrucción'] ?? NULL;?></span>
					</div>

					<!--Remuneración del representante-->
					<div>
						<span>Remuneración:</span><br>
						<span><?php echo $_SESSION['Remuneración'] ?? NULL;?></span>
					</div>

					<!--Tipo de remuneracion del representante-->
					<div>
						<span>Tipo de remuneración:</span><br>
						<span><?php echo $_SESSION['Tipo_Remuneracion'] ?? NULL;?></span>
					</div>
				</div>
			</div>
			<div>
				<!--Datos del usuario-->
				<h1>Datos de usuario. <a href="paso-4.php">Editar</a></h1>

				<div>
					<!--Trabaja el representante-->
					<div>
						<span>Contraseña:</span><br>
						<span><?php echo $_SESSION['Contraseña'] ?? NULL;?></span><br>
						<small>Puede cambiarla en cualquier momento luego del registro</small>
					</div>
				</div>

				<div>
					<a href="paso-1.php">Volver al paso 1</a>
					<a href="paso-2.php">Volver al paso 2</a>
					<a href="paso-3.php">Volver al paso 3</a>
					<a href="paso-4.php">Volver al paso 4</a>
				</div>

				<div>
					
					<form action="../controladores/control-usuarios.php" method="POST">

						<input type="hidden" name="Primer_Nombre_Representante" value="<?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?>">
						<input type="hidden" name="Segundo_Nombre_Representante" value="<?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?>">
						<input type="hidden" name="Primer_Apellido_Representante" value="<?php echo $_SESSION['Primer_Apellido_Representante'] ?? NULL;?>">
						<input type="hidden" name="Segundo_Apellido_Representante" value="<?php echo $_SESSION['Segundo_Apellido_Representante'] ?? NULL;?>">
						<input type="hidden" name="Genero_Representante" value="<?php echo $_SESSION['Genero_Representante'] ?? NULL;?>">
						<input type="hidden" name="Vinculo_Representante" value="<?php echo $_SESSION['Vinculo_Representante'] ?? NULL;?>">
						<input type="hidden" name="Otro_Vinculo" value="<?php echo $_SESSION['Otro_Vinculo'] ?? NULL;?>">
						<input type="hidden" name="Cédula_Representante" value="<?php echo $_SESSION['Cédula_Representante'] ?? NULL;?>">
						<input type="hidden" name="Fecha_Nacimiento_Representante" value="<?php echo $_SESSION['Fecha_Nacimiento_Representante'] ?? NULL;?>">
						<input type="hidden" name="Lugar_Nacimiento_Representante" value="<?php echo $_SESSION['Lugar_Nacimiento_Representante'] ?? NULL;?>">
						<input type="hidden" name="Correo_electrónico" value="<?php echo $_SESSION['Correo_electrónico'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Principal_Representante" value="<?php echo $_SESSION['Teléfono_Principal_Representante'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Auxiliar_Representante" value="<?php echo $_SESSION['Teléfono_Auxiliar_Representante'] ?? NULL;?>">
						<input type="hidden" name="Estado_Civil_Representante" value="<?php echo $_SESSION['Estado_Civil_Representante'] ?? NULL;?>">
						<input type="hidden" name="Direccion_Representante" value="<?php echo $_SESSION['Direccion_Representante'] ?? NULL;?>">
						<input type="hidden" name="Nombre_Contacto_Emergencia" value="<?php echo $_SESSION['Nombre_Contacto_Emergencia'] ?? NULL;?>">
						<input type="hidden" name="Relación_Auxiliar" value="<?php echo $_SESSION['Relación_Auxiliar'] ?? NULL;?>">
						<input type="hidden" name="Tfl_P_Contacto_Aux" value="<?php echo $_SESSION['Tfl_P_Contacto_Aux'] ?? NULL;?>">
						<input type="hidden" name="Tfl_S_Contacto_Aux" value="<?php echo $_SESSION['Tfl_S_Contacto_Aux'] ?? NULL;?>">
						<input type="hidden" name="Banco" value="<?php echo $_SESSION['Banco'] ?? NULL;?>">
						<input type="hidden" name="Tipo_Cuenta" value="<?php echo $_SESSION['Tipo_Cuenta'] ?? NULL;?>">
						<input type="hidden" name="Nro_Cuenta" value="<?php echo $_SESSION['Nro_Cuenta'] ?? NULL;?>">
						<input type="hidden" name="Primer_Nombre_Familiar" value="<?php echo $_SESSION['Primer_Nombre_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Segundo_Nombre_Familiar" value="<?php echo $_SESSION['Segundo_Nombre_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Primer_Apellido_Familiar" value="<?php echo $_SESSION['Primer_Apellido_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Segundo_Apellido_Familiar" value="<?php echo $_SESSION['Segundo_Apellido_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Genero_Familiar" value="<?php echo $_SESSION['Genero_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Vinculo_Familiar" value="<?php echo $_SESSION['Vinculo_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Cédula_Familiar" value="<?php echo $_SESSION['Cédula_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Fecha_Nacimiento_Familiar" value="<?php echo $_SESSION['Fecha_Nacimiento_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Lugar_Nacimiento_Familiar" value="<?php echo $_SESSION['Lugar_Nacimiento_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Correo_electrónico_Familiar" value="<?php echo $_SESSION['Correo_electrónico_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Principal_Familiar" value="<?php echo $_SESSION['Teléfono_Principal_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Auxiliar_Familiar" value="<?php echo $_SESSION['Teléfono_Auxiliar_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Estado_Civil_Familiar" value="<?php echo $_SESSION['Estado_Civil_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Direccion_Familiar" value="<?php echo $_SESSION['Direccion_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Cédula_Familiar" value="<?php echo $_SESSION['Cédula_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Fecha_Nacimiento_Familiar" value="<?php echo $_SESSION['Fecha_Nacimiento_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Lugar_Nacimiento_Familiar" value="<?php echo $_SESSION['Lugar_Nacimiento_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Correo_electrónico_Familiar" value="<?php echo $_SESSION['Correo_electrónico_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Principal_Familiar" value="<?php echo $_SESSION['Teléfono_Principal_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Teléfono_Auxiliar_Familiar" value="<?php echo $_SESSION['Teléfono_Auxiliar_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Estado_Civil_Familiar" value="<?php echo $_SESSION['Estado_Civil_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Direccion_Familiar" value="<?php echo $_SESSION['Direccion_Familiar'] ?? NULL;?>">
						<input type="hidden" name="Reside_En_El_País" value="<?php echo $_SESSION['Reside_En_El_País'] ?? NULL;?>">
						<input type="hidden" name="País" value="<?php echo $_SESSION['País'] ?? NULL;?>">
						<input type="hidden" name="Representante_Trabaja" value="<?php echo $_SESSION['Representante_Trabaja'] ?? NULL;?>">
						<input type="hidden" name="Telefono_Trabajo_Representante" value="<?php echo $_SESSION['Telefono_Trabajo_Representante'] ?? NULL;?>">
						<input type="hidden" name="Cargo_Representante" value="<?php echo $_SESSION['Cargo_Representante'] ?? NULL;?>">
						<input type="hidden" name="Lugar_Trabajo_Representante" value="<?php echo $_SESSION['Lugar_Trabajo_Representante'] ?? NULL;?>">
						<input type="hidden" name="Grado_Instrucción" value="<?php echo $_SESSION['Grado_Instrucción'] ?? NULL;?>">
						<input type="hidden" name="Remuneración" value="<?php echo $_SESSION['Remuneración'] ?? NULL;?>">
						<input type="hidden" name="Tipo_Remuneracion" value="<?php echo $_SESSION['Tipo_Remuneracion'] ?? NULL;?>">
						<input type="hidden" name="Contraseña" value="<?php echo $_SESSION['Contraseña'] ?? NULL;?>">

						<input type="hidden" name="orden" value="Insertar">
						<input type="hidden" name="Registrar" value="Registrar">

						<a href="../index.php">Volver al inicio</a>
						<input type="submit" value="Guardar cambios y registrarse">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
</html>