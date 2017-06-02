<?php
class Conexion {

    var $Conexion;

    public function __construct() {
        $this->Conexion = '';
         $this->Mensaje="Exito";
    }

    public function conectar() {//original Billar user=postgres password=openpg
        $Mensaje="Exito";
        $this->Conexion = pg_connect('dbname=proyectosw user=sistemas password=programacion3 host=localhost port=5432');
        if (!$this->Conexion)
            echo json_encode("Error al conectar");
    }

    public function __destruct() {
        $this->Conexion;
    }
    
    	public function getConexion()
	{
	return($this->Conexion);	
	}
	
	public function getMensaje(){
		return $this->Mensaje;

	}

}

?>