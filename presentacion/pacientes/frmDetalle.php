<?php 	 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';

$Obj_pacientes = new Pacientes();

$array = $Obj_pacientes->BuscarPorId($_GET['id']);

foreach($array as $datos){
	$array = $datos;
}

?>
<div class="container">
	<br>
	<form action="" name="frmEditar" method="post">
		<div class="form-row">
			<div class="form-group col-md-2 ms-2 mb-3">
				<button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=pa&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Atras</button>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Detalles registro de paciente</h3>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<input type="hidden" value="<?php echo $array['_id'];?>" name="hidId">
						<label for="">Nombres del paciente:</label>
						<input type="text" name="txtNombres" id="txtNombres" class="form-control" value="<?php echo $array['nombres'];?>" readonly>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Apellidos del paciente:</label>
						<input type="text" name="txtApellidos" id="txtApellidos" class="form-control" value="<?php echo $array['apellidos'];?>" readonly>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<label for="">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="dateFechaNac" id="dateFechaNac" value="<?php echo $array['fechanac'];?>" readonly>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-4">
						<label>Tipo de sangre:</label>
			 			<input type="text" class="form-control" name="txtTipoSangre" id="txtTipoSangre" value="<?php echo $array['tiposangre'];?>" readonly> 
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<label for="">Telefono:</label>
						<input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo $array['telefono'];?>" readonly>
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Enfermedad:</label>
						<input type="text" name="txtEnfermedad" id="txtEnfermedad" class="form-control" value="<?php echo $array['enfermedad'];?>" readonly>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-8">
						<label>Direccion:</label>
				 		<textarea name="txtDireccion" id="txtDireccion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;" readonly><?php echo $array['direccion'];?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-warning" onClick="location.replace('index.php?mod=pa&form=ed&id=<?php echo $array['_id']; ?>')"><i class="bi bi-pencil me-2" style="width: 30px"></i>Editar</button>
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
            window.location.replace('index.php?mod=pa&form=el&id='+paId);
        }
    }
</script>	