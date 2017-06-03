<?php

include_once("Conexion.php");

class mesa {

    var $n_mesa;
    var $estado;
    var $hora_inicio;
    var $precio;

    public function __construct($Datos) {
        extract($Datos);
        $this->n_mesa = $n_mesa;
        $this->estado = $estado;
        $this->hora_inicio = $hora_inicio;
        $this->precio = $precio;
    }

    public function __destruct() {
        $this->n_mesa;
        $this->estado;
        $this->hora_inicio;
        $this->precio;
    }

    function consultarMesas() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from mesa order by numero_mesa;";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "n_mesa" => "" . pg_result($result, $i, 0),
                "estado" => "" . pg_result($result, $i, 1),
                "hora_inicio" => "" . pg_result($result, $i, 2)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function consultarMesa() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from mesa where \"numero_mesa\"='$this->n_mesa';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "n_mesa" => "" . pg_result($result, $i, 0),
                "estado" => "" . pg_result($result, $i, 1),
                "hora_inicio" => "" . pg_result($result, $i, 2),
                "precio" => "" . pg_result($result, $i, 3)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function cambiarestado() {
        $conect = new Conexion();
        $conect->conectar();
        if ($this->hora_inicio == null) {
            $Sql = "UPDATE mesa SET estado='$this->estado',hora_inicio=null Where numero_mesa='$this->n_mesa';";
        } else{
            $Sql = "UPDATE mesa SET estado='$this->estado',hora_inicio='$this->hora_inicio' Where numero_mesa='$this->n_mesa';";
        }
        $result = pg_exec($conect->Conexion, $Sql);
        echo 'Exito';
    }

}

?>