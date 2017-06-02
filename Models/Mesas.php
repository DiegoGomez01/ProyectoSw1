<?php
include_once("Conexion.php");
class mesa
{	
var $nombre;
var $estado;
var $hora_inicio;
var $hora_fin;


public function __construct($Datos)
{
extract($Datos);
$this->nombre = $nombre;
$this->estado = $estado;
$this->hora_inicio = $hora_inicio;
}

public function iniciarRegistroTiempo() {
$Conectar= new Conexion();
$Conectar->conectar(); 
$Sql="update mesa set estado='Ocupada',hora_inicio='$this->hora_inicio' where numero_mesa=$this->nombre ;";
pg_query($Conectar->Conexion,$Sql);	
}

public function consultarEstadoMesa()
{
$Conectar= new Conexion();
$Conectar->conectar();
$Sql="select * from mesa ORDER BY numero_mesa ASC";
$resultado = pg_query($Conectar->Conexion,$Sql);
$Filas=pg_numrows($resultado);
for($cont=0;$cont<$Filas;$cont++)
		 {
		 $response=array("nombre"=>"".pg_result($resultado,$cont,0),
						 "estado"=>"".pg_result($resultado,$cont,1),
						 ) ;
		 $M[$cont]=$response;
		 }
    echo json_encode($M);
}

}
?>
