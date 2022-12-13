<?php    
require_once 'datos/conf.php';
require_once 'negocio/medicos.php';

$Obj_medicos = new Medicos();

$array = $Obj_medicos->BuscarPorId( $_GET['id'] );

foreach( $array as $datos ){
    $array = $datos;
}

?>

<div class="container">
    <br>
    <form action="" name="frmEditar" method="post">
        <div class="card">
            <div class="card-body">
                <div class="form-row d-flex justify-content-center mb-4">
                    <h3>Editar registro de medico</h3>
                </div>
                <div class="form-row d-flex justify-content-between mb-4 ms-3">
                    <div class="form-group col-md-3">
                        <label for="">Nombres del medico:</label>
                        <input type="text" name="txtNombres" id="txtNombres" class="form-control" value="<?php echo $array['nombres']; ?>">
                        <input type="hidden" name="hidId" value="<?php echo $array['_id']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Apellidos del medico:</label>
                        <input type="text" name="txtApellidos" id="txtApellidos" class="form-control" value="<?php echo $array['apellidos']; ?>">
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="date" name="dateFechaNac" id="dateFechaNac" class="form-control" value="<?php echo $array['fechanac']; ?>">
                    </div>
                </div>
                <div class="form-row d-flex justify-content-between mb-4 ms-3">
                    <div class="form-group col-md-3">
                        <label for="">DUI:</label>
                        <input type="text" name="txtDUI" id="txtDUI" class="form-control" value="<?php echo $array['dui']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Genero:</label>
                        <select name="cbxGenero" id="cbxGenero" class="form-control" >
                            <option selected="<?php echo $array['genero']; ?>"><?php echo $array['genero']; ?></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Especialidad:</label>
                        <input type="text" name="txtEspecialidad" id="txtEspecialidad" class="form-control" value="<?php echo $array['especialidad']; ?>">
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center mb-4 ms-3">
                    <div class="form-group col-md-3">
                        <label for="">JVPM:</label>
                        <input type="text" name="txtJVPM" id="txtJVPM" class="form-control" value="<?php echo $array['jvpm']; ?>">
                    </div>
                    <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo $array['telefono']; ?>">
                    </div>
                </div>
                <div class="form-row d-flex justify-content-between mb-4 ms-3">
                    <div class="form-group col-md-3">
                        <label for="">Usuario:</label>
                        <input type="text" name="txtUser" id="txtUser" class="form-control" value="<?php echo $array['usuario']; ?>">
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Contraseña:</label>
                        <input type="password" name="passCon" id="passCon" class="form-control" value="<?php echo $array['pass']; ?>">
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Tipo de usuario:</label>
                        <select name="cbxTipoUsuario" id="cbxTipoUsuario" class="form-control">
                            <option selected="<?php echo $array['tipousuario']; ?>"><?php echo $array['tipousuario']; ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center mt-2">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-success" onClick="Actualizar();"><i class="bi bi-file-earmark-post-fill me-2" style="width: 30px"></i>Actualizar</button>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-danger" onClick="location.replace('index.php?mod=me&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Cancelar</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<script>
    function Actualizar(){
        document.forms.frmEditar.action = 'index.php?mod=me&form=ac';
        document.forms.frmEditar.submit();
    }
</script>