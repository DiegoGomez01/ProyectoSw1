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
             <section ID="HeaderPrincipal">
                <header class="jumbotron Header">
                    <h1>BILLAR</h1>
                </header>
             </section>

            <section ID="Options" >
                <h2 class="TextRegistrar" >Registrar gasto diario</h2>
                <div ID="BotonProducto" style="display:block;" ">
                    <button type="button" class="btn btn-primary active" onclick="RegistrarProducto()">Registrar Producto</button>
                    <section ID="ObcionesProducto" style="display:none;">
                        <select id="SelProductos">
                            <option>Selecione un producto</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="Valort">

                        <button type="button" class="btn btn-primary btn-md" onclick="RegistrarP()">Registrar</button>
                    </section>
                </div>
                <div id="BotonServicioGeneral"  style="display:block;">
                    <button type="button" class="btn btn-primary active" onclick="RegistrarS()">Registrar Servicio General</button>

                    <section ID="ObcionesServicio" style="display:none;">

                        <input type="text" class="form-control" placeholder="Servicio general" id="NombreServicio">
                        <input type="text" class="form-control" placeholder="Valor total invertido" id="Total">

                        <button type="button" class="btn btn-primary btn-md" onclick="RegistrarServicioGeneral()">Registrar</button>
                    </section>
                </div>
            </section>
        </div>
    </body>
</html>
<?php
?>