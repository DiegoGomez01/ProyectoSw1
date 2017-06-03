<?php

include_once("Conexion.php");

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

    function consultarVentasyGastos() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select sum(total_vendido), sum(gasto_dia) from reporte_diario where \"fecha\">='$this->fecha';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "ventas_totales" => "" . pg_result($result, $i, 0),
                "gastos_totales" => "" . pg_result($result, $i, 1)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function crearReporte() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from reporte_diario where \"fecha\"='$this->fecha';";
        $result = pg_query($conect->Conexion, $Sql);
        if ($this->gasto_dia == '') {
            $this->gasto_dia = 0;
        }
        if ($this->gasto_totales == '') {
            $this->gasto_totales = 0;
        }
        if ($this->total_vendido == '') {
            $this->total_vendido = 0;
        }
        if ($this->total_actual == '') {
            $this->total_actual = 0;
        }
        if (pg_num_rows($result) > 0) {
            $Sql = "update reporte_diario set gasto_dia= '$this->gasto_dia', gasto_totales='$this->gasto_totales', total_vendido= '$this->total_vendido', total_actual='$this->total_actual' where fecha= '$this->fecha';";
            $result = pg_query($conect->Conexion, $Sql);
        } else {
            $Sql = "insert into reporte_diario values ('$this->fecha','$this->gasto_dia','$this->gasto_totales','$this->total_vendido','$this->total_actual');";
            $result = pg_query($conect->Conexion, $Sql);
        }
        echo 'Exito';
    }

}

?>