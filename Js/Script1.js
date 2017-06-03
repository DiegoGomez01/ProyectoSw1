function registrarProducto() {
    mostrarProducto();
}

function registrarServicio() {
    document.getElementById("obcionesServicio").style.display = "none";
    document.getElementById("botonProducto").style.display = "block";
    if (document.getElementById("total").value > 0)

    {
        $.post("../Controllers/controladora3.php", {
            opcion: 3,
            producto: document.getElementById("nombreServicio").value,
            valor: document.getElementById("total").value
        }
        , function (respuesta) {
            alert(respuesta);
            alert("Resgistrado Adecuadamente");
        }
        )
        document.getElementById("nombreServicio").value = "";
        document.getElementById("total").value = "";
    } else {
        alert("El valor invertido debe ser mayor que 0");
    }
}

function mostrarProducto() {
    document.getElementById("obcionesProducto").style.display = "block";
    document.getElementById("botonServicioGeneral").style.display = "none";

    $.post("../Controllers/controladora3.php", {opcion: 2}, function (respuesta) {
        var datos = eval(respuesta);
        var x = document.getElementById("selProductos");
        for (var i in datos) {
            var c = document.createElement("option");
            c.text = datos[i].nombre;
            c.value = datos[i].nombre;
            x.options.add(c, datos[i].nombre);
        }
    });
}

function registrarS() {
    document.getElementById("obcionesServicio").style.display = "block";
    document.getElementById("botonProducto").style.display = "none";
}

function  registrarP() {
    document.getElementById("obcionesProducto").style.display = "none";
    document.getElementById("botonServicioGeneral").style.display = "block";
    if (document.getElementById("selProductos").value != 'Selecione un producto' && document.getElementById("valort").value != '')
    {
        if (document.getElementById("valort").value > 0)
        {
            $.post("../Controllers/controladora3.php", {
                opcion: 1,
                producto: document.getElementById("selProductos").value,
                valor: document.getElementById("valort").value
            }
            , function (respuesta) {
                alert(respuesta);
                alert("Resgistrado Adecuadamente");
            }
            )
            document.getElementById("valort").value = "";
            location.reload(true);
        } else {
            alert("El valor invertido debe ser mayor que 0");
        }

    } else
    {
        alert("Debe ingreasar todo los datos necesarios");
    }

}
