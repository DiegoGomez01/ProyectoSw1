<?php

include_once("../Models/inventario2.php");
include_once("../Models/gasto.php");
include_once("../Models/reporte.php");
include_once("../Models/mesa.php");
include_once("../Models/pedido_mesa.php");

class control {

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public function control_inventario($Datos, $op) {
        $inv = new inventario($Datos);
        if ($op == 0) {
            $inv->consultarInventario();
        } else if ($op == 1) {
            $inv->hayRegistroInventario();
        } else if ($op == 2) {
            $inv->ventasDia();
        }
    }

    public function control_gasto($Datos, $op) {
        $gas = new gasto($Datos);
        if ($op == 0) {
            $gas->consultarGastos();
        } else if ($op == 1) {
            $gas->hayRegistroGastos();
        } else if ($op == 2) {
            $gas->gastosDia();
        }
    }

    public function control_reporte($Datos, $op) {
        $rep = new reporte($Datos);
        if ($op == 0) {
            $rep->consultarReporte();
        } else if ($op == 1) {
            $rep->hayRegistroReporte();
        } else if ($op == 2) {
            $rep->consultarVentasyGastos();
        } else if ($op == 3) {
            $rep->crearReporte();
        }
    }

    public function control_mesa($Datos, $op) {
        $mesa = new mesa($Datos);
        if ($op == 0) {
            $mesa->consultarMesas();
        } else if ($op == 1) {
            $mesa->consultarMesa();
        } else if ($op == 2) {
            $mesa->cambiarestado();
        }
    }

    public function control_pedido_mesa($Datos, $op) {
        $p_mesa = new pedido_mesa($Datos);
        if ($op == 0) {
            $p_mesa->consultarPedidosMesas();
        } else if ($op == 1) {
            $p_mesa->consultarMesa();
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
} else if ($tctrl == "mesa") {
    $ctrl->control_mesa($Datos, $op);
} else if ($tctrl == "pmesa") {
    $ctrl->control_pedido_mesa($Datos, $op);
}
?>