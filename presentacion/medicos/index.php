<?php
$FormValid = false;

//Seleccion del formulario del modulo
switch( @$_GET['form'] ){
    //redirecciona al formulario de listar
    case 'li':
        $Form = 'presentacion/medicos/frmListar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de agregar 
    case 'nu':
        $Form = 'presentacion/medicos/frmNuevo.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de editar
    case 'ed':
        $Form = 'presentacion/medicos/frmEditar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de detalles
    case 'de':
        $Form = 'presentacion/medicos/frmDetalle.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento actualiza
    case 'ac':
        $Form = 'presentacion/medicos/actualizar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento eliminar
    case 'el':
        $Form = 'presentacion/medicos/eliminar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento agregar
    case 'ag':
        $Form = 'presentacion/medicos/agregar.php';
        $FormValid = true;
        break;

    default:
        $FormValid = false;
        break;
}

if( $FormValid ){
    require_once $Form;
}
else {
    header('Location: error404.php');
}

?>