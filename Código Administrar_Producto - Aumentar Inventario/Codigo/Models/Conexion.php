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
		$this->Conexion =pg_connect('dbname=proyectosw user=sistemas password=programacion3 host=localhost port=5432');
	    if(!$this->Conexion)
		  echo json_encode("Error al conectar");
		}
	  
  public function __destruct ()
	{
	 $this->Conexion;
	}
}

?>