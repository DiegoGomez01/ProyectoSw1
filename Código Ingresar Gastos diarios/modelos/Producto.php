<?php

include_once ("../modelos/conexion.php");

class Producto
{
    var $Sql,$Mensaje;
    var $conexion;

    public function __construct()
    {
        $this->Sql="";
        $this->conexion=new Conexion();
        $this->conexion->conectar();
        $this->Mensaje=$this->conexion->getMensaje();
    }

    public function Obtener()
    {
        if($this->Mensaje=="Exito")
        {
            $this->Sql="SELECT \"nombre\" FROM \"producto\";";
            $registro=pg_exec($this->conexion->getConexion(),$this->Sql);
            return($registro);

        }else{
            return("");
        }
    }
}
?>