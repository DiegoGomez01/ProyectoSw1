<?php
include_once("../Models/Producto.php");
include_once("../Models/Gasto2.php");
include_once("../Models/pedidomesa.php");

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

    public function registrarPedido()
    {
        $producto=$_REQUEST['producto'];
        $cantidad=$_REQUEST['cantidad'];
        $mesa=$_REQUEST['mesa'];
        $pe=new pedidomesa();
        $pe->registrarPedido($producto,$cantidad,$mesa);
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

    public  function ObtenerMenu()
    {
        $p=new Producto();
        $registros=$p->ObtenerM();
        
        $filas=pg_numrows($registros);
        $response=array();
        for ($cont=0; $cont < $filas ; $cont++) {
            $response[]=array('nombre'=>"".pg_result($registros,$cont,0),
                               'precio'=>"".pg_result($registros,$cont,1)   ) ;
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
if($_REQUEST['opcion']==4){
    $control->ObtenerMenu();
}
if($_REQUEST['opcion']==5){
    $control->registrarPedido();
}
?>