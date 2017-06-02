<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/mesa.php");
	class TestMesa extends PHPUnit_Framework_TestCase{
		public function testConsultarMesas(){
			$datos = array("n_mesa" => "", "estado" => "", "hora_inicio" => "",
				"precio" => "");
			$mesa = new mesa($datos);
			$this->assertTrue(is_array($mesa->consultarMesas()));
		}
		public function testConsultarMesa(){
			$datos = array("n_mesa" => "0", "estado" => "", "hora_inicio" => "",
				"precio" => "");
			$mesa = new mesa($datos);
			$this->assertTrue(is_array($mesa->consultarMesa()));
		}
		public function testCambiarestado(){
			$datos = array("n_mesa" => "0", "estado" => "Disponible", "hora_inicio" => null,
				"precio" => "");
			$mesa = new mesa($datos);
			$comparar='Exito';
			$this->assertEquals($comparar,$mesa->cambiarestado());
		}
	}
?>