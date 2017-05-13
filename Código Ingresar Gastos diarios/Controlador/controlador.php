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

    public function registrarProducto()
    {
        $producto=$_REQUEST['producto'];
        $valor=$_REQUEST['valor'];
        $g=new Gasto();
        $g->registrarProducto($producto,$valor);
    }

    public function registrarServicio()
    {
        $producto=$_REQUEST['producto'];
        $valor=$_REQUEST['valor'];
        $g=new Gasto();
        $g->registrarProducto($producto,$valor);
    }

    public  function obtenerProductos()
    {
        $p=new Producto();
        $registros=$p->Obtener();
        $filas=pg_numrows($registros);
        $response=array();
        for ($cont=0; $cont < $filas ; $cont++) {
            $response[]=array('nombre'=>"".pg_result($registros,$cont,0)) ;

        }

        echo ''.json_encode($response).'';
    }
}
$control=new controlador();

if($_REQUEST['opcion']==1){
    $control->registrarProducto();
}

if($_REQUEST['opcion']==2){
    $control->obtenerProductos();
}

if($_REQUEST['opcion']==3){
    $control->registrarServicio();
}
?>