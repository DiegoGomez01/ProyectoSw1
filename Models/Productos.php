<?php
include_once("Conexion.php");
class producto
{	
var $id;
var $nombre;
var $precio;

public function __construct($Datos)
{
extract($Datos);
$this->id = $id;
$this->nombre = $nombre;
$this->precio = $precio;
}

public function RegistrarProductos() 
{
$Conectar= new Conexion();
$Conectar->conectar(); 
$Sql= "insert into producto values (default,'$this->nombre',$this->precio)";
$resultado = pg_query($Conectar->Conexion,$Sql);
	
$Sql2 = "insert into inventario values(current_timestamp,currval('secuencia_id'),0,0,0,0,0)";
$resultado1 =pg_query($Conectar->Conexion,$Sql2);
if(!$resultado or !$resultado1){
	return 'Error';
	}else{
		return 'Exito';
	}
}

public function ConsultarDatosSelect()
{
$Conectar= new Conexion();
$Conectar->conectar();
$Sql="select * from producto";
$resultado = pg_query($Conectar->Conexion,$Sql);
$Filas=pg_numrows($resultado);
$M = array();
for($cont=0;$cont<$Filas;$cont++)
		 {
		 $response=array("id"=>"".pg_result($resultado,$cont,0),
						 "nombre"=>"".pg_result($resultado,$cont,1),
						 "precio"=>"".pg_result($resultado,$cont,2),
						 ) ;
		 $M[$cont]=$response;
		 }
    return $M;
}

public function ConsultarProductosPorNombre()
{
$Conectar= new Conexion();
$Conectar->conectar();
$Sql="select * from producto where id=$this->id ORDER BY id ASC;";
$resultado = pg_query($Conectar->Conexion,$Sql);
$Filas=pg_numrows($resultado);
$M = array();
for($cont=0;$cont<$Filas;$cont++)
		 {
		 $response=array("id"=>"".pg_result($resultado,$cont,0),
		 				 "nombre"=>"".pg_result($resultado,$cont,1),
						 "precio"=>"".pg_result($resultado,$cont,2),
						 ) ;
		 $M[$cont]=$response;
		 }
    return $M;
}

public function EditarProducto()
{
$Conectar= new Conexion();
$Conectar->conectar();
$Sql="update producto set nombre='$this->nombre',precio=$this->precio where id=$this->id ;";
$resultado=pg_query($Conectar->Conexion,$Sql);
if(!$resultado){
	return 'Error';
	}else{
		return 'Exito';
	}
}

public function EliminarProducto()
{
$Conectar= new Conexion();
$Conectar->conectar();
$Sql="delete from producto where id=$this->id ;";
$resultado=pg_query($Conectar->Conexion,$Sql);	
if(!$resultado){
	return 'Error';
	}else{
		return 'Exito';
	}
}

}
?>
