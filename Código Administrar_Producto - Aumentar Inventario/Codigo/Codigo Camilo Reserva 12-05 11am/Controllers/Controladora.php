<?php
include_once("../Models/Productos.php");
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
public function EliminarProductos($Datos)
{
$Product= new producto($Datos);	
$Product->EliminarProducto();	
}	


}

$Datos=$_REQUEST;
$Obj= new controladora();

if ($_REQUEST['Accion'] == 0){
	$Obj->CrearProducto($Datos);
	}
	if ($_REQUEST['Accion'] == 1){
	$Obj->ConsultarDatosParaSelect($Datos);
	}
if ($_REQUEST['Accion'] == 2){
	$Obj->ConsultarDatosProductoNombre($Datos);
	}
if ($_REQUEST['Accion'] == 3){
	$Obj->EditarProductos($Datos);
	}
if ($_REQUEST['Accion'] == 4){
	$Obj->EliminarProductos($Datos);
	}
?>