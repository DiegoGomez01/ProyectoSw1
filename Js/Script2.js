var cantidad = 0;
function consultar_Productos() {
    document.getElementById("options").style.display = "none";
    document.getElementById("productos").style.display = "block";

    $.post("../Controllers/controladora3.php", {
        opcion: 4
    }
    , function (respuesta) {
        var datos = eval(respuesta);
        var content = "";
        for (var i in datos) {
            content += '<tr><td> <input type="checkbox" text="' + datos[i].nombre + '" value="' + datos[i].nombre + '" ' +
                    'id="c' + i + '"> ' + datos[i].nombre + ' ' + '</td> <td>  </td>  <td>  </td><td>  </td> <td>'
                    + "$" + '' + datos[i].precio + '</td>   <td>  </td>  <td>  </td><td>  </td>  ' +
                    ' <td><input type="text" class="form-control" placeholder="Ingrese la cantidad" id="in' + i + '"> </td><td> </td></tr>';
            cantidad = cantidad + 1;
        }
        $("#Menu").append(content);
    }

    )
}

function SolicitarPedido(numero) {
    for (var i = 0; i < cantidad; i++)
    {
        if (document.getElementById("c" + i).checked == true)
        {
            $.post("../Controllers/controladora3.php", {
                opcion: 5,
                producto: document.getElementById("c" + i).value,
                mesa: numero,
                cantidad: document.getElementById("in" + i).value
            }
            , function (respuesta) {
                alert("Se Realizo El Pedido Correctamente" + respuesta);
                location.reload();
            }
            )
        }
    }

}