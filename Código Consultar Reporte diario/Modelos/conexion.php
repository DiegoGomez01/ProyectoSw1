<?php
class Conexion {

    var $Conexion;

//funcion para realizar la conexion
    public function __construct() {
        $this->Conexion = '';
    }

    public function conectar() {
        $this->Conexion = pg_connect('dbname=Billar user=postgres password=openpg host=localhost port=5432');
        if (!$this->Conexion) {
            echo json_encode("Error al conectar");
        }
    }

    public function __destruct() {
        $this->Conexion;
    }

}
?>