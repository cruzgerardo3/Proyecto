<div class="container">

    <div class="row mt-5 d-flex justify-content-between">
        <div class="col-3 ml-1">
            <button type="button" class="btn btn-danger" onClick="location.replace('index.php?mod=ci');"><i class="bi bi-box-arrow-left me-2"style="width: 30px"></i>Atras</button>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
            <input type="text" class="form-control" name="txtBuscar" id="txtBuscar" autocomplete="off" onkeyup="DataGrid();" placeholder="Buscar..">
        </div>
    </div>
    <div id="DivDataGrid"></div>  
</div>
<script>
    DataGrid();

    function DataGrid() {
          let paBuscar = document.getElementById('txtBuscar').value;
          xhr = new XMLHttpRequest();
          xhr.open("GET", "presentacion/consultas/gridConsultas.php?pga=1&bu="+paBuscar, false);
          xhr.send();
          con = document.getElementById("DivDataGrid");
          res = xhr.responseText;
          con.innerHTML = res.AjaxParser();
    }

    function Eliminar( paId ){
        if( confirm('Seguro que desea eliminar el registro?')){
            window.location.replace('index.php?mod=con&form=el&id='+paId);
        }
    }
</script>