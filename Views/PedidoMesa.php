<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="../Includes/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Css/Principal.css">
	<script src="../Js/Script2.js"></script>
	
	
	 <link rel="stylesheet" type="text/css" href="../Css/jquery.datetimepicker.min.css"/ >
        <script src="../Includes/jquery-2.1.4.js"></script>
        <script src="../Includes/jquery.datetimepicker.full.min.js"></script>
        
</head>

<body bgcolor="#fffacd">
	<div class="container Container">
		<section ID="headerPrincipal">
			<header class="jumbotron Header">
				<h1>BILLAR</h1>
			</header>
		</section>

		<section ID="options">

			<div ID="boton_Pedido_Mesa" style="display:block;">
                    <button type="button " class="btn btn-primary active " onclick="consultar_Productos() ">Realizar pedido</button>

                </div>
            </section>
        <section ID="productos" style="display:none; ">
            <table id="Menu">

            </table>
            <div ID="solicitar " style="display:block;">
				<button type="button" class="btn btn-primary active" onclick="SolicitarPedido()">Solicitar pedido</button>

			</div>
		</section>
	</div>
</body>

</html>