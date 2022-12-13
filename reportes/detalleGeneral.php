<?php  
require_once '../datos/conf.php';
require_once '../negocio/consultas.php';
require_once '../negocio/pacientes.php';
require_once '../negocio/medicos.php';

$Obj_consultas = new Consultas();
$Obj_pacientes = new Pacientes();
$Obj_medicos = new Medicos();

$listConsultas = $Obj_consultas->BuscarPorId( $_GET['id'] );
foreach($listConsultas as $lc){
	$listConsultas = $lc;
}

$listPacientes = $Obj_pacientes->BuscarPorId( $listConsultas['idpaciente'] );
foreach($listPacientes as $lp){
	$listPacientes = $lp;
}

$listMedicos = $Obj_medicos->BuscarPorId( $listConsultas['idmedico'] );
foreach($listMedicos as $lm){
	$listMedicos = $lm;
}

//Calculamos la edad a partir de la fecha de nacimiento capturada desde la base de datos 
$dia = date("j");
$mes = date("n");
$anio = date("Y");

$nacimiento = explode("-", $listPacientes['fechanac']);
$DiaNac = $nacimiento[2];
$MesNac = $nacimiento[1];
$AnioNac = $nacimiento[0];

//Si el mes es el mismo pero el dia es inferior, aun no ha cumplido anos, le restamos un ano al actual 
if (($MesNac == $mes) && ($DiaNac > $dia)){
  $anio = ($anio-1);
}
//Si el mes es superior al actual tampoco habra cumplido anios, por lo tanto le restamos al ano actual 
if ($MesNac > $mes){
  $anio = ($anio-1);
}
//Ya no habran mas condiciones, simplemente restamos los anios y simplemente mostramos el resultado como su edad
$Edad = ($anio-$AnioNac);

//Obtenemos la fecha de la consulta 
$Fecha = explode("-", $listConsultas['fecha']);
$D = $Fecha[2];
$M = $Fecha[1];
$A = $Fecha[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalle de la consulta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;font-size: 14px;
    }

    /* Estilos para los botones (imprimir y cerrar) */
    .table-botones .btn {
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .table-botones .btn {
        color: #fff;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 0px;
    }
    .table-botones .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-botones .btn span {
        float: left;
        margin-top: 2px;
    }

    /* Esto es para que al imprimir en papel, no se impriman los botones del formulario (imprimir y cerrar) */
    @media print {
	.table-botones {
		display:none;
	}
}
  </style>
</head>
<body>

<div class="container">
<div class="table-botones">
	<div class="form-row">
		<div class="col-md-9"></div>
	    <div class="col-md-3">
	        <button type="button" class="btn btn-info" onClick="window.print()">Imprimir</button>
	        <button type="button" class="btn btn-danger" data-toggle="modal" onClick="window.close();">Cerrar</button>
	    </div>
	</div>
	<div class="form-row d-flex justify-content-center">
		<div class="col-7">
			<div class="row d-flex justify-content-center">
				<h2><strong>Reporte de consulta</strong></h2>
			</div>
			<div class="row d-flex justify-content-center">
				<h3><strong>Dr/a. <?php echo $listMedicos['nombres']." ".$listMedicos['apellidos']; ?></strong></h3>
			</div>
			<div class="row d-flex justify-content-center">
				<h3><strong><?php echo $listMedicos['especialidad'];?></strong></h3>
			</div>
			<div class="row d-flex justify-content-center">
				<h3><strong>J.V.P.M. <?php echo $listMedicos['jvpm'];?></strong></h3>
			</div>
			<div class="row d-flex justify-content-center">
				<h3><strong>San Miguel, San Miguel</strong></h3>
			</div>
		</div>
	</div>
	<br><br>
	<table class="table table-borderless" width="100%">
		<tbody>
			<tr>
				<td colspan="2"><font size="4"><strong>Paciente: </strong><label for=""><?php echo $listPacientes['nombres']." ".$listPacientes['apellidos']; ?></label></font></td>
				<td><font size="4"><strong>Fecha: </strong><label><?php echo $D."/".$M."/".$A; ?></label></font></td>
			</tr>
			<tr>
				<td><font size="4"><strong>Edad: </strong><label><?php echo $Edad; ?></label></font></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"><font size="4"><strong>Consulta por: </strong><label><?php echo $listConsultas['consulta']; ?></label></font></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"><font size="4"><strong>Antecedentes: </strong><label><?php echo $listConsultas['antecedentes']; ?></label></font></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"><font size="4"><strong>Impresion: </strong><label><?php echo $listConsultas['impresion']; ?></label></font></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"><font size="4"><strong>Plan: </strong><label><?php echo $listConsultas['plan']; ?></label></font></td>
			</tr>
		</tbody>
	</table>
	<footer class="footer ml-2">
		<div class="text-left">
		  <div class="row">
		    <div class="col-sm-3">
		      <font size="4"><strong>F:_________________________</strong></font>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-sm-3">
		      <font size="4"><strong>Dr/a. <?php echo $listMedicos['nombres']." ".$listMedicos['apellidos']; ?></strong></font>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-sm-3">
		      <font size="4"><strong><?php echo $listMedicos['especialidad']; ?></strong></font>
		    </div>
		  </div>
		  <div class="row">
		    <div class="col-md-3">
		      <font size="4"><strong>JVPM <?php echo $listMedicos['jvpm']; ?></strong></font>
		    </div>
		  </div>
		</div>
	</footer>
</div>
</div>
	
</body>
</html>