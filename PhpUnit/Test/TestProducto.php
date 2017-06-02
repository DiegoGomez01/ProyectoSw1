<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/Productos.php");
	class TestProducto extends PHPUnit_Framework_TestCase{
		public function testRegistrarProductos(){
			$datos = array("id" => "", "nombre" => "Prueba", "precio" => "1000");
			$producto = new producto($datos);
			$comparar='Exito';
			$this->assertEquals($comparar,$producto->RegistrarProductos());
		}
		public function testConsultarDatosSelect(){
			$datos = array("id" => "", "nombre" => "", "precio" => "");
			$producto = new producto($datos);
			$comparar='Exito';
			$this->assertTrue(is_array($producto->ConsultarDatosSelect()));
		}
		public function testConsultarProductosPorNombre(){
			$datos = array("id" => "0", "nombre" => "", "precio" => "");
			$producto = new producto($datos);
			$comparar='Exito';
			$this->assertTrue(is_array($producto->ConsultarProductosPorNombre()));
		}
		public function testEditarProducto(){
			$datos = array("id" => "0", "nombre" => "Prueba2", "precio" => "1500");
			$producto = new producto($datos);
			$comparar='Exito';
			$this->assertEquals($comparar,$producto->EditarProducto());
		}
		public function testEliminarProducto(){
			$datos = array("id" => "0", "nombre" => "", "precio" => "");
			$producto = new producto($datos);
			$comparar='Error';
			$this->assertEquals($comparar,$producto->EliminarProducto());
		}
	}
?>