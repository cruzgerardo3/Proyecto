<?php 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';

$Obj_pacientes = new Pacientes();

$Obj_pacientes->Id = $_POST['hidId'];
$Obj_pacientes->Nombres = $_POST['txtNombres'];
$Obj_pacientes->Apellidos = $_POST['txtApellidos'];
$Obj_pacientes->FechaNac = $_POST['dateFechaNac'];
$Obj_pacientes->TipoSangre = $_POST['cbxTipoSangre'];
$Obj_pacientes->Telefono = $_POST['txtTelefono'];
$Obj_pacientes->Enfermedad = $_POST['txtEnfermedad'];
$Obj_pacientes->Direccion = $_POST['txtDireccion'];

if($Obj_pacientes->Actualizar() ){
	echo "<script>location.replace('index.php?mod=pa&form=li');</script>";
}
?>