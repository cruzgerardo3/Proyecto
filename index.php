<?php
//Configuracion de la zona horaria
date_default_timezone_set("America/El_Salvador");
session_start();
if($_SESSION['user'] != ""){

}
else{
    header('Location:login.php');
}

//Seleccion del modulo
switch( @$_GET["mod"] ){
    //Redirecciona al modulo de medicos
    case 'me':
        if($_SESSION['tipousuario'] == "A"){
            $Modulo = 'presentacion/medicos/index.php';
        }
        else{
            header('Location:index.php');
        }
        break;
    //Redirecciona al modulo de pacientes
    case 'pa':
        $Modulo = 'presentacion/pacientes/index.php';
        break;
    //Redirecciona al modulo de consultas 
    case 'con':
        $Modulo = 'presentacion/consultas/index.php';
        break;
    //Modulo por defecto, menu principal
    default: 
        $Modulo = 'presentacion/menu.php';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/prototype.js"></script>
    <title>Consultorio medico</title>
</head>
<body>
<style>
body{
    background-color: #CEECF5;        
}
.container{
    width: 60%;
    margin: 50px auto;
    height: auto;
    font-family: Arial, sans-serif; 
    background-color: ;        
}
.card{
    border: 0px;
}
.card, .table{
    background-color: #FAFAFA;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
}
.form-control:focus{
    box-shadow: none;
}
</style>
    <div id="DivMainIndex" style='position: relative; margin: 0 auto 0 auto;'>
        <?php
            require_once $Modulo;
        ?>
    </div>
</body>
</html>