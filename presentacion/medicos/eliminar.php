<?php
require_once 'datos/conf.php';
require_once 'negocio/medicos.php';

$Obj_medicos = new Medicos();

if ($Obj_medicos->Eliminar( $_GET['id'] ) ){
    echo "<script>location.replace('index.php?mod=me&form=li');</script>";
}
?>