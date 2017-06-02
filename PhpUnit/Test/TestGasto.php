<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/gasto.php");
	class TestGasto extends PHPUnit_Framework_TestCase{
		public function testConsultarGastos(){
			$datos = array("fecha" => "2017-05-31 13:00", "descripcion" => "", "valor_invertido" => "");
			$gasto = new gasto($datos);
			$this->assertTrue(is_array($gasto->consultarGastos()));
		}
		public function testHayRegistroGastos(){
			$datos = array("fecha" => "2017-05-31 13:00", "descripcion" => "", "valor_invertido" => "");
			$gasto = new gasto($datos);
			$comparar='Bien';
			$this->assertEquals($comparar,$gasto->hayRegistroGastos());
		}
	}
?>