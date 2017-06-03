// JavaScript Document
var url = window.location.toString();
var datosRecibidos = leerUrl(url);

$(function () {
    $('#btngreporte').click(function () {
        GenerarReporte();
    });
    $('#btnredetallado').click(function () {
        document.location.href = "ReporteDetallado.html?f=" + datosRecibidos['f'];
    });
    $('#btnresalir').click(function () {
        document.location.href = "fechaReporte.html";
    });
    $('.btngoback').click(function () {
        history.back();
    });
    $('#btnconfirmarfac').click(function () {
        var total = document.getElementById('fac_ttp').textContent + "";
        total = total.substring(1);
        if (confirm("¿Desea Confirmar el Pago de la Factura por :" + "$" + total + "?")) {
            $.post("../Controllers/controladora2.php", {n_mesa: "" + datosRecibidos['m'], estado: 'Disponible', hora_inicio: null, precio: 0, tcontrol: "mesa", op: 2}, function (Respuesta) {
                if (Respuesta === 'Exito') {
                    alert('El proceso fue Exitoso');
                    document.location.href = "seleccionMesa.html";
                } else {
                    alert(Respuesta);
                    alert('Se produjo un error interno');
                }
            });
        }
    });
});

function getFechaHoy(f, h) {
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();
    var hh = hoy.getHours();
    var mi = hoy.getMinutes();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    if (hh < 10) {
        hh = '0' + hh;
    }
    if (mi < 10) {
        mi = '0' + mi;
    }
    if (f && h) {
        return yyyy + '-' + mm + '-' + dd + ' ' + hh + ':' + mi;
    } else if (f) {
        return yyyy + '-' + mm + '-' + dd;
    } else {
        return hh + ':' + mi;
    }
}

function GenerarReporte() {
    var fecha = document.getElementById('fecha').value;
    var hoy = getFechaHoy(true, false);
    if (fecha.length !== 10) {
        alert("La Fecha es Invalida: Ingrese la Fecha Completa");
    } else if (Date.parse(hoy) < Date.parse(fecha)) {
        alert("La Fecha es Invalida: La fecha no puede ser mayor a la actual");
    } else {
        $.post("../Controllers/controladora2.php", {fecha: fecha, gasto_dia: 0, gasto_totales: 0, total_vendido: 0, total_actual: 0, tcontrol: "reporte", op: 1}, function (Respuesta) {
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
    document.getElementById('fechaRep').innerHTML = 'Fecha: ' + datosRecibidos['f'];
    $.post("../Controllers/controladora2.php", {fecha: "" + datosRecibidos['f'], gasto_dia: 0, gasto_totales: 0, total_vendido: 0, total_actual: 0, tcontrol: "reporte", op: 0}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        document.getElementById('ventasdia').innerHTML = '$' + datos[0].total_vendido;
        document.getElementById('ventasmes').innerHTML = '$' + datos[0].total_actual;
        document.getElementById('gastosdia').innerHTML = '$' + datos[0].gasto_dia;
        document.getElementById('gastosmes').innerHTML = '$' + datos[0].gasto_totales;
        document.getElementById('gananciasdia').innerHTML = '$' + (datos[0].total_vendido - datos[0].gasto_dia);
        document.getElementById('gananciasmes').innerHTML = '$' + (datos[0].total_actual - datos[0].gasto_totales);
    });
}
function mostrarReporteDetallado() {
    document.getElementById('fechaRep').innerHTML = 'Fecha: ' + datosRecibidos['f'];
    $.post("../Controllers/controladora2.php", {fecha: "" + datosRecibidos['f'], id_producto: 0, cinicial: 0, cingresada: 0, cactual: 0, cvendido: 0, vtotal: 0, tcontrol: "inventario", op: 0}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        var tbodyContenido = document.getElementById('tbodyinv');
        for (var i in datos) {
            var elementotr = document.createElement('tr');
            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].id_producto);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].cantidad_inicial);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].cantidad_ingresada);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].cantidad_actual);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].cantidad_vendido);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].venta_total);
            elementotd.appendChild(texto);

            tbodyContenido.appendChild(elementotr);
        }
    });
    $.post("../Controllers/controladora2.php", {fecha: "" + datosRecibidos['f'], gasto_dia: 0, descripcion: '', valor_invertido: 0, tcontrol: "gasto", op: 0}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        var tbodyContenido = document.getElementById('tbodygas');
        for (var i in datos) {
            var elementotr = document.createElement('tr');
            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode(datos[i].descripcion);
            elementotd.appendChild(texto);

            var elementotd = document.createElement('td');
            elementotr.appendChild(elementotd);
            var texto = document.createTextNode('$' + datos[i].valor_invertido);
            elementotd.appendChild(texto);

            tbodyContenido.appendChild(elementotr);
        }
    });
}
function mostrarMesas() {

    $.post("../Controllers/controladora2.php", {n_mesa: null, estado: null, hora_inicio: null, precio: 0, tcontrol: "mesa", op: 0}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        var container = document.getElementById('containerMesas');
        for (var i in datos) {
            var btn = document.createElement('button');
            btn.innerHTML = 'Mesa ' + datos[i].n_mesa;
            btn.setAttribute('class', 'btnmesa');
            btn.setAttribute('onClick', 'enviaraFactura(' + datos[i].n_mesa + ')');
            if (datos[i].estado === 'Disponible') {
                btn.disabled = true;
            }
            container.appendChild(btn);
        }
    });
}

function enviaraFactura(n_mesa) {
    document.location.href = "factura.html?m=" + n_mesa;
}

function obtenerHora(str) {
    return str.substring(11, 16);
}

function crearFactura() {
    var fechaHoy = getFechaHoy(true, false);
    var horai;
    var horaf;
    var tmins;
    var mins;
    var vjuego = 0;
    var sumaprods = 0;
    document.getElementById('fechafac').innerHTML = 'Fecha: ' + fechaHoy;
    document.getElementById('mesafac').innerHTML = 'Mesa: ' + datosRecibidos['m'];
    $.post("../Controllers/controladora2.php", {n_mesa: "" + datosRecibidos['m'], estado: null, hora_inicio: null, precio: 0, tcontrol: "mesa", op: 1}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        horai = obtenerHora(datos[0].hora_inicio);
        horaf = getFechaHoy(false, true);
        tmins = calcularTiempo(datos[0].hora_inicio, getFechaHoy(true, true));
        vjuego = tmins * datos[0].precio;
        document.getElementById('fac_horai').innerHTML = horai;
        document.getElementById('fac_horaf').innerHTML = horaf;
        mins = (tmins - parseInt((tmins / 60)) * 60);
        if (mins < 10) {
            mins = '0' + mins;
        }
        document.getElementById('fac_tiempo').innerHTML = parseInt((tmins / 60)) + ':' + mins;
        document.getElementById('fac_valort').innerHTML = '$' + vjuego;
        $.post("../Controllers/controladora2.php", {fecha: "" + datos[0].hora_inicio, n_mesa: "" + datosRecibidos['m'], id_producto: null, cantidad: null, estado: 0, tcontrol: "pmesa", op: 0}, function (Respuesta) {
            var datos = jQuery.parseJSON(Respuesta);
            var tbodyContenido = document.getElementById('tbodyproductos');
            for (var i in datos) {
                var elementotr = document.createElement('tr');
                var elementotd = document.createElement('td');
                elementotr.appendChild(elementotd);
                var texto = document.createTextNode(datos[i].nombre);
                elementotd.appendChild(texto);

                var elementotd = document.createElement('td');
                elementotr.appendChild(elementotd);
                var texto = document.createTextNode(datos[i].cantidad);
                elementotd.appendChild(texto);

                var elementotd = document.createElement('td');
                elementotr.appendChild(elementotd);
                var texto = document.createTextNode('$' + datos[i].precio);
                elementotd.appendChild(texto);
                sumaprods += datos[i].precio;
                tbodyContenido.appendChild(elementotr);
            }
            document.getElementById('fac_valorp').innerHTML = '$' + sumaprods;
            document.getElementById('fac_ttp').innerHTML = '$' + ((vjuego * 1) + (sumaprods * 1));
        });
    });
}

function calcularTiempo(ini, fin) {
    return Math.abs(Date.parse(ini) - Date.parse(fin)) / 60000;
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

function terminarDia() {
    var fechaact = getFechaHoy(true, false);
    var fechames = fechaact.substr(0, 7) + "-01";
    var gastos_dia;
    var ventas_dia;
    $.post("../Controllers/controladora2.php", {fecha: "" + fechaact, gasto_dia: 0, descripcion: '', valor_invertido: 0, tcontrol: "gasto", op: 2}, function (Respuesta) {
        var datos = jQuery.parseJSON(Respuesta);
        gastos_dia = datos[0].gasto_dia;
        $.post("../Controllers/controladora2.php", {fecha: "" + fechaact, id_producto: 0, cinicial: 0, cingresada: 0, cactual: 0, cvendido: 0, vtotal: 0, tcontrol: "inventario", op: 2}, function (Respuesta) {
            var datos = jQuery.parseJSON(Respuesta);
            ventas_dia = datos[0].ventas_dia;
            $.post("../Controllers/controladora2.php", {fecha: "" + fechames, gasto_dia: 0, gasto_totales: 0, total_vendido: 0, total_actual: 0, tcontrol: "reporte", op: 2}, function (Respuesta) {
                var datos = jQuery.parseJSON(Respuesta);
                $.post("../Controllers/controladora2.php", {fecha: "" + fechaact, gasto_dia: gastos_dia, gasto_totales: "" + datos[0].gastos_totales, total_vendido: ventas_dia, total_actual: "" + datos[0].ventas_totales, tcontrol: "reporte", op: 3}, function (Respuesta) {
                    if (Respuesta === 'Exito') {
                        alert('La informacion fue guardada Correctamente');
                    }
                });
            });
        });
    });
}