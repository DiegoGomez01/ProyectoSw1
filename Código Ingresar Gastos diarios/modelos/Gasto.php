<?php

include_once ("../modelos/conexion.php");

class Gasto{

    var $Sql,$Mensaje;
    var $conexion;

    public function __construct()
    {
        $this->Sql="";
        $this->conexion=new Conexion();
        $this->conexion->conectar();
        $this->Mensaje=$this->conexion->getMensaje();
    }

    public function  RegistrarProducto($producto,$valor)
    {
        if($this->Mensaje=="Exito") {
            $this->Sql = "INSERT INTO \"gasto_diario\" VALUES(current_timestamp,'".$producto."',$valor);";
            pg_exec($this->conexion->getConexion(), $this->Sql);
        }
    }
}
?>