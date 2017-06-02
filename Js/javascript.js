// JavaScript Document);
var contListaPedido = 0;

function aumentarProducto() {
	document.location.href = "aumentarProducto.html";
}

function RegistroProductos() {

	var Datos = document.getElementsByClassName("Datos");

	if (Datos.item(0).value != "" && Datos.item(1).value != "") {
		if ((Datos.item(1).value) * 1 > 0) {
			$.post("../Controllers/Controladora.php", {
				Accion: 0,
				id: '',
				nombre: Datos.item(0).value,
				precio: Datos.item(1).value
			}, function (Respuesta) {
				alert("Registrado Correctamente" + Respuesta);
				location.reload();
			});
		} else {
			alert("Error: Precio no valido");
		}
	} else {
		alert("Error: Datos insuficientes");
	}
	document.getElementById("entryNombre").value = "";
	document.getElementById("entryPrecio").value = "";
}

function metodoLlenarSelect() {
	$.post("../Controllers/Controladora.php", {
		Accion: 1,
		id: '',
		nombre: '',
		precio: ''
	}, function (Respuesta) {
		var datos = jQuery.parseJSON(Respuesta);
		var x = document.getElementById("listaDesplegable");
		for (var i in datos) {

			var c = document.createElement("option");
			c.text = datos[i].nombre;
			c.value = datos[i].id;
			x.options.add(c, datos[i].id);
		}
	});
}


function consultarDatosProductos() {
	var x = document.getElementById("listaDesplegable").value;
	var indice = document.getElementById("listaDesplegable").value;
	$.post("../Controllers/Controladora.php", {
		Accion: 2,
		id: indice,
		nombre: '',
		precio: ''
	}, function (Respuesta) {
		var datos = jQuery.parseJSON(Respuesta);
		var nombre = document.getElementById("entryNombre2");
		nombre.value = datos[0].nombre;
		var precio = document.getElementById("entryPrecio2");
		precio.value = datos[0].precio;
	});
}

function consultarDatosInventario() {
	var x = document.getElementById("listaDesplegable").value;
	var indice = document.getElementById("listaDesplegable").value;
	$.post("../Controllers/Controladora.php", {
		Accion: 5,
		id: indice,
		cInicial: '',
		cingresada: '',
		cActual: '',
		cVendido: '',
		Vtotal: ''
	}, function (Respuesta) {
		if (Object.keys(Respuesta).length > 200) {
			var datos = jQuery.parseJSON(Respuesta);
			var nombre = document.getElementById("nombreProducto");
			nombre.value = datos[0].nombre;
			var precio = document.getElementById("entryPrecio");
			precio.value = datos[0].precio;
			var cantidad = document.getElementById("cantidadProductoInventario");
			cantidad.value = datos[0].cantidad_actual;

		} else {
			alert("No se encuentran datos de inventario registrado para el producto.");
		}

	});
}


function aumentarInventario() {
	var nombre = document.getElementById("nombreProducto").value;
	var cantIng = document.getElementById("cantidadProductoAumentar").value;
	var cantOld = document.getElementById("cantidadProductoInventario").value;
	var cantNew = parseInt(cantIng) + parseInt(cantOld);
	if (nombre != '' && cantIng != '' && cantOld != '' && !isNaN(parseInt(cantIng))) {
		alert("Confirmar....\n" +
			"Nombre: " + nombre + "\n" +
			"Cantidad Ingresada" + cantIng + "\n" +
			"cantidad Total" + cantNew);

		var indice = document.getElementById("listaDesplegable").value;
		$.post("../Controllers/Controladora.php", {
			Accion: 6,
			id: indice,
			cInicial: '',
			cingresada: cantIng,
			cActual: '',
			cVendido: '',
			Vtotal: ''
		}, function (Respuesta) {
			alert(Respuesta);
			if (Resultado = 'Exito') {
				document.getElementById("nombreProducto").value = "";
				document.getElementById("cantidadProductoAumentar").value = "";
				document.getElementById("cantidadProductoInventario").value = "";
				alert("Se ha registrado con éxito el cambio");
			} else {
				alert("Ha surgido un error. Intentelo de nuevo");
			}
		});

	} else {
		alert("Error, por favor corregir los datos")
	}
}

function editarProductos() {
	var nombreProducto = document.getElementById("entryNombre2").value;
	var identificacion = document.getElementById("listaDesplegable").value;
	var precioProducto = document.getElementById("entryPrecio2").value;
	if (identificacion != "no") {
		$.post("../Controllers/Controladora.php", {
			Accion: 3,
			id: identificacion,
			nombre: nombreProducto,
			precio: precioProducto
		}, function (Respuesta) {
			alert("El producto fue editado correctamente" + Respuesta);
			location.reload();
		});
	} else {
		alert("Debe seleccionar un producto primero");
	}

}



function eliminarProductos() {
	var nombreProducto = document.getElementById("entryNombre2").value;
	var identificacion = document.getElementById("listaDesplegable").value;
	var precioProducto = document.getElementById("entryPrecio2").value;
	if (identificacion != "no") {
		$.post("../Controllers/Controladora.php", {
			Accion: 4,
			id: identificacion,
			nombre: nombreProducto,
			precio: precioProducto
		}, function (Respuesta) {
			alert("El producto fue eliminado correctamente" + Respuesta);
			location.reload();
		});
	} else {
		alert("Debe seleccionar un producto primero");
	}
}


function AnadirLista() {
	var indice = document.getElementById("listaDesplegable").value;
	var idCantidad;
	var cantidad = document.getElementById("cantidadProductoSolicitado").value;
	if (indice == 'no' || cantidad == '' || isNaN(parseInt(cantidad)) || parseInt(cantidad) > parseInt(document.getElementById("cantidadProductoInventario").value)) {
		alert("Ingrese los datos completos para Añadir a lista");
	} else {
		$.post("../Controllers/Controladora.php", {
			Accion: 5,
			id: indice,
			cInicial: '',
			cingresada: '',
			cActual: '',
			cVendido: '',
			Vtotal: ''
		}, function (respuesta) {
			var datos = jQuery.parseJSON(respuesta);
			for (var i in datos) {
				var elementotr = document.createElement('tr');

				var elementotd = document.createElement('td');
				elementotr.appendChild(elementotd);
				var texto = document.createTextNode(datos[i].id);
				elementotd.appendChild(texto);

				var elementotd = document.createElement('td');
				elementotr.appendChild(elementotd);
				var texto = document.createTextNode(datos[i].nombre);
				elementotd.appendChild(texto);

				var elementotd = document.createElement('td');
				elementotr.appendChild(elementotd);
				var texto = document.createTextNode(cantidad);
				elementotd.appendChild(texto);

				var elementotd = document.createElement('td');
				elementotr.appendChild(elementotd);
				var texto = document.createTextNode(parseInt(datos[i].precio) * parseInt(cantidad));
				elementotd.appendChild(texto);

				document.getElementById("total").value = parseInt(document.getElementById("total").value) + (parseInt(datos[i].precio) * parseInt(cantidad));

				var elementotd = document.createElement('td');
				elementotr.appendChild(elementotd);
				var span = document.createElement('span');
				contListaPedido++;
				span.innerHTML = '<button onclick="EliminarLista(' + contListaPedido + ')">&nbsp;Eliminar</button>';
				elementotd.appendChild(span);

				var obj = document.getElementById('Contenido');
				obj.appendChild(elementotr);
			}
		});
	}
} //check

function EliminarLista(contFila) {
	var x = document.getElementById("listaPedido").rows[contFila].cells.length;
	for (var k = 0; k < x; k++) {
		var u = document.getElementById("listaPedido").rows[contFila].cells;
		u[k].innerHTML = "";
	}
	var tableReg = document.getElementById('listaPedido');
	var cellsOfRow = "";
	var suma = 0;
	if (tableReg.rows.length > 0) {
		for (var i = 1; i < tableReg.rows.length; i++) {
			cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
			for (var j = 0; j < cellsOfRow.length; j++) {
				if (j == 3) {
					if (cellsOfRow[j].textContent != '' && cellsOfRow[j].textContent != '0') {
						suma += parseInt(cellsOfRow[j].textContent);
					}
				}
			}
		}
		document.getElementById("total").value = suma;
	} else {
		document.getElementById("total").innerHTML = 0;
	}
}

function RegistrarPedido() {
	if (document.getElementById("total").value != '0') {

		var tableReg = document.getElementById('listaPedido');
		var cellsOfRow = "";
		var Vid = "";
		var bandera = "";
		var Vcant = 0;

		for (var i = 1; i < tableReg.rows.length; i++) {
			cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
			for (var j = 0; j < cellsOfRow.length; j++) {
				if (cellsOfRow[j].textContent == '') {
					bandera = 'NO';
					break;
				} else {
					if (j == 0) {
						Vid = cellsOfRow[j].textContent;
					} else if (j == 2) {
						Vcant = parseInt(cellsOfRow[j].textContent);
					}
				}
			}
			if (bandera != 'NO') {
				$.post("../Controllers/Controladora.php", {
					Accion: 7,
					id: Vid,
					cInicial: '',
					cingresada: '',
					cActual: '',
					cVendido: Vcant,
					Vtotal: ''
				}, function (Respuesta) {
					if (Respuesta != 'Exito') {
						alert("Lo sentimos, ha ocurrido un error en uno de los registros.");
					}
				});
			}
			bandera = "";
		}

		alert("Se ha registrado el pedido con éxito.");
		document.location.href = "RegistroPedidoCliente.html";

	} else {
		alert("Adiciones pedidos a la lista");
	}
}

function consultarEstados() {
	$.post("../Controllers/Controladora.php", {
		Accion: 8,
		nombre: '',
		estado: '',
		hora_inicio: ''
	}, function (Respuesta) {

		var datos = jQuery.parseJSON(Respuesta);
		var nombre = document.getElementsByClassName("NombreMesa");
		var estado = document.getElementsByClassName("EstadoMesa");
		var boton = document.getElementsByClassName("btnIngreso");
		for (var i = 0; i < 5; i++) {
			nombre[i].innerHTML = "Mesa " + datos[i].nombre;
			nombre[i].id = datos[i].nombre;
			estado[i].innerHTML = datos[i].estado;
			if (datos[i].estado == "Ocupada") {
				boton[i].setAttribute("disabled", true);
			}
		}
	});
}

function iniciarRegistro(indice) {
	var c = getFechaHoy(true, true);
	var nombre = document.getElementsByClassName("NombreMesa");
	var variableNombre = nombre[indice].id;
	$.post("../Controllers/Controladora.php", {
		Accion: 9,
		nombre: variableNombre,
		estado: '',
		hora_inicio: c
	}, function (Respuesta) {
		alert("Tiempo iniciado correctamente");
		location.reload();
	});

}
