<?php 

session_start();

if (!$_SESSION['login']) {
	header('Location: ../index.php');
	exit();
}

require_once('../php/crud-alumnos.php');


$conexion	= conectarBD();
$crud = new CrudAlumnos();

if (isset($_POST['alumno'],$_POST['Mostrar'])) {
	$alumno = $crud->mostrarAlumno($_POST['alumno']);
}
else {
	header('Location: consultar.php');
}

desconectarBD($conexion);

?>

<html>
<?php if (isset($_POST['Editar']) and $alumno->CedulaRepresentante == $_SESSION['usuario']->Cedula): ?>
	<form action="">
	<table border="1" cellpadding="12" style="margin: auto;">
		<tr>
			<td colspan="4"><p>PrimerNombre: <input type="text" name="PrimerNombre" value="<?php echo $alumno->PrimerNombre;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>SegundoNombre: <input type="text" name="SegundoNombre" value="<?php echo $alumno->SegundoNombre;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>PrimerApellido: <input type="text" name="PrimerApellido" value="<?php echo $alumno->PrimerApellido;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>SegundoApellido: <input type="text" name="SegundoApellido" value="<?php echo $alumno->SegundoApellido;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Genero: <input type="text" name="Genero" value="<?php echo $alumno->Genero;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Cedula: <input type="text" name="Cedula" value="<?php echo $alumno->Cedula;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>TipoCedula: <input type="text" name="TipoCedula" value="<?php echo $alumno->TipoCedula;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>CedulaRepresentante: <input type="text" name="CedulaRepresentante" value="<?php echo $alumno->CedulaRepresentante;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>FechaNacimiento: <input type="text" name="FechaNacimiento" value="<?php echo $alumno->FechaNacimiento;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Estado: <input type="text" name="Estado" value="<?php echo $alumno->Estado;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Municipio: <input type="text" name="Municipio" value="<?php echo $alumno->Municipio;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Parroquia: <input type="text" name="Parroquia" value="<?php echo $alumno->Parroquia;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Ciudad: <input type="text" name="Ciudad" value="<?php echo $alumno->Ciudad;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>PuedeIrseSolo: <input type="text" name="PuedeIrseSolo" value="<?php echo $alumno->PuedeIrseSolo;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>ContactoAuxiliar: <input type="text" name="ContactoAuxiliar" value="<?php echo $alumno->ContactoAuxiliar;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>TelefonoAuxiliar: <input type="text" name="TelefonoAuxiliar" value="<?php echo $alumno->TelefonoAuxiliar;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>RelacionAuxiliar: <input type="text" name="RelacionAuxiliar" value="<?php echo $alumno->RelacionAuxiliar;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Estatura: <input type="text" name="Estatura" value="<?php echo $alumno->Estatura;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Peso: <input type="text" name="Peso" value="<?php echo $alumno->Peso;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>GrupoSanguineo: <input type="text" name="GrupoSanguineo" value="<?php echo $alumno->GrupoSanguineo;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Medicacion: <input type="text" name="Medicacion" value="<?php echo $alumno->Medicacion;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>DietaEspecial: <input type="text" name="DietaEspecial" value="<?php echo $alumno->DietaEspecial;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>ImpedimentoFisico: <input type="text" name="ImpedimentoFisico" value="<?php echo $alumno->ImpedimentoFisico;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Alergias: <input type="text" name="Alergias" value="<?php echo $alumno->Alergias;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>ProblemasVista: <input type="text" name="ProblemasVista" value="<?php echo $alumno->ProblemasVista;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>ProblemasSalud: <input type="text" name="ProblemasSalud" value="<?php echo $alumno->ProblemasSalud;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>Grado: <input type="text" name="Grado" value="<?php echo $alumno->Grado;?>"></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p>TipoInscripcion: <input type="text" name="TipoInscripcion" value="<?php echo $alumno->TipoInscripcion;?>"></p>
			</td>
		</tr>

		<tr>
			
			<td><input type="submit" value="Guardar cambios"></td>
			<td><input type="submit" value="Volver"></td>
		
		</tr>

	</table>
</form>
<?php else: ?>
<form action="ver-alumno.php"  method="POST">
	<table border="1" cellpadding="12" style="margin: auto;">
		<tr>
			<td colspan="4"><p>PrimerNombre: <?php echo $alumno->PrimerNombre."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>SegundoNombre: <?php echo $alumno->SegundoNombre."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>PrimerApellido: <?php echo $alumno->PrimerApellido."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>SegundoApellido: <?php echo $alumno->SegundoApellido."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Genero: <?php echo $alumno->Genero."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Cedula: <?php echo $alumno->Cedula."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>TipoCedula: <?php echo $alumno->TipoCedula."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>CedulaRepresentante: <?php echo $alumno->CedulaRepresentante."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>FechaNacimiento: <?php echo $alumno->FechaNacimiento."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Estado: <?php echo $alumno->Estado."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Municipio: <?php echo $alumno->Municipio."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Parroquia: <?php echo $alumno->Parroquia."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Ciudad: <?php echo $alumno->Ciudad."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>PuedeIrseSolo: <?php echo $alumno->PuedeIrseSolo."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>ContactoAuxiliar: <?php echo $alumno->ContactoAuxiliar."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>TelefonoAuxiliar: <?php echo $alumno->TelefonoAuxiliar."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>RelacionAuxiliar: <?php echo $alumno->RelacionAuxiliar."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Estatura: <?php echo $alumno->Estatura."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Peso: <?php echo $alumno->Peso."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>GrupoSanguineo: <?php echo $alumno->GrupoSanguineo."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Medicacion: <?php echo $alumno->Medicacion."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>DietaEspecial: <?php echo $alumno->DietaEspecial."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>ImpedimentoFisico: <?php echo $alumno->ImpedimentoFisico."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Alergias: <?php echo $alumno->Alergias."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>ProblemasVista: <?php echo $alumno->ProblemasVista."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>ProblemasSalud: <?php echo $alumno->ProblemasSalud."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>Grado: <?php echo $alumno->Grado."<br>";?></p></td></tr>
		<tr>
			<td colspan="4"><p>TipoInscripcion: <?php echo $alumno->TipoInscripcion."<br>";?></p></td></tr>

		<tr>
			
			
				<td><input type="submit" name="Editar" value="Editar"></td>
				<td><input type="submit" name="Generar planilla" value="Generar planilla"></td>
				<td><input type="submit" value="Eliminar alumno"></td>
				<td><a href="">Volver</a></td>
		</tr>

	</table>
</form>
<?php endif ?>

</html>