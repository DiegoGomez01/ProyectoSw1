<?php
include_once("../Models/Productos.php");
include_once("../Models/inventario.php");
include_once("../Models/Mesas.php");

class controladora
{

public function  __construct()
{}
	
public function CrearProducto($Datos)
{
$Product= new producto($Datos);	
$Product->RegistrarProductos();	
}
public function ConsultarDatosProductoNombre($Datos)
{
$Product= new producto($Datos);	
$Product->ConsultarProductosPorNombre();	
}	
public function ConsultarDatosParaSelect($Datos)
{
$Product= new producto($Datos);	
$Product->ConsultarDatosSelect();	
}	
public function EditarProductos($Datos)
{
$Product= new producto($Datos);	
$Product->EditarProducto();	
}
public function ConsultarDatosInventario($Datos)
{
$inventario= new inventario($Datos);	
$inventario->ConsultarDatosInventario();	
}
public function aumentarInventarioProducto($Datos)
{
$inventario= new inventario($Datos);	
$inventario->aumentarInventario();	
}	
public function EliminarProductos($Datos)
{
$Product= new producto($Datos);	
$Product->EliminarProducto();	
}	

public function registrarPeridoCliente($Datos)
{
$inventario= new inventario($Datos);	
$inventario->regPedCliente();	
}

public function consultarEstadosMesas ($Datos)
{
$mesa = new mesa($Datos);
$mesa->consultarEstadoMesa();	
}

public function iniciarRegistroTiempoMesa ($Datos) {
$mesa = new mesa($Datos);
$mesa->iniciarRegistroTiempo();
}


}

$Datos=$_REQUEST;
$Obj= new controladora();

if ($_REQUEST['Accion'] == 0){
	$Obj->CrearProducto($Datos);
	}
else if ($_REQUEST['Accion'] == 1){
	$Obj->ConsultarDatosParaSelect($Datos);
	}
else if ($_REQUEST['Accion'] == 2){
	$Obj->ConsultarDatosProductoNombre($Datos);
	}
else if ($_REQUEST['Accion'] == 3){
	$Obj->EditarProductos($Datos);
	}
else if ($_REQUEST['Accion'] == 4){
	$Obj->EliminarProductos($Datos);
	}
else if ($_REQUEST['Accion'] == 5){
	$Obj->ConsultarDatosInventario($Datos);
	}
else if ($_REQUEST['Accion'] == 6){
	$Obj->aumentarInventarioProducto($Datos);
	}
else if ($_REQUEST['Accion'] == 7){
	$Obj->registrarPeridoCliente($Datos);
	}
else if ($_REQUEST['Accion'] == 8){
	$Obj->consultarEstadosMesas($Datos);
	}
else if ($_REQUEST['Accion'] == 9){
	$Obj->iniciarRegistroTiempoMesa($Datos);
	}
?>