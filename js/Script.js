function RegistrarProducto() {
    MostrarProducto();
}

function RegistrarServicioGeneral() {
    document.getElementById("ObcionesServicio").style.display="none";
    document.getElementById("BotonProducto").style.display="block";
    if(document.getElementById("Total").value > 0 )
    {
        $.post("../ProyectoSw/Controlador/controlador.php" , {
                opcion: 3,
                producto:document.getElementById("NombreServicio").value,
                valor:document.getElementById("Total").value
            }
            ,function (respuesta) {
                alert("Resgistrado Adecuadamente");
            }
        )
        document.getElementById("NombreServicio").value="";
        document.getElementById("Total").value="";
        location.reload(true);
    }
    else{
        alert("El valor invertido debe ser mayor que 0");
    }
}

function MostrarProducto() {
    document.getElementById("ObcionesProducto").style.display="block";
    document.getElementById("BotonServicioGeneral").style.display="none";

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

function RegistrarS() {
    document.getElementById("ObcionesServicio").style.display="block";
    document.getElementById("BotonProducto").style.display="none";
}

function  RegistrarP() {
    document.getElementById("ObcionesProducto").style.display="none";
    document.getElementById("BotonServicioGeneral").style.display="block";
    if (document.getElementById("SelProductos").value != 'Selecione un producto' && document.getElementById("Valort").value !=''
        && document.getElementById("Cantidad").value != '')
    {
        if(document.getElementById("Cantidad").value > 0 )
        {
            if(document.getElementById("Valort").value > 0 )
            {
                $.post("../ProyectoSw/Controlador/controlador.php" , {
                    opcion: 1,
                    producto:document.getElementById("SelProductos").value,
                    valor:document.getElementById("Valort").value
                }
                ,function (respuesta) {
                        alert("Resgistrado Adecuadamente");
            }
        )
                document.getElementById("Valort").value="";
                location.reload(true);
            }
            else{
                alert("El valor invertido debe ser mayor que 0");
            }
        }
        else{
            alert("La cantidad del producto debe ser mayor que 0");
        }
    }else
    {
        alert("Debe ingreasar todo los datos necesarios");
    }

}
