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
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Editar consulta</h3>
				</div>
				<div class="form-row d-flex justify-content-between mb-4">
					<div class="form-group ms-4 col-md-3">
						<label for="">Paciente:</label>
						<input type="text" name="txtNombre" class="form-control" value="<?php echo $paciente['nombres']; ?> &nbsp <?php echo $paciente['apellidos']; ?>" readonly>
						<input type="hidden" name="hidId" value="<?php echo $array['_id']; ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="">Fecha:</label>
						<input type="date" name="dateFecha" id="dateFecha" class="form-control" value="<?php echo $array['fecha']; ?>">
					</div>
					<div class="form-group me-4 col-md-3">
						<label for="">Medico:</label>
						<input type="text" class="form-control" value="<?php echo $medico['nombres']; ?> &nbsp <?php echo $medico['apellidos']; ?>" readonly>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Consulta por:</label>
						<textarea name="txtConsulta" id="txtConsulta" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"><?php echo $array['consulta']; ?></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Antecedentes:</label>
						<textarea name="txtAntecedentes" id="txtAntecedentes" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"><?php echo $array['antecedentes']; ?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Impresion:</label>
						<textarea name="txtImpresion" id="txtImpresion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"><?php echo $array['impresion']; ?></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Plan:</label>
						<textarea name="txtPlan" id="txtPlan" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"><?php echo $array['plan']; ?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-success" onClick="Actualizar();"><i class="bi bi-file-earmark-post-fill me-2" style="width: 30px"></i>Actualizar</button>
			 		</div>
			 		<div class="col-md-1"></div>
			 		<div class="form-group">
			 			<button type="button" class="btn btn-outline-danger" onClick="location.replace('index.php?mod=con&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Cancelar</button>
			 		</div>
 				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function Actualizar(){
		document.forms.frmEditar.action = 'index.php?mod=con&form=ac';
		document.forms.frmEditar.submit();
	}
</script>