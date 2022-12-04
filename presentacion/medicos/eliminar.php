<?php
include_once('datos/conf.php');

$conn->medicos->deleteOne(
    array(
        "_id"=> new MongoDB\BSON\ObjectId($_GET['id'])
    )
);

header('Location:index.php?mod=me&form=li');
?>