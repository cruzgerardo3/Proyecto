<?php  
require_once '../../datos/conf.php';
require_once '../../negocio/consultas.php';
require_once '../../negocio/paginador.php';
require_once '../../negocio/pacientes.php';

$Obj_consultas = new Consultas();
$Obj_paginador = new Paginador();
$Obj_pacientes = new Pacientes();

$DtConsultas = $Obj_consultas->ListarConsultas( $_GET['bu'] )->toArray();
$CtConsultas = $Obj_consultas->TotalRegistros( $_GET['bu'] );

// Configuramos el paginador
$Obj_paginador->Pag_EnlacePaginador = 'presentacion/consultas/gridConsultas.php';
$Obj_paginador->Pag_DivDestino = 'DivDataGrid';
$Obj_paginador->Pag_UrlVars = 'bu='.$_GET['bu'];
$Obj_paginador->Pag_CantidadTotalFilas = $CtConsultas;
$Obj_paginador->Pag_PaginaActual = $_GET['pga'];
$Obj_paginador->Pag_RegistrosMostrados = 5;
$Obj_paginador->Pag_RangoPagina = 5;
$Obj_paginador->ConfigurarPaginador();

// Se muestra el paginador
$Obj_paginador->MostrarPaginador($Obj_paginador->Pag_ContadorPagina);
?>

<table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <th scope="row">#</th>
                <th scope="row">Fecha</th>
                <th scope="row">Paciente</th>
                <th scope="row">Edad</th>
                <th scope="row">Tipo sanguineo</th>
                <th scope="row">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            for( $i = $Obj_paginador->Pag_RegistroInicial; $i < $Obj_paginador->Pag_ContadorRegistros; $i++ ){

                $datospaciente = $Obj_pacientes->BuscarPorId( $DtConsultas[$i]['idpaciente'] );
                foreach($datospaciente as $list){
                    $datospaciente = $list;
                }
                //Calculamos la edad a partir de la fecha de nacimiento capturada desde la base de datos 
                $dia = date("j");
                $mes = date("n");
                $anio = date("Y");

                $nacimiento = explode("-", $datospaciente['fechanac']);
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
                <th scope="col"><?php echo $i+1; ?></th>
                <td><?php echo $DtConsultas[$i]['fecha']; ?></td>
                <td><?php echo $datospaciente['nombres']; ?> &nbsp <?php echo $datospaciente['apellidos']; ?></td>
                <td><?php echo $Edad." años"; ?></td>
                <td><?php echo $datospaciente['tiposangre']; ?></td>
                <td>
                    <a href="index.php?mod=con&form=de&id=<?php echo $DtConsultas[$i]['_id']; ?>"><i class="bi bi-eye-fill ms-1" title="Detalles" style="color: blue; width: 30px"></i></a>
                    <a href="index.php?mod=con&form=ed&id=<?php echo $DtConsultas[$i]['_id']; ?>" class="edit"><i class="bi bi-pencil" title="Editar" style="color: #00BFFF; width: 30px"></i></a>
                    <a href="" onClick="Eliminar('<?php echo $DtConsultas[$i]['_id']; ?>');" class="delete ml-3"><i class="bi bi-trash3" title="Eliminar" data-toggle="tooltip" style="color: #FF0000; width: 30px"></i></a>
                </td>
            </tr>
        <?php  
        }
        ?>
        </tbody> 
    </table>