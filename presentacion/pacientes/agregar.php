<?php  
include_once('datos/conf.php');

$conn->pacientes->insertOne([
	'nombres'=>$_POST['txtNombres'],
	'apellidos'=>$_POST['txtApellidos'],
	'fechanac'=>$_POST['dateFechaNac'],
	'tiposangre'=>$_POST['txtTipoSangre'],
	'telefono'=>$_POST['txtTelefono'],
	'enfermedad'=>$_POST['txtEnfermedad'],
	'direccion'=>$_POST['txtDireccion']
]);

header('Location:index.php?mod=pa&form=li');
?>