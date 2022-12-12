<?php 
require_once 'datos/conf.php';
require_once 'negocio/medicos.php';

$Obj_medicos = new Medicos();

 ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-3 ml-1">
            <button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=ci');"><i class="bi bi-box-arrow-left me-2"style="width: 30px"></i>Atras</button>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Buscar un registro...">
        </div>
        <div class="col-2">
            <button class="btn btn-info"><i class="bi bi-search" style="color: #fff; width: 30px"></i></button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=pa&form=nu');">Agregar medico</button>
        </div>
    </div>
    <?php
    $i=1;

    if($Obj_medicos->TotalRegistros()>0){
        $array = $Obj_medicos->ListarMedicos();
    ?>
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">Nombre</th>
                    <th scope="row">Edad</th>
                    <th scope="row">JVPM</th>
                    <th scope="row">Especialidad</th>
                    <th scope="row">Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php  
                foreach($array as $datos){

                    //Calculamos la edad a partir de la fecha de nacimiento capturada desde la base de datos 
                    $dia = date("j");
                    $mes = date("n");
                    $anio = date("Y");

                    $nacimiento = explode("-", $datos['fechanac']);
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
                <tr>
                    <th scope="col"><?php echo $i; ?></th>
                    <td><?php echo $datos['nombres']; ?> &nbsp <?php echo $datos['apellidos']; ?></td>
                    <td><?php echo $Edad." años"; ?></td>
                    <td><?php echo $datos['jvpm']; ?></td>
                    <td><?php echo $datos['especialidad']; ?></td>
                    <td class="row">
                        <div class="mr-4 col-1">
                            <a href="index.php?mod=me&form=ed&id=<?php echo $datos['_id']; ?>" class="edit"><i class="bi bi-pencil" title="Editar" style="color: #00BFFF; width: 30px"></i></a>
                        </div>
                        <div class="col-1">
                            <a href="" onClick="Eliminar('<?php echo $datos['_id']; ?>');" class="delete"><i class="bi bi-trash3" title="Eliminar" data-toggle="tooltip" style="color: #FF0000; width: 30px"></i></a>
                        </div>
                    </td>
                </tr>
            <?php 
            $i+=1;
            }//cierre del foreach
             ?>
            </tbody>
        </table>
        <?php 
        }else{
            echo "<h4><i>Sin registros en la base de datos</i></h4>";
        }
        ?>          
</div>