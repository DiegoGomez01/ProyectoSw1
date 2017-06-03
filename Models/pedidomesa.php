<?php

include_once ("../Models/Conexion.php");

class pedidomesa{

    var $Sql,$Mensaje;
    var $conexion;

    public function __construct()
    {
        $this->Sql="";
        $this->Sql1="";
        $this->conexion=new Conexion();
        $this->conexion->conectar();
        $this->Mensaje=$this->conexion->getMensaje();
    }

    public function  registrarPedido($producto,$cantidad,$mesa)
    {
        if($this->Mensaje=="Exito") {
            $this->Sql1="select \"id\" from \"producto\" where \"nombre\"='".$producto."';";
            $registro=pg_exec($this->conexion->getConexion(),$this->Sql1);
            $result="".pg_result($registro,0,0);
            echo $result;

            $this->Sql = "INSERT INTO \"pedido_mesa\" VALUES(current_timestamp,$mesa,$result,$cantidad,'Solicitado');";
            pg_exec($this->conexion->getConexion(), $this->Sql);
        }
    }
}
?>