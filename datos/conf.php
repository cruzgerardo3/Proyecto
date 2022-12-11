<?php

require_once __DIR__ . '../../vendor/autoload.php';

class Datos {
    
    public function Conectar(){
        return $conn = (new MongoDB\Client)->clinica;
    }

    public function ejecutarQuery( $paCadena ){
        return Conectar()->$paCadena;
    }
}

?>