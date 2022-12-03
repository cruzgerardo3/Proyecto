<?php 
include_once('datos/conf.php');

$conn->pacientes->deleteOne(
	array(
		"_id"=> new MongoDB\BSON\ObjectId($_GET['id'])
	)
);

header('Location:index.php?mod=pa&form=li');

 ?>