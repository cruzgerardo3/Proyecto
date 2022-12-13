<?php  
require_once 'datos/conf.php';
require_once 'negocio/medicos.php';

$Obj_medicos = new Medicos();

$Obj_medicos->Nombres = $_POST['txtNombres'];
$Obj_medicos->Apellidos = $_POST['txtApellidos'];
$Obj_medicos->FechaNac = $_POST['dateFechaNac'];
$Obj_medicos->Dui = $_POST['txtDUI'];
$Obj_medicos->Genero = $_POST['cbxGenero'];
$Obj_medicos->Especialidad = $_POST['txtEspecialidad'];
$Obj_medicos->JVPM = $_POST['txtJVPM'];
$Obj_medicos->Telefono = $_POST['txtTelefono'];
$Obj_medicos->Usuario = $_POST['txtUser'];
$Obj_medicos->Pass = $_POST['passCon'];
$Obj_medicos->TipoUsuario = $_POST['cbxTipoUsuario'];

if ($Obj_medicos->Actualizar( $_POST['hidId'] ) ){
	echo "<script>location.replace('index.php?mod=me&form=li');</script>";
}

?>