<div class="container">
	<br>
	<form action="" name="frmNuevo" method="post">
		<div class="form-row">
			<div class="form-group col-md-2 ms-2 mb-3">
				<button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=pa&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Cancelar</button>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="form-row d-flex justify-content-center mb-4">
					<h3>Nuevo paciente</h3>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-4">
						<label for="">Nombres del paciente:</label>
						<input type="text" name="txtNombres" id="txtNombres" class="form-control">
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Apellidos del paciente:</label>
						<input type="text" name="txtApellidos" id="txtApellidos" class="form-control">
					</div>
				</div>
				<div class="form-row d-flex justify-content-between mb-4">
					<div class="form-group ms-3 col-md-3">
						<label for="">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="dateFechaNac" id="dateFechaNac">
					</div>
					<div class="form-group col-md-3">
						<label for="">Genero</label>
						<select name="cbxGenero" id="cbxGenero" class="form-control">
				 			<option selected>Seleccione..</option>
				 			<option value="Masculino">Masculino</option>
				 			<option value="Femenino">Femenino</option>
			 			</select>
					</div>
					<div class="form-group col-md-3 me-3">
						<label>Tipo de sangre:</label>
			 			<select name="cbxTipoSangre" id="cbxTipoSangre" class="form-control">
				 			<option selected>Seleccione..</option>
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
						<input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-4">
						<label for="">Enfermedad:</label>
						<input type="text" name="txtEnfermedad" id="txtEnfermedad" class="form-control">
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					 <div class="form-group col-md-4">
					 	<label for="">Peso</label>
					 	<input type="text" name="txtPeso" id="txtPeso" class="form-control">
					 </div>
					 <div class="col-md-1"></div>
					 <div class="form-group col-md-4">
					 	<label for="">Altura</label>
					 	<input type="text" name="txtAltura" id="txtAltura" class="form-control">
					 </div>
				</div>
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group col-md-8">
						<label>Direccion:</label>
				 		<textarea name="txtDireccion" id="txtDireccion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
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
		document.forms.frmNuevo.action = 'index.php?mod=pa&form=ag';
		document.forms.frmNuevo.submit();
	}
</script>			