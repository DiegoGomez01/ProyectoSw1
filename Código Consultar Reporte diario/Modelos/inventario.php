<?php 
include_once("conexion.php");

class inventario {

    var $fecha;
    var $id_producto;
    var $cantidad_inicial;
    var $cantidad_ingresada;
    var $cantidad_actual;
    var $cantidad_vendido;
    var $venta_total;

    public function __construct($Datos) {
        extract($Datos);
        $this->fecha = $fecha;
        $this->id_producto = $id_producto;
        $this->cantidad_inicial = $cinicial;
        $this->cantidad_ingresada = $cingresada;
        $this->cantidad_actual = $cactual;
        $this->cantidad_vendido = $cvendido;
        $this->venta_total = $vtotal;
    }

    public function __destruct() {
        $this->fecha;
        $this->id_producto;
        $this->cantidad_inicial;
        $this->cantidad_ingresada;
        $this->cantidad_actual;
        $this->cantidad_vendido;
        $this->venta_total;
    }

    function consultarInventario() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from inventario where \"fecha\"='$this->fecha';";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "fecha" => "" . pg_result($result, $i, 0),
                "id_producto" => "" . pg_result($result, $i, 1),
                "cantidad_inicial" => "" . pg_result($result, $i, 2),
                "cantidad_ingresada" => "" . pg_result($result, $i, 3),
                "cantidad_actual" => "" . pg_result($result, $i, 4),
                "cantidad_vendido" => "" . pg_result($result, $i, 5),
                "venta_total" => "" . pg_result($result, $i, 6)
            );
            $M[$i] = $res;
        }
        $res = $M;
        echo json_encode($res);
    }

    function hayRegistroInventario() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select * from inventario where \"fecha\"='$this->fecha';";
        $result = pg_query($conect->Conexion, $Sql);
        if (pg_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>