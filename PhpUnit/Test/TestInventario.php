<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/inventario.php");
	class TestInventario extends PHPUnit_Framework_TestCase{
		public function testConsultarDatosInventario(){
			$datos = array("id" => "2", "cInicial" => "", "cingresada" => "",
				"cActual" => "","cVendido" => "","Vtotal" => "");
			$inventario = new inventario($datos);
			$comparar='Exito';
			$this->assertTrue(is_array($inventario->ConsultarDatosInventario()));
		}
		public function testAumentarInventario(){
			$datos = array("id" => "2", "cInicial" => "", "cingresada" => "4",
				"cActual" => "","cVendido" => "","Vtotal" => "");
			$inventario = new inventario($datos);
			$comparar='Mal';
			$this->assertEquals($comparar,$inventario->aumentarInventario());
		}
		public function testRegPedCliente(){
			$datos = array("id" => "2", "cInicial" => "", "cingresada" => "",
				"cActual" => "","cVendido" => "","Vtotal" => "");
			$inventario = new inventario($datos);
			$comparar='Error';
			$this->assertEquals($comparar,$inventario->regPedCliente());
		}
	}
?>