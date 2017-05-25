<?php
class Conexion 
{ 
var $Conexion;

  public function __construct ()
	{
	 $this->Conexion='';
	}

  public function conectar()
	    {   
		$this->Conexion =pg_connect('dbname=proyectoSoftware user=camilo password=camilo587');
	    if(!$this->Conexion)
		  echo json_encode("Error al conectar");
		
		}
	  
  public function __destruct ()
	{
	 $this->Conexion;
	}
}

?>