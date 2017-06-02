<?php

include_once("Conexion.php");

class pedido_mesa {

    var $fecha;
    var $n_mesa;
    var $id_producto;
    var $cantidad;
    var $estado;

    public function __construct($Datos) {
        extract($Datos);
        $this->fecha = $fecha;
        $this->n_mesa = $n_mesa;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
    }

    public function __destruct() {
        $this->fecha;
        $this->n_mesa;
        $this->id_producto;
        $this->cantidad;
        $this->estado;
    }

    function consultarPedidosMesas() {
        $conect = new Conexion();
        $conect->conectar();
        $Sql = "select nombre, cantidad, cantidad*precio from (select * from pedido_mesa where estado='Entregado' and fecha>='$this->fecha' and numero_mesa='$this->n_mesa')p join producto on id=p.id_producto;";
        $M = array();
        $result = pg_exec($conect->Conexion, $Sql);
        $fila = pg_num_rows($result);
        for ($i = 0; $i < $fila; $i++) {
            $res = array(
                "nombre" => "" . pg_result($result, $i, 0),
                "cantidad" => "" . pg_result($result, $i, 1),
                "precio" => "" . pg_result($result, $i, 2)
            );
            $M[$i] = $res;
        }
        $res = $M;
        return $res;
    }
}

?>