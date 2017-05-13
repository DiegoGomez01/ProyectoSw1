// JavaScript Document);

function RegistroProductos()
{
	
	var Datos= document.getElementsByClassName("Datos");
	
	if(Datos.item(0).value!="" && Datos.item(1).value!="") {
		if ((Datos.item(1).value)*1>0) {
  $.post("../Controllers/Controladora.php",{Accion:0,id:'',nombre:Datos.item(0).value,precio:Datos.item(1).value},function(Respuesta)
   {
	   alert("Registrado Correctamente"+Respuesta);
	   		location.reload();
	   });	
		} else {
			 alert ("Error: Precio no valido");
		}
	   } else {
		   alert ("Error: Datos insuficientes");
		   }
	document.getElementById("entryNombre").value = "";
	document.getElementById("entryPrecio").value = "";
}

function metodoLlenarSelect() {
	
	  $.post("../Controllers/Controladora.php",{Accion:1,id:'',nombre:'',precio:''},function(Respuesta)

   {
		var datos = jQuery.parseJSON(Respuesta);
		var x = document.getElementById("listaDesplegable");
	   for (var i in datos)
		{ 
    var c = document.createElement("option");
	    c.text = datos[i].nombre;
		c.value = datos[i].id;
    x.options.add(c,datos[i].id);
		}
	   });
}


function consultarDatosProductos() {
		var x = document.getElementById("listaDesplegable").value;
		var indice = document.getElementById("listaDesplegable").value;
		  $.post("../Controllers/Controladora.php",{Accion:2,id:indice,nombre:'',precio:''},function(Respuesta)
   {
		var datos = jQuery.parseJSON(Respuesta);
		var nombre = document.getElementById("entryNombre2");
		nombre.value = datos[0].nombre;
			var precio = document.getElementById("entryPrecio2");
		precio.value = datos[0].precio;
	   });

}

function editarProductos() {
		var nombreProducto = document.getElementById("entryNombre2").value;
		var identificacion = document.getElementById("listaDesplegable").value;
		var precioProducto = document.getElementById("entryPrecio2").value;
		if (identificacion != "no") {
		  $.post("../Controllers/Controladora.php",{Accion:3,id:identificacion,nombre:nombreProducto,precio:precioProducto},function(Respuesta)
   {
		alert ("El producto fue editado correctamente" + Respuesta);
		location.reload();
	   });
		} else {
		alert ("Debe seleccionar un producto primero");
		}

}

function eliminarProductos() {
		var nombreProducto = document.getElementById("entryNombre2").value;
		var identificacion = document.getElementById("listaDesplegable").value;
		var precioProducto = document.getElementById("entryPrecio2").value;
		if (identificacion != "no") {
		  $.post("../Controllers/Controladora.php",{Accion:4,id:identificacion,nombre:nombreProducto,precio:precioProducto},function(Respuesta)
   {
		alert ("El producto fue eliminado correctamente" + Respuesta);
		location.reload();
	   });
		} else {
		alert ("Debe seleccionar un producto primero");
		}
}