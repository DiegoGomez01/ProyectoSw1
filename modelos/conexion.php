<?php

class Conexion 
{ 
	var $Conexion;
	var $Mensaje;
//funcion para realizar la conexion
  public function __construct ()
	{
	 $this->Conexion='';
	 $this->Mensaje="Exito";
	
	}

  	public function conectar()
	{   
		$Mensaje="Exito";
		$this->Conexion =pg_connect('dbname=Proyecto user=postgres password=96179226');
		if(!$this->Conexion)
		{
		$Mensaje="<table width'195' border='0' align='center' cellpadding'0' cellspacing='0'> <tr><TD><font color='font color='#990000'>ERROR AL ABRIR LA BASE DE DATOS </font></TD></tr></table>";
		}
		return($Mensaje);
	}
	
	  
  public function __destruct ()
	{
	 $this->Conexion;
	}

	public function getMensaje(){
		return $this->Mensaje;

	}
	public function getConexion()
	{
	return($this->Conexion);	
	}
}

?>