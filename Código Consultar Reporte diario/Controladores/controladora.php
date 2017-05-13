<?php
include_once("../Modelos/inventario.php");
include_once("../Modelos/gasto.php");
include_once("../Modelos/reporte.php");

class control {

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public function control_inventario($Datos, $op) {
        $inv = new inventario($Datos);
        if ($op == 0) {
            $inv->consultarInventario();
        } else if ($op == 1){
            $inv->hayRegistroInventario();
        }
    }

    public function control_gasto($Datos, $op) {
        $gas = new gasto($Datos);
        if ($op == 0) {
            $gas->consultarGastos();
        } else if ($op == 1){
            $gas->hayRegistroGastos();
        }
    }

    public function control_reporte($Datos, $op) {
        $rep = new reporte($Datos);
        if ($op == 0) {
            $rep->consultarReporte();
        } else if ($op == 1){
            $rep->hayRegistroReporte();
        }
    }
}
$Datos = $_REQUEST;
$tctrl = $_REQUEST['tcontrol'];
$op = $_REQUEST['op'];
$ctrl = new control();
if ($tctrl == "reporte") {
    $ctrl->control_reporte($Datos, $op);
} else if ($tctrl == "inventario") {
    $ctrl->control_inventario($Datos, $op);
} else if ($tctrl == "gasto") {
    $ctrl->control_gasto($Datos, $op);
}
?>