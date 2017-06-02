<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/inventario.php");
	class TestProducto extends PHPUnit_Framework_TestCase{
		public function testPrueba(){
			$datos = array("id" => "", "cInicial" => "", "cingresada" => "",
				"cActual" => "","cVendido" => "","Vtotal" => "");
			$inventario = new inventario($datos);
			$comparar='Exitos';
			$this->assertEquals($comparar,$inventario->prueba());
		}
	}
?>