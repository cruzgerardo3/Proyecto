<?php  
require_once 'datos/conf.php';
require_once 'negocio/consultas.php';

$Obj_consultas = new Consultas();
?>
<div class="container">

    <div class="row mt-5">
        <div class="col-3 ml-1">
            <button type="button" class="btn btn-danger" onClick="location.replace('index.php');">Atras</button>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Buscar un registro...">
        </div>
        <div class="col-2">
            <button class="btn btn-info">Buscar</button>
        </div>
    </div>
    <?php
    $i=1;
    if($Obj_consultas->TotalRegistros()>0){
        $array = $conn->consultas->find();
    ?>
    <table class="table mt-2">
        <thead class="table-dark">
            <tr>
                <th scope="row">Fecha</th>
                <th scope="row">Paciente</th>
                <th scope="row">Edad</th>
                <th scope="row">Tipo sanguineo</th>
                <th scope="row">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            foreach($array as $datos){
        ?>
            <tr>
                <td>2022-10-10</td>
                <td>Alberto Gutierrez</td>
                <td>21</td>
                <td>O+</td>
                <td>
                    <a href="frmModificar.php?id=" class="edit"><i class="bi bi-pencil" title="Editar" style="color: #00BFFF; width: 30px"></i></a>
                    <a href="" onClick="Eliminar('');" class="delete ml-3"><i class="bi bi-trash3" title="Eliminar" data-toggle="tooltip" style="color: #FF0000; width: 30px"></i></a>
                </td>
            </tr>
        <?php  
        $i+=1;
        }
        ?>
        </tbody> 
    </table>
    <?php 
    }else{
        echo "<br><h4><i>Sin registros en la base de datos</i></h4>";
    }
    ?>   
</div>