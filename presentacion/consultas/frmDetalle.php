<?php 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';
require_once 'negocio/consultas.php';
require_once 'negocio/medicos.php';

$Obj_pacientes = new Pacientes();
$Obj_consultas = new Consultas();
$Obj_medicos = new Medicos();

$array = $Obj_consultas->BuscarPorId( $_GET['id'] );

foreach( $array as $datos ){
	$array = $datos;
}

$medico = $Obj_medicos->BuscarPorId( $array['idmedico'] );
$paciente = $Obj_pacientes->BuscarPorId( $array['idpaciente'] );

foreach( $medico as $listpa ){
	$medico = $listpa;
}

foreach( $paciente as $list ){
	$paciente = $list;
}

?>

<div class="container">
	<form action="" method="post" name="frmEditar">
		<div class="form-row d-flex justify-content-between">
			<div class="form-group col-md-2 ms-2 mb-3">
				<button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=con&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Atras</button>
			</div>
			<div class="form-group col-md-2">
	 			<button type="button" class="btn btn-dark" onClick="window.open('reportes/detalleGeneral.php?id=<?php echo $array['_id']; ?>', 'ReporteDetConsulta', 'width=1000,height=700');"><i class="bi bi-printer-fill me-2"></i>Imprimir</button>
	 		</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Detalles de consulta</h3>
				</div>
				<div class="form-row d-flex justify-content-between mb-4">
					<div class="form-group ms-4 col-md-3">
						<label for="">Paciente:</label>
						<input type="text" name="txtNombre" class="form-control" value="<?php echo $paciente['nombres']; ?> &nbsp <?php echo $paciente['apellidos']; ?>" readonly>
						<input type="hidden" name="hidId" value="<?php echo $array['_id']; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="">Fecha:</label>
						<input type="date" name="dateFecha" id="dateFecha" class="form-control" value="<?php echo $array['fecha']; ?>" readonly>
					</div>
					<div class="form-group me-4 col-md-3">
						<label for="">Medico:</label>
						<input type="text" class="form-control" value="<?php echo $medico['nombres']; ?> &nbsp <?php echo $medico['apellidos']; ?>" readonly>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Consulta por:</label>
						<textarea name="txtConsulta" id="txtConsulta" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;" readonly><?php echo $array['consulta']; ?></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Antecedentes:</label>
						<textarea name="txtAntecedentes" id="txtAntecedentes" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;" readonly><?php echo $array['antecedentes']; ?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Impresion:</label>
						<textarea name="txtImpresion" id="txtImpresion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;" readonly><?php echo $array['impresion']; ?></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Plan:</label>
						<textarea name="txtPlan" id="txtPlan" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;" readonly><?php echo $array['plan']; ?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-warning" onClick="location.replace('index.php?mod=con&form=ed&id=<?php echo $array['_id']; ?>')"><i class="bi bi-pencil me-2" style="width: 30px"></i>Editar</button>
			 		</div>
			 		<div class="col-md-1"></div>
			 		<div class="form-group">
			 			<button type="button" class="btn btn-outline-danger" onClick="Eliminar('<?php echo $array['_id']; ?>');"><i class="bi bi-trash3 me-2"style=" width: 30px"></i>Eliminar</button>
			 		</div>
 				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function Eliminar( paId ){
        if( confirm('Seguro que desea eliminar el registro?')){
            window.location.replace('index.php?mod=con&form=el&id='+paId);
        }
    }
</script>