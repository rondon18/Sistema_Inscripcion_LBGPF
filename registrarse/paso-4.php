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
	<title>Verificación de datos ingresados</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/colores.css"/>
</head>
<body>
	<div class="card" style="max-width: 600px; margin: 74px auto;">
		<div class="card-header">
			<h2>Verificación de datos ingresados</h2>
		</div>

		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<h4>Datos personales. <a href="paso-1.php">Editar</a></h4>
			</li>
			<!--Nombres del representante-->
			<li class="list-group-item">
				<b>Nombres:</b>
				<span><?php echo $_SESSION['Primer_Nombre_Representante'] ?? NULL;?></span>
				<span><?php echo $_SESSION['Segundo_Nombre_Representante'] ?? NULL;?></span>
			</li>
			<!--Apellidos del representante-->
			<li class="list-group-item">
				<b>Apellidos:</b>
				<span><?php echo $_SESSION['Primer_Apellido_Representante'] ?? NULL;?></span>
				<span><?php echo $_SESSION['Segundo_Apellido_Representante'] ?? NULL;?></span>
			</li>
			<!--Genero del representante-->
			<li class="list-group-item">
				<b>Genero:</b>
				<span><?php echo $_SESSION['Genero_Representante'] ?? NULL;?></span>
			</li>
			<!--Vinculo del representante con el estudiante-->
			<li class="list-group-item">
				<span>Vinculo con el estudiante:</span>
				<span><?php echo $_SESSION['Vinculo_Representante'] ?? NULL;?></span>
			</li>
			<!--Cédula del representante-->
			<li class="list-group-item">
				<span>Cédula:</span>
				<span><?php echo $_SESSION['Cédula_Representante'] ?? NULL;?></span>
			</li>
			<!--Fecha de nacimiento del representante-->
			<li class="list-group-item">
				<span>Fecha de nacimiento:</span>
				<span><?php echo $_SESSION['Fecha_Nacimiento_Representante'] ?? NULL;?></span>
			</li>
			<!--Lugar de nacimiento del representante-->
			<li class="list-group-item">
				<span>Lugar de nacimiento:</span>
				<span><?php echo $_SESSION['Lugar_Nacimiento_Representante'] ?? NULL;?></span>
			</li>
			<!--Correo electronico del representante-->
			<li class="list-group-item">
				<span>Correo electrónico:</span>
				<span><?php echo $_SESSION['Correo_electrónico'] ?? NULL;?></span>
			</li>
			<!--Telefonos principal y auxiliar del representante-->
			<li class="list-group-item">
				<span>Teléfono principal:</span> 
				<span><?php echo $_SESSION['Teléfono_Principal_Representante'] ?? NULL;?></span>
			</li>
			<!--Telefono auxiliar del representante-->
			<li class="list-group-item">
				<span>Teléfono auxiliar:</span> 
				<span><?php echo $_SESSION['Teléfono_Auxiliar_Representante'] ?? NULL;?></span>
			</li>
			<!--Dirección de residencia del representante-->
			<li class="list-group-item">
				<span>Estado civil:</span>
				<span><?php echo $_SESSION['Estado_Civil_Representante'] ?? NULL;?></span>
			</li>
			<!--Dirección de residencia-->
			<li class="list-group-item">
				<span>Dirección de residencia:</span>
				<span><?php echo $_SESSION['Direccion_Representante'] ?? NULL;?></span>
			</li>
			<!--Persona de contacto en caso de emergencia-->
			<li class="list-group-item">
				<span>Otro contacto de emergencia:</span>
				<span><?php echo $_SESSION['Nombre_Contacto_Emergencia'] ?? NULL;?></span>
			</li>
			<!--Relacion de la persona con el representante-->
			<li class="list-group-item">
				<span>Relación:</span>
				<span><?php echo $_SESSION['Relación_Auxiliar'] ?? NULL;?></span>
			</li>
			<!--Telefono de la persona auxiliar-->
			<li class="list-group-item">
				<span>Teléfono principal:</span>
				<span><?php echo $_SESSION['Tfl_P_Contacto_Aux'] ?? NULL;?></span>
			</li>
			<!--Telefono de la persona auxiliar-->
			<li class="list-group-item">
				<span>Teléfono auxiliar:</span>
				<span><?php echo $_SESSION['Tfl_S_Contacto_Aux'] ?? NULL;?></span>
			</li>
			<!--Datos bancarios del representante-->
			<li class="list-group-item">
				<span>Banco:</span>
				<span><?php echo $_SESSION['Nro_Cuenta'].", ".$_SESSION['Tipo_Cuenta'].", ".$_SESSION['Banco'] ?? NULL?></span>
			</li>

			<!--Datos Económicos-->
			<li class="list-group-item">
				<h4>Datos económicos. <a href="paso-2.php">Editar</a></h4>
			</li>
			<!--Trabaja el representante-->
			<li class="list-group-item">
				<span>Trabaja:</span>
				<span><?php echo $_SESSION['Representante_Trabaja'] ?? NULL;?></span>
			</li>
			<!--Telefono del trabajo de representante-->
			<li class="list-group-item">
				<span>Teléfono del trabajo:</span>
				<span><?php echo $_SESSION['Telefono_Trabajo_Representante'] ?? NULL;?></span>
			</li>
			<!--Cargo que ocupa el representante-->
			<li class="list-group-item">
				<span>Cargo que ocupa:</span>
				<span><?php echo $_SESSION['Cargo_Representante'] ?? NULL;?></span>
			</li>
			<!--Lugar en el que trabaja el representante-->
			<li class="list-group-item">
				<span>Lugar del trabajo:</span>
				<span><?php echo $_SESSION['Lugar_Trabajo_Representante'] ?? NULL;?></span>
			</li>
			<!--Grado de instruccion del representante-->
			<li class="list-group-item">
				<span>Grado de instrucción:</span>
				<span><?php echo $_SESSION['Grado_Instrucción'] ?? NULL;?></span>
			</li>
			<!--Remuneración del representante-->
			<li class="list-group-item">
				<span>Remuneración:</span>
				<span><?php echo $_SESSION['Remuneración'] ?? NULL;?></span>
			</li>
			<!--Tipo de remuneracion del representante-->
			<li class="list-group-item">
				<span>Tipo de remuneración:</span>
				<span><?php echo $_SESSION['Tipo_Remuneracion'] ?? NULL;?></span>
			</li>
			<!--Datos del usuario-->
			<li class="list-group-item">
				<h4>Datos de usuario. <a href="paso-3.php">Editar</a></h4>
			</li>
			<!--Trabaja el representante-->
			<li class="list-group-item">
				<span>Contraseña:</span>
				<span><?php echo $_SESSION['Contraseña'] ?? NULL;?></span>	
			</li>
			<li class="list-group-item">
				<p class="">Puede cambiar estos datos en cualquier momento luego del registro</p>
			</li>
			<li class="list-group-item text-center">
				<a class="btn btn-sm btn-primary" href="paso-1.php">Volver al paso 1</a>
				<a class="btn btn-sm btn-primary" href="paso-2.php">Volver al paso 2</a>
				<a class="btn btn-sm btn-primary" href="paso-3.php">Volver al paso 3</a>
			</li>
		</ul>

		<div class="card-footer">
			<form class="d-flex justify-content-between" action="../controladores/control-usuarios.php" method="POST">

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

				<a class="btn btn-primary" href="../index.php">Volver al inicio</a>
				<input class="btn btn-primary" type="submit" value="Guardar cambios y registrarse">
			</form>
		</div>
	</div>
</body>
</html>