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
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<label for="">Paciente:</label>
						<input type="text" name="txtNombre" class="form-control" value="<?php echo $array['nombres']; ?> &nbsp <?php echo $array['apellidos']; ?>">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>