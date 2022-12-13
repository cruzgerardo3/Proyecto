<?php 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';

$Obj_pacientes = new Pacientes();

if ( $Obj_pacientes->Eliminar( $_GET['id'] ) ){
	echo "<script>location.replace('index.php?mod=pa&form=li');</script>";
}

?>