<?php
$FormValid = false;

//Seleccion del formulario del modulo
switch( @$_GET['form'] ){
    //redirecciona al formulario de listar
    case 'li':
        $Form = 'presentacion/pacientes/frmListar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de agregar 
    case 'nu':
        $Form = 'presentacion/pacientes/frmNuevo.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de editar
    case 'ed':
        $Form = 'presentacion/pacientes/frmEditar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de detalles
    case 'de':
        $Form = 'presentacion/pacientes/frmDetalle.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento actualiza
    case 'ac':
        $Form = 'presentacion/pacientes/actualizar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento eliminar
    case 'el':
        $Form = 'presentacion/pacientes/eliminar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento agregar
    case 'ag':
        $Form = 'presentacion/pacientes/agregar.php';
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