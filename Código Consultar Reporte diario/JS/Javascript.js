// JavaScript Document
var url = window.location.toString();
var datosRecibidos = leerUrl(url);

$(function () {
    $('#btngreporte').click(function () {
        GenerarReporte();
    });
    $('#btnresalir').click(function () {
        document.location.href = "fechaReporte.html";
    });
});

function GenerarReporte() {
    var fecha = document.getElementById('fecha').value;
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    hoy = yyyy + '-' + mm + '-' + dd;
    if (fecha.length !== 10) {
        alert("La Fecha es Invalida: Ingrese la Fecha Completa");
    } else if (Date.parse(hoy) < Date.parse(fecha)) {
        alert("La Fecha es Invalida: La fecha no puede ser mayor a la actual");
    } else {
        $.post("../Controladores/controladora.php", {fecha: fecha, gasto_dia: 0, gasto_totales: 0, total_vendido: 0, total_actual: 0, tcontrol: "reporte", op: 1}, function (Respuesta) {
            if (Respuesta === 'HAY REGISTROS') {
                document.location.href = "ReporteGeneral.html?f=" + fecha;
            } else if (Respuesta === 'NO HAY REGISTROS') {
                alert('No hay Registros en esa Fecha');
            } else {
                alert("Error: " + Respuesta);
            }
        });
    }
}

function mostrarReporte() {
    $.post("../Controladores/controladora.php", {fecha: "" + datosRecibidos['f'], gasto_dia: 0, gasto_totales: 0, total_vendido: 0, total_actual: 0, tcontrol: "reporte", op: 0}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        document.getElementById('ventasdia').innerHTML = datos[0].total_vendido;
        document.getElementById('ventasmes').innerHTML = datos[0].total_actual;
        document.getElementById('gastosdia').innerHTML = datos[0].gasto_dia;
        document.getElementById('gastosmes').innerHTML = datos[0].gasto_totales;
        document.getElementById('gananciasdia').innerHTML = datos[0].total_vendido - datos[0].gasto_dia;
        document.getElementById('gananciasmes').innerHTML = datos[0].total_actual - datos[0].gasto_totales;
    });
}

function leerUrl(url) {
    var queryStart = url.indexOf("?") + 1,
            queryEnd = url.indexOf("#") + 1 || url.length + 1,
            query = url.slice(queryStart, queryEnd - 1),
            pairs = query.replace(/\+/g, " ").split("&"),
            parms = {}, i, n, v, nv;
    if (query === url || query === "") {
        return;
    }
    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=");
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);
        if (!parms.hasOwnProperty(n)) {
            parms[n] = [];
        }
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}