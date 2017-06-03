<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/reporte.php");
	class TestReporte extends PHPUnit_Framework_TestCase{
		public function testConsultarReporte(){
			$datos = array("fecha" => "2017-05-31", "gasto_dia" => "", "gasto_totales" => ""
				, "total_vendido" => "", "total_actual" => "");
			$reporte = new reporte($datos);
			$this->assertTrue(is_array($reporte->consultarReporte()));
		}
		public function testHayRegistroReporte(){
			$datos = array("fecha" => "2017-05-31", "gasto_dia" => "", "gasto_totales" => ""
				,"total_vendido" => "", "total_actual" => "");
			$reporte = new reporte($datos);
			$comparar='HAY REGISTROSss';
			$this->assertEquals($comparar,$reporte->hayRegistroReporte());
		}
	}
?>