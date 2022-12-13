<?php 
require_once 'datos/conf.php';
require_once 'negocio/consultas.php';

$Obj_consultas = new Consultas();

$Obj_consultas->Fecha = $_POST['dateFecha'];
$Obj_consultas->Consulta = $_POST['txtConsulta'];
$Obj_consultas->Antecedentes = $_POST['txtAntecedentes'];
$Obj_consultas->Impresion = $_POST['txtImpresion'];
$Obj_consultas->Plan = $_POST['txtPlan'];

if ($Obj_consultas->Actualizar( $_POST['hidId'] ) ){
	echo "<script>location.replace('index.php?mod=con&form=li');</script>";
}

 ?>