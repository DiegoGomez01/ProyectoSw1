<?php

include_once("conexion.php");

class reporte {

    var $fecha;
    var $gasto_dia;
    var $gasto_totales;
    var $total_vendido;
    var $total_actual;

    public function __construct($Datos) {
        extract($Datos);
        $this->fecha = $fecha;
        $this->gasto_dia = $gasto_dia;
        $this->gasto_totales = $gasto_totales;
        $this->total_vendido = $total_vendido;
        $this->total_actual = $total_actual;
    }

    public function __destruct() {
        $this->fecha;
        $this->gasto_dia;
        $this->gasto_totales;
        $this->total_vendido;
        $this->total_actual;
    }

    function consultarReporte() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from reporte_diario where \"fecha\"='$this->fecha';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "fecha" => "" . pg_result($result, $i, 0),
                "gasto_dia" => "" . pg_result($result, $i, 1),
                "gasto_totales" => "" . pg_result($result, $i, 2),
                "total_vendido" => "" . pg_result($result, $i, 3),
                "total_actual" => "" . pg_result($result, $i, 4)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function hayRegistroReporte() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from reporte_diario where \"fecha\"='$this->fecha';";
        $result = pg_query($conect->Conexion, $Sql);
        if (pg_num_rows($result) > 0) {
            echo 'HAY REGISTROS';
        } else {
            echo 'NO HAY REGISTROS';
        }
    }
}

?>