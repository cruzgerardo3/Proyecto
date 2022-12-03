<?php
$FormValid = false;

//Seleccion del formulario del modulo
switch( @$_GET['form'] ){
    //redirecciona al formulario de listar
    case 'li':
        $Form = 'presentacion/consultas/frmListar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de agregar consulta
    case 'nu':
        $Form = 'presentacion/consultas/frmNuevo.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de editar
    case 'ed':
        $Form = 'presentacion/consultas/frmEditar.php';
        $FormValid = true;
        break;
    //redirecciona al formulario de detalles
    case 'de':
        $Form = 'presentacion/consultas/frmDetalle.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento actualiza
    case 'ac':
        $Form = 'presentacion/consultas/actualizar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento eliminar
    case 'el':
        $Form = 'presentacion/consultas/eliminar.php';
        $FormValid = true;
        break;
    //redirecciona al mantenimiento agregar
    case 'ag':
        $Form = 'presentacion/consultas/agregar.php';
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