<?php 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';
$Obj_pacientes = new Pacientes();

$array = $Obj_pacientes->BuscarPorId( $_GET['id'] );

foreach( $array as $datos ){
	$array = $datos;
}

?>

<div class="container">
	<form action="" method="post" name="frmNuevo">
		<div class="form-row">
			<div class="form-group col-md-2 ms-2 mb-3">
				<button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=pa&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Cancelar</button>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Nueva consulta</h3>
				</div>
				<div class="form-row ms-4 mb-4">
					<div class="form-group col-md-4">
						<label for="">Paciente:</label>
						<input type="text" name="txtNombre" class="form-control" value="<?php echo $array['nombres']; ?> &nbsp <?php echo $array['apellidos']; ?>">
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Consulta por:</label>
						<textarea name="txtConsulta" id="txtConsulta" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Antecedentes:</label>
						<textarea name="txtAntecedentes" id="txtAntecedentes" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-5">
						<label for="">Impresion:</label>
						<textarea name="txtImpresion" id="txtImpresion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-5">
						<label for="">Plan:</label>
						<textarea name="txtPlan" id="txtPlan" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-success" onClick="Agregar();"><i class="bi bi-file-earmark-post-fill me-2" style="width: 30px"></i>Guardar</button>
			 		</div>
			 		<div class="col-md-1"></div>
			 		<div class="form-group">
			 			<button type="reload" class="btn btn-outline-danger"><i class="bi bi-arrow-clockwise me-2" style="width: 30px"></i>Restablecer</button>
			 		</div>
 				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function Agregar(){
		document.forms.frmNuevo.action = 'index.php?mod=me&form=ag';
		document.forms.frmNuevo.submit();
	}
</script>