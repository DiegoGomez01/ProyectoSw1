<?php

include_once("../modelos/Producto.php");
include_once("../modelos/Gasto.php");

class controlador{

    public function  __construct()
    {
        try {
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', 'log.txt');
        } catch (Exception $e) {
            error_log("Problemas en loca::carePIPI\n" . $e->getMessage());
            echo json_encode(array("ok" => 0, "mensaje" => $e->getMessage()));
        }
    }
    /*
    asdasdasdasdasdasdasdasd
    estos es asdasdasd
    */
    public function RegistrarProducto()
    {
        $producto=$_REQUEST['producto'];
        $cantidad=$_REQUEST['cantidad'];
        $valor=$_REQUEST['valor'];
        $g=new Gasto();
        $g->RegistrarProducto($producto,$valor);
    }

    public function RegistrarServicio()
    {
        $producto=$_REQUEST['producto'];
        $valor=$_REQUEST['valor'];
        $g=new Gasto();
        $g->RegistrarProducto($producto,$valor);
    }

    public  function ObtenerProductos()
    {
        $p=new Producto();
        $Registros=$p->Obtener();
        $Filas=pg_numrows($Registros);
        $response=array();
        for ($cont=0; $cont < $Filas ; $cont++) {
            $response[]=array('nombre'=>"".pg_result($Registros,$cont,0)) ;

        }

        echo ''.json_encode($response).'';
    }
}
$control=new controlador();

if($_REQUEST['opcion']==1){
    $control->RegistrarProducto();
}

if($_REQUEST['opcion']==2){
    $control->ObtenerProductos();
}

if($_REQUEST['opcion']==3){
    $control->RegistrarServicio();
}
?>