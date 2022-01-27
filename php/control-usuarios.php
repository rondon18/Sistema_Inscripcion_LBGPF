<?php

session_start();

require_once('../clases/usuario.php');
require_once('crud-usuarios.php');

$crud 	= new CrudUsuarios();
$usuario	= new Usuario();

if (isset($_POST['orden']) and $_POST['orden']) {
	
	$orden = $_POST['orden'];
		
	if ($orden == "Insertar") {

		#Se asignan los valores del objeto antes de pasarlo al crud
		$usuario->setNombre1($_POST['PrimerNombre']);
		$usuario->setNombre2($_POST['SegundoNombre']);
		$usuario->setApellido1($_POST['PrimerApellido']);
		$usuario->setApellido2($_POST['SegundoApellido']);
		
		$usuario->setCedula($_POST['Cedula']);
		$usuario->setGenero($_POST['Genero']);
		
		$usuario->setEmail($_POST['Email']);
		$usuario->setTelefono1($_POST['Telefono1']);
		$usuario->setTelefono2($_POST['Telefono2']);
		$usuario->setClave($_POST['Clave']);
		$usuario->setDireccion($_POST['Direccion']);
		$crud->insertarUsuario($usuario);


		header('Location: ../index.php');
	}
	
	elseif ($orden == "Editar") {
		
		#Se asignan los valores del objeto antes de pasarlo al crud
		$usuario->setNombre1($_POST['PrimerNombre']);
		$usuario->setNombre2($_POST['SegundoNombre']);
		$usuario->setApellido1($_POST['PrimerApellido']);
		$usuario->setApellido2($_POST['SegundoApellido']);
		
		$usuario->setCedula($_POST['Cedula']);
		$usuario->setGenero($_POST['Genero']);
		
		$usuario->setEmail($_POST['Email']);
		$usuario->setTelefono1($_POST['Telefono1']);
		$usuario->setTelefono2($_POST['Telefono2']);
		$usuario->setClave($_POST['Clave']);
		$usuario->setDireccion($_POST['Direccion']);

		
		
		//esto es para editar el perfil
		$crud->editarUsuario($usuario,$_SESSION['usuario']->id);

		if ($usuario->getNombre1() != $_SESSION['usuario']->PrimerNombre) {
			$_SESSION['usuario']->PrimerNombre = $usuario->getNombre1();
		}
		
		if ($usuario->getNombre2() != $_SESSION['usuario']->SegundoNombre) {
			$_SESSION['usuario']->SegundoNombre = $usuario->getNombre2();
		}
		
		if ($usuario->getApellido1() != $_SESSION['usuario']->PrimerApellido) {
			$_SESSION['usuario']->PrimerApellido = $usuario->getApellido1();
		}
		
		if ($usuario->getApellido2() != $_SESSION['usuario']->SegundoApellido) {
			$_SESSION['usuario']->SegundoApellido = $usuario->getApellido2();
		}
		
		if ($usuario->getCedula() != $_SESSION['usuario']->Cedula) {
			$_SESSION['usuario']->Cedula = $usuario->getCedula();
		}
		
		if ($usuario->getGenero() != $_SESSION['usuario']->Genero) {
			$_SESSION['usuario']->Genero = $usuario->getGenero();
		}
		
		if ($usuario->getEmail() != $_SESSION['usuario']->Correo) {
			$_SESSION['usuario']->Correo = $usuario->getEmail();
		}
		
		if ($usuario->getTelefono1() != $_SESSION['usuario']->Telefono1) {
			$_SESSION['usuario']->Telefono1 = $usuario->getTelefono1();
		}
		
		if ($usuario->getTelefono2() != $_SESSION['usuario']->Telefono2) {
			$_SESSION['usuario']->Telefono2 = $usuario->getTelefono2();
		}
		
		if ($usuario->getClave() != $_SESSION['usuario']->Clave) {
			$_SESSION['usuario']->Clave = $usuario->getClave();
		}
		
		if ($usuario->getDireccion() != $_SESSION['usuario']->Direccion) {
			$_SESSION['usuario']->Direccion = $usuario->getDireccion();
		}

		header('Location: ../lobby/index.php');

	}
	
	elseif ($orden == "Consultar") {
		//texto a buscar
		$criterio = $_POST['Criterio'];

		//buscar entre nombres, apellidos, etc
		$condiciones = $_POST['Condiciones'];

		#$crud->
	}
	
	elseif ($orden == "Eliminar") {
		
		if (isset($_POST['DarseDeBaja'])) {
			echo $_SESSION['usuario']->id;
			$crud->eliminarUsuario($_SESSION['usuario']->id);
			header('Location: ../lobby/logout.php');
		}
		elseif (isset($_POST['id'])) {
			echo $_POST['id'];
			$crud->eliminarUsuario($_POST['id']);
			header('Location: ../lobby/index.php');
		}
	}
	
	else {
		echo "La orden: ' ". $orden . " ' no es valida.";
	}

	
	//Esto hace lo suyo y manda de regreso a la pagina inicial

}
else {
	header('Location: ../index.php');
}




?>