<div class="container">
	<br>
	<form action="" name="frmNuevo" method="post">
		<div class="card">
			<div class="card-body">
				<div class="form-row mt-3">
					<div class="form-group col-md-2 ms-5 mb-4">
						<button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=pa&form=li');">Cancelar</button>
					</div>
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
				<div class="form-row d-flex justify-content-center mb-4">
					<div class="form-group  col-md-4">
						<label for="">Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="dateFechaNac" id="dateFechaNac">
					</div>
					<div class="form-group col-md-1"></div>
					<div class="form-group col-md-4">
						<label>Tipo de sangre:</label>
			 			<select name="txtTipoSangre" id="txtTipoSangre" class="form-control">
				 			<option selected>Seleccione..</option>
				 			<option value="O RH+">O+</option>
				 			<option value="O RH-">O-</option>
				 			<option value="A RH+">A+</option>
				 			<option value="A RH-">A-</option>
				 			<option value="B RH+">B+</option>
				 			<option value="B RH-">B-</option>
				 			<option value="AB RH+">AB+</option>
				 			<option value="AB RH-">AB-</option>
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
					<div class="form-group col-md-8">
						<label>Direccion:</label>
				 		<textarea name="txtDireccion" id="txtDireccion" class="form-control" style="min-height: 65px; max-height: 65px; width: 100% max-width: 100%;"></textarea>
					</div>
				</div>
				<div class="form-row d-flex justify-content-center mt-2">
			 		<div class="form-group">
			 			 <button type="button" class="btn btn-outline-success" onClick="Agregar();">Guardar</button>
			 		</div>
			 		<div class="col-md-1"></div>
			 		<div class="form-group">
			 			<button type="reload" class="btn btn-outline-danger">Restablecer</button>
			 		</div>
 				</div>
			</div>
		 </div>
	</form>
</div>				