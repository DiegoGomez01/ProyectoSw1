<?php

include_once("Conexion.php");

class gasto {

    var $fecha;
    var $descripcion;
    var $valor_invertido;

    public function __construct($Datos) {
        extract($Datos);
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->valor_invertido = $valor_invertido;
    }

    public function __destruct() {
        $this->fecha;
        $this->descripcion;
        $this->valor_invertido;
    }

    function consultarGastos() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from gasto_diario where \"fecha\">='$this->fecha' and \"fecha\"<='$this->fecha 23:59';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "fecha" => "" . pg_result($result, $i, 0),
                "descripcion" => "" . pg_result($result, $i, 1),
                "valor_invertido" => "" . pg_result($result, $i, 2)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function hayRegistroGastos() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from gasto_diario where \"fecha\"='$this->fecha';";
        $result = pg_query($conect->Conexion, $Sql);
        if (pg_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function gastosDia() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select sum(valor_invertido) from gasto_diario where \"fecha\">='$this->fecha';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "gasto_dia" => "" . pg_result($result, $i, 0)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

}

?>