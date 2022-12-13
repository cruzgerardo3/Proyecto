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
        <div class="form-row">
            <div class="form-group col-md-2 ms-2 mb-3">
                <button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=me&form=li');"><i class="bi bi-x-circle me-2"style=" width: 30px"></i>Atras</button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-row d-flex justify-content-center mb-4">
                    <h3>Detalles registro medico</h3>
                </div>
                <div class="form-row d-flex justify-content-between mb-4 ms-3">
                    <div class="form-group col-md-3 ms-4">
                        <label for="">Nombres del medico:</label>
                        <input type="text" name="txtNombres" id="txtNombres" class="form-control" value="<?php echo $array['nombres'];?> &nbsp <?php echo $array['apellidos'];?>" readonly>
                    </div>
                    <div class="form-group col-md-3 me-3">
                        <label for="">Fecha de nacimiento:</label>
                        <input type="text" name="dateFechaNac" id="dateFechaNac" class="form-control" value="<?php echo $array['fechanac']; ?>" readonly>
                    </div>
                     <div class="form-group col-md-2 me-4">
                        <label for="">DUI:</label>
                        <input type="text" name="txtDUI" id="txtDUI" class="form-control" value="<?php echo $array['dui']; ?>" readonly>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-between mb-4 ms-3">
                    <div class="form-group col-md-2 ms-4">
                        <label for="">Genero:</label>
                        <input type="text" name="txtDUI" id="txtDUI" class="form-control" value="<?php echo $array['genero'];?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Especialidad:</label>
                        <input type="text" name="txtEspecialidad" id="txtEspecialidad" class="form-control" value="<?php echo $array['especialidad']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">JVPM:</label>
                        <input type="text" name="txtJVPM" id="txtJVPM" class="form-control" value="<?php echo $array['jvpm']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-2 me-3">
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo $array['telefono']; ?>" readonly>
                    </div>
                </div>
                </div>
                <div class="form-row d-flex justify-content-center mb-3">
                    <div class="form-group">
                         <button type="button" class="btn btn-outline-warning" onClick="location.replace('index.php?mod=me&form=ed&id=<?php echo $array['_id']; ?>')"><i class="bi bi-pencil me-2" style="width: 30px"></i>Editar</button>
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
            window.location.replace('index.php?mod=me&form=el&id='+paId);
        }
    }
</script>