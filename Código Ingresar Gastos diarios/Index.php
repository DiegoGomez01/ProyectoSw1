<?php
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet"  href="css/bootstrap.min.css">
        <link rel="stylesheet"  href="css/Principal.css">
        <script src="js/Script.js"></script>

        <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/ >
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/jquery.datetimepicker.full.min.js"></script>

    </head>
    <body bgcolor="#fffacd">
        <div class="container Container">
             <section ID="headerPrincipal">
                <header class="jumbotron Header">
                    <h1>BILLAR</h1>
                </header>
             </section>

            <section ID="options" >
                <h2 class="TextRegistrar" >Registrar gasto diario</h2>
                <div ID="botonProducto" style="display:block;" ">
                    <button type="button" class="btn btn-primary active" onclick="registrarProducto()">Registrar Producto</button>
                    <section ID="obcionesProducto" style="display:none;">
                        <select id="selProductos">
                            <option>Selecione un producto</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="valort">

                        <button type="button" class="btn btn-primary btn-md" onclick="registrarP()">Registrar</button>
                    </section>
                </div>
                <div id="botonServicioGeneral"  style="display:block;">
                    <button type="button" class="btn btn-primary active" onclick="registrarS()">Registrar Servicio General</button>

                    <section ID="obcionesServicio" style="display:none;">

                        <input type="text" class="form-control" placeholder="Servicio general" id="nombreServicio">
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="total">

                        <button type="button" class="btn btn-primary btn-md" onclick="registrarServicioGeneral()">Registrar</button>
                    </section>
                </div>
            </section>
        </div>
    </body>
</html>
<?php
?>