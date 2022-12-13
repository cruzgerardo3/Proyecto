<?php  
require_once 'datos/conf.php';
require_once 'negocio/consultas.php';

$Obj_consultas = new Consultas();

if ( $Obj_consultas->Eliminar( $_GET['id'] ) ){
	echo "<script>location.replace('index.php?mod=con&form=li');</script>";
}

?>