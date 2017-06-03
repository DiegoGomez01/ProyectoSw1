<!doctype html>
<html>
    <head>
	<link rel="stylesheet" href="../Includes/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Css/Principal.css">
	<script src="../Js/Script1.js"></script>
	<script src="../Includes/jquery-3.2.1.js"></script>
    </head>
    <body >
        <div class="container Container" style="background-color:transparent" align="center">
             <section ID="headerPrincipal">
             </section>
            <section ID="options" >
                <h2 class="TextRegistrar" >Registrar gasto diario</h2>
                <div ID="botonProducto" style="display:block;margin-bottom:30px">
                    <button type="button" class="btn btn-primary active" onclick="registrarProducto()">Registrar Producto</button>
                    <section ID="obcionesProducto" style="display:none;">
                        <select id="selProductos">
                            <option>Selecione un producto</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="valort">

                        <button type="button" class="btn btn-primary btn-md" onclick="registrarP()" >Registrar</button>
                    </section>
                </div>
                <div id="botonServicioGeneral"  style="display:block;">
                    <button type="button" class="btn btn-primary active" onclick="registrarS()">Registrar Servicio General</button>

                    <section ID="obcionesServicio" style="display:none;">

                        <input type="text" class="form-control" placeholder="Servicio general" id="nombreServicio">
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="total">

                        <button type="button" class="btn btn-primary btn-md" onclick="registrarServicio()">Registrar</button>
                    </section>
                </div>
            </section>
        </div>
    </body>
</html>