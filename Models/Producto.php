<?php

include_once ("../Models/Conexion.php");

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
            $this->Sql="select  \"nombre\" from \"producto\";";
            $registro=pg_exec($this->conexion->getConexion(),$this->Sql);
            return($registro);

        }else{
            return("");
        }
    }

    public function ObtenerM()
    {
        if($this->Mensaje=="Exito")
        {
                   

            $this->Sql="select \"nombre\",\"precio\" from \"producto\";";
            $registro=pg_exec($this->conexion->getConexion(),$this->Sql);
            return($registro);

        }else{
            return("");
        }
    }
}
?>