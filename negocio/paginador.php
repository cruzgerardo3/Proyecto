<?php
class Paginador
{
  //Atributos para los paginadores
  public $Pag_RegistrosMostrados;
  public $Pag_PaginaActual;
  public $Pag_RegistroInicial;
  public $Pag_ContadorRegistros;
  public $Pag_ContadorPagina;
  public $Pag_EnlacePaginador;
  public $Pag_CantidadTotalFilas;
  public $Pag_DivDestino;
  public $Pag_UrlVars;
  public $Pag_RangoPagina;
  protected $Pag_ContadorRango;
  
  //Función que permite establecer las configuraciones iniciales del los paginadores
  public function ConfigurarPaginador()
  {
    //$this->Pag_RegistrosMostrados = 7;
    //$this->Pag_RangoPagina = 50;
    //$this->Pag_PaginaActual = @$paGetPaginaSolicitada;
    if (!$this->Pag_PaginaActual) {
      $this->Pag_PaginaActual = 1;
    }

    if ($this->Pag_CantidadTotalFilas % $this->Pag_RegistrosMostrados != 0) {
        $this->Pag_ContadorPagina = intval($this->Pag_CantidadTotalFilas / $this->Pag_RegistrosMostrados) + 1;
    }
    else {
      $this->Pag_ContadorPagina = intval($this->Pag_CantidadTotalFilas / $this->Pag_RegistrosMostrados);
    }

    $this->Pag_RegistroInicial = $this->Pag_RegistrosMostrados * ($this->Pag_PaginaActual - 1);

    $this->Pag_ContadorRegistros = min($this->Pag_RegistrosMostrados * $this->Pag_PaginaActual, $this->Pag_CantidadTotalFilas);

  }//Fin de método ConfigIni_Paginador()

  //Funcion que general el paginador
  function MostrarPaginador( $paContadorPagina )
  {
    $this->Pag_ContadorPagina = $paContadorPagina;
  ?>
    <ul class="pagination pagination-sm" style="margin-top: 7px;margin-bottom: 7px;"><?php

    if ($this->Pag_PaginaActual > 1) { ?>
      <td><li class="page-item"><a class="page-link" href="#" style="font-size: 10.5px; font-weight: bold;" onclick="CargarDataGrid('<?php echo $this->Pag_PaginaActual - 1; ?>');"><</a></li></td> <?php 
    } 

  if ($this->Pag_ContadorPagina > 1) {

  if ($this->Pag_ContadorPagina % $this->Pag_RangoPagina != 0) {
      $this->Pag_ContadorRango = intval($this->Pag_ContadorPagina / $this->Pag_RangoPagina) + 1;
  }
  else {
    $this->Pag_ContadorRango = intval($this->Pag_ContadorPagina / $this->Pag_RangoPagina);
  }

  $PgLimitGroup = 0; //FIX para limitar cantidad de grupos de páginas 01-10-2022 #################################
  for ($i = 1; $i < $this->Pag_ContadorRango + 1; $i++) {
    $this->Pag_PaginaActualInicial = (($i - 1) * $this->Pag_RangoPagina) + 1;
    $this->Pag_CantidadTotalFilas = min($i * $this->Pag_RangoPagina, $this->Pag_ContadorPagina);

    if ((($this->Pag_PaginaActual >= $this->Pag_PaginaActualInicial) && ($this->Pag_PaginaActual <= ($i * $this->Pag_RangoPagina)))) {
      for ($j = $this->Pag_PaginaActualInicial; $j < $this->Pag_CantidadTotalFilas + 1; $j++) {
        if ($j == $this->Pag_PaginaActual) { ?>
          <li class="page-item active"><span class="page-link" style="font-size: 10.5px; background-color: #0040FF; border-color: #0040FF;"><?php echo $j ?><span class="sr-only">(current)</span></span></li><?php
        }
        else { ?>
          <li class="page-item"><a class="page-link" href="#" style="font-size: 10.5px;" onclick="CargarDataGrid('<?php echo $j; ?>');" ><?php echo $j ?></a></li><?php

          }
        }
      }
      else { 
        if ( $PgLimitGroup <= 10 ){
        ?>
        <li class="page-item"><a class="page-link" href="#"  onclick="CargarDataGrid('<?php echo $this->Pag_PaginaActualInicial; ?>');" style="font-size: 10.5px;color:#57667A;"><?php echo $this->Pag_PaginaActualInicial ."..." .$this->Pag_CantidadTotalFilas ?></a></li><?php
          }
        }
        $PgLimitGroup++;
      }
    }
    if ($this->Pag_PaginaActual < $this->Pag_ContadorPagina) { ?>
      <td><li class="page-item"><a class="page-link" href="#" style="font-size: 10.5px; font-weight: bold;" onclick="CargarDataGrid( '<?php echo $this->Pag_PaginaActual + 1 ?>');">></a></li></td> <?php 
    }
    ?>
        </ul>

        <script type="text/javascript">
        function CargarDataGrid( paPaginaSolicitada ) {
            xhr = new XMLHttpRequest();
            xhr.open("GET", "<?php echo $this->Pag_EnlacePaginador; ?>?pga=" + paPaginaSolicitada + "&<?php echo @$this->Pag_UrlVars; ?>", false);
            xhr.send();
            con = document.getElementById("<?php echo $this->Pag_DivDestino; ?>");
            res = xhr.responseText;
            con.innerHTML = res.AjaxParser();
        }
        </script>
    <?php
    }//Fin de método que muestra el paginador
}//Fin de la clase Paginador

?>