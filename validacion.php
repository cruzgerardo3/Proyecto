<?php  
require_once 'datos/conf.php';
if($_SESSION['user'] != ""){
	
}
else{
	header('Location:login.php');
}

$usuario = (isset($_POST['txtUser']) ? $_POST['txtUser']:"");
$pass = (isset($_POST['txtPass']) ? $_POST['txtPass']:"");


if ($usuario != "" && $pass != ""){
	session_start();
	$Obj_datos = new Datos();

	$array = $Obj_datos->Conectar()->medicos->find(['usuario'=>$usuario]);
	foreach($array as $datos){
		$userfind = $datos['usuario'];
		$passfind = $datos['pass'];
		$id = $datos['_id'];
		$nombres = $datos['nombres'];
		$apellidos = $datos['apellidos'];
		$tipousuario = $datos['tipousuario'];
	}

	if (isset($userfind)==NULL){
		$msj = "El usuario no existe";
		$val = false;
	}
	else if ($userfind == $usuario && $passfind != $pass){
		$msj = "Contraseña incorrecta";
		$val = false;
	}
	else if($userfind == $usuario && $passfind == $pass){
		$_SESSION['user'] = $userfind;
		$_SESSION['id'] = $id;
		$_SESSION['nombres'] = $nombres;
		$_SESSION['apellidos'] = $apellidos;
		$_SESSION['tipousuario'] = $tipousuario;
		$val = true;
	}
	else {
		$val = false;
		$msj = "Parametros incorrectos";
	}

	if ($val){
		header('Location:index.php');
	}
	else {
		header('Location:login.php?me='.$msj);
		
	}
}

?>