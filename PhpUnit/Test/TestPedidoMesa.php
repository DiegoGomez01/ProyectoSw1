<?php 
	include_once ("/opt/lampp/htdocs/ProyectoSw/Models/pedido_mesa.php");
	class TestPedidoMesa extends PHPUnit_Framework_TestCase{
		public function testConsultarPedidosMesas(){
			$datos = array("fecha" => "2017-06-02 7:00", "n_mesa" => "3", "id_producto" => ""
				, "cantidad" => "", "estado" => "");
			$pedido_mesa = new pedido_mesa($datos);
			$this->assertTrue(is_array($pedido_mesa->consultarPedidosMesas()));
		}
	}
?>