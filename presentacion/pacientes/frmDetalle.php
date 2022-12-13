<?php 	 
require_once 'datos/conf.php';
require_once 'negocio/pacientes.php';

$Obj_pacientes = new Pacientes();

$array = $Obj_pacientes->BuscarPorId($_GET['id']);

foreach($array as $datos){
	$array = $datos;
}

//Calculamos la edad a partir de la fecha de nacimiento capturada desde la base de datos 
$dia = date("j");
$mes = date("n");
$anio = date("Y");

$nacimiento = explode("-", $array['fechanac']);
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
						<label for="">Paciente:</label>
						<input type="text" name="txtNombres" id="txtNombres" class="form-control" value="<?php echo $array['nombres'];?> &nbsp <?php echo $array['apellidos'];?>" readonly>
					</div>
					<div class="col-md-1"></div>
					<div class="form-group col-md-3">
						<label for="">Edad:</label>
						<input type="text" class="form-control" name="dateFechaNac" id="dateFechaNac" value="<?php echo $Edad;?> años" readonly>
					</div>
				</div>
				<div class="form-row d-flex justify-content-between mb-4">
					<div class="form-group col-md-2 ms-3">
						<label for="">Peso:</label>
						<input type="text" class="form-control" value="<?php echo $array['peso'];?>" readonly>
					</div>	
					<div class="form-group col-md-2 ms-3">
						<label for="">Altura:</label>
						<input type="text" class="form-control" value="<?php echo $array['altura'];?>" readonly>
					</div>	
					<div class="form-group col-md-2">
						<label for="">Genero</label>
						<input type="text" class="form-control" value="<?php echo $array['genero'];?>" readonly>
					</div>
					<div class="form-group me-3 col-md-2">
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