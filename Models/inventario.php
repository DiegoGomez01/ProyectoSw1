<?php
include_once("Conexion.php");
class inventario
{	
var $id_producto;
var $cant_inicial;
var $cant_ingresada;
var $cant_actual;
var $cant_vendido;
var $venta_total;


	public function __construct($Datos){
		extract($Datos);
		$this->id_producto = $id;
		$this->cant_inicial = $cInicial;
		$this->cant_ingresada = $cingresada;
		$this->cant_actual = $cActual;
		$this->cant_vendido = $cVendido;
		$this->venta_total = $Vtotal;
	}
	
	public function ConsultarDatosInventario()
	{
	$Conectar= new Conexion();
	$Conectar->conectar();
	$Sql="select * from producto inner join inventario on inventario.id_producto=producto.id where producto.id=$this->id_producto";
	$resultado = pg_query($Conectar->Conexion,$Sql);
	$Filas=pg_numrows($resultado);
	for($cont=0;$cont<$Filas;$cont++)
			 {
			 $response=array("id"=>"".pg_result($resultado,$cont,0),
							 "nombre"=>"".pg_result($resultado,$cont,1),
							 "precio"=>"".pg_result($resultado,$cont,2),
	"fecha"=>"".pg_result($resultado,$cont,3),
	"id_producto"=>"".pg_result($resultado,$cont,4),
	"cantidad_inicial"=>"".pg_result($resultado,$cont,5),
	"cantidad_ingresada"=>"".pg_result($resultado,$cont,6),
	"cantidad_actual"=>"".pg_result($resultado,$cont,7),
	"cantidad_vendido"=>"".pg_result($resultado,$cont,8),
	"venta_total"=>"".pg_result($resultado,$cont,9)
							 ) ;
			 $M[$cont]=$response;
			 }
		echo json_encode($M);
	}
	public function aumentarInventario(){
		$Conectar= new Conexion();
		$Conectar->conectar();
		$Sql="select cantidad_actual from inventario where id_producto= $this->id_producto";
		$resultado = pg_query($Conectar->Conexion,$Sql);
		$num=pg_result($resultado,0,0);
		$num=($this->cant_ingresada)+$num;
		$Sql1="update inventario set cantidad_ingresada = $this->cant_ingresada where id_producto= $this->id_producto";
		$resultado1 = pg_query($Conectar->Conexion,$Sql1);
		
		$Sql2="update inventario set cantidad_actual = $num where id_producto= $this->id_producto";
		$resultado2 = pg_query($Conectar->Conexion,$Sql2);
		
		if(!$resultado or !$resultado1  or !$resultado2){
		echo 'Error';
		}else{
			echo 'Exito';
		}
	}

	public function regPedCliente(){
		$Conectar= new Conexion();
		$Conectar->conectar();

		$Sql="select cantidad_vendido from inventario where id_producto= $this->id_producto";
		$resultado = pg_query($Conectar->Conexion,$Sql);
		$num=(int)pg_result($resultado,0,0)+(int)$this->cant_vendido;

		$Sql="update inventario set cantidad_vendido=$num where id_producto= $this->id_producto";
		$resultado1 = pg_query($Conectar->Conexion,$Sql);


		$Sql="select cantidad_actual from inventario where id_producto= $this->id_producto";
		$resultado2 = pg_query($Conectar->Conexion,$Sql);
		$num2=(int)pg_result($resultado2,0,0)-(int)$this->cant_vendido;

		$Sql="update inventario set cantidad_actual=$num2 where id_producto= $this->id_producto";
		$resultado3 = pg_query($Conectar->Conexion,$Sql);
		if(!$resultado or !$resultado1 or !$resultado2 or !$resultado3){
		echo 'Error';
		}else{
			echo 'Exito';
		}
	}
	
}
?>