<!doctype html>
<html>

<head>
<link href="../Includes/Bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../Css/HojasPagina.css" rel="stylesheet">
<link href="../Css/Animaciones.css" rel="stylesheet">
	<link rel="stylesheet" href="../Includes/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Css/Principal.css">
	<script src="../Js/Script2.js"></script>
	
	
	 <link rel="stylesheet" type="text/css" href="../Css/jquery.datetimepicker.min.css"/ >
        <script src="../Includes/jquery-2.1.4.js"></script>
        <script src="../Includes/jquery.datetimepicker.full.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
</head>

<body bgcolor="#fffacd">
<div class="container" style="height:100vh" style="align-content:center">
 <nav class="col-xs-12 nav" id="entrada"> </nav>
  <header class="col-xs-12 header nopadding"><img src="../Imagenes/Banners/cropped-banner.jpg" width="100%" height="100%"></a></header>
		<section ID="headerPrincipal">
		</section>
		<section ID="options">

			<div ID="boton_Pedido_Mesa" style="display:block; margin-left:60vh;margin-top:30vh" class="col-xs-12" >
                    <button type="button " class="btn btn-primary active " onclick="consultar_Productos()" id="botonPedido" >Realizar pedido</button>
                </div>
            </section>
        <section ID="productos" style="display:none;margin-left:45vh;margin-top:10vh" class="col-xs-12">
            <table id="Menu">

            </table>
            <div ID="solicitar " style="display:block;">
				<button type="button" class="btn btn-primary active" onclick="SolicitarPedido(2)">Solicitar pedido</button>

			</div>
		</section>
	</div>
</body>

</html>