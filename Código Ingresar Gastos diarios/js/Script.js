function registrarProducto() {
    mostrarProducto();
}

function registrarServicioGeneral() {
    document.getElementById("obcionesServicio").style.display="none";
    document.getElementById("botonProducto").style.display="block";
    if(document.getElementById("total").value > 0 )
    {
        $.post("../ProyectoSw/Controlador/controlador.php" , {
                opcion: 3,
                producto:document.getElementById("nombreServicio").value,
                valor:document.getElementById("total").value
            }
            ,function (respuesta) {
                alert("Resgistrado Adecuadamente");
            }
        )
        document.getElementById("nombreServicio").value="";
        document.getElementById("total").value="";
        location.reload(true);
    }
    else{
        alert("El valor invertido debe ser mayor que 0");
    }
}

function mostrarProducto() {
    document.getElementById("obcionesProducto").style.display="block";
    document.getElementById("botonServicioGeneral").style.display="none";

    $.post("../ProyectoSw/Controlador/controlador.php" ,{
        opcion:2
    }
    ,function (respuesta) {
            var datos=eval(respuesta);
            for(var i in datos){
                $("#SelProductos").append('<option value="'+datos[i].nombre+'">'+datos[i].nombre+'</option>');
            }
        }

    )
}

function registrarS() {
    document.getElementById("obcionesServicio").style.display="block";
    document.getElementById("botonProducto").style.display="none";
}

function  registrarP() {
    document.getElementById("obcionesProducto").style.display="none";
    document.getElementById("botonServicioGeneral").style.display="block";
    if (document.getElementById("selProductos").value != 'Selecione un producto' && document.getElementById("Valort").value !='')
    {
            if(document.getElementById("valort").value > 0 )
            {
                $.post("../ProyectoSw/Controlador/controlador.php" , {
                    opcion: 1,
                    producto:document.getElementById("selProductos").value,
                    valor:document.getElementById("valort").value
                }
                ,function (respuesta) {
                        alert("Resgistrado Adecuadamente");
            }
        )
                document.getElementById("valort").value="";
                location.reload(true);
            }
            else{
                alert("El valor invertido debe ser mayor que 0");
            }

    }else
    {
        alert("Debe ingreasar todo los datos necesarios");
    }

}
