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
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Editar registro de paciente</h3>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<input type="hidden" value="<?php echo $array['_id'];?>" name="hidId">
						<label for="">Nombres del paciente:</label>
						<input type="text" name="txtNombres" id="txtNombres" class="form-control" value="<?php echo $array['nombres'];?>">
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Apellidos del paciente:</label>
						<input type="text" name="txtApellidos" id="txtApellidos" class="form-control" value="<?php echo $array['apellidos'];?>">
					</div>
				</div>
				<div class="form-row d-flex justify-content-between mb-4">
					<div class="form-group ms-3 col-md-3">
						<label for="">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="dateFechaNac" id="dateFechaNac" value="<?php echo $array['fechanac'];?>">
					</div>
					<div class="form-group col-md-3">
						<label for="">Genero</label>
						<select name="cbxGenero" id="cbxGenero" class="form-control">
				 			<option selected="<?php echo $array['genero'];?>"><?php echo $array['fechanac'];?></option>
				 			<option value="Masculino">Masculino</option>
				 			<option value="Femenino">Femenino</option>
			 			</select>
					</div>
					<div class="form-group me-3 col-md-3">
						<label>Tipo de sangre:</label>
			 			<select name="cbxTipoSangre" id="cbxTipoSangre" class="form-control">
				 			<option selected="<?php echo $array['tiposangre'];?>"><?php echo $array['tiposangre'];?></option>
				 			<option value="O+">O+</option>
				 			<option value="O-">O-</option>
				 			<option value="A+">A+</option>
				 			<option value="A-">A-</option>
				 			<option value="B+">B+</option>
				 			<option value="B-">B-</option>
				 			<option value="AB+">AB+</option>
				 			<option value="AB-">AB-</option>
			 			</select>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<label for="">Telefono:</label>
						<input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo $array['telefono'];?>">
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Enfermedad:</label>
						<input type="text" name="txtEnfermedad" id="txtEnfermedad" class="form-control" value="<?php echo $array['enfermedad'];?>">
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					 <div class="form-group col-md-4">
					 	<label for="">Peso:</label>
					 	<input type="text" name="txtPeso" id="txtPeso" class="form-control" value="<?php echo $array['peso'];?>">
					 </div>
					 <div class="col-md-1"></div>
					 <div class="form-group col-md-4">
					 	<label for="">Altura:</label>
					 	<input type="text" name="txtAltura" id="txtAltura" class="form-control" value="<?php echo $array['altura'];?>">
					 </div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-8">
						<label>Direccion:</label>
				 		<textarea name="txtDireccion" id="txtDireccion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"><?php echo $array['direccion']; ?></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-success" onClick="Actualizar();"><i class="bi bi-file-earmark-post-fill me-2" style="width: 30px"></i>Actualizar</button>
			 		</div>
			 		<div class="col-md-1"></div>
			 		<div class="form-group">
			 			<button type="button" class="btn btn-outline-danger" onClick="location.replace('index.php?mod=pa&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Cancelar</button>
			 		</div>
 				</div>
			</div>
		 </div>
	</form>
</div>	

<script>
	function Actualizar(){
		document.forms.frmEditar.action = 'index.php?mod=pa&form=ac';
		document.forms.frmEditar.submit();
	}
</script>			