<?php
    echo '
	    <html>
		    <div id="arriba" align="center">
			    <img src="imagenes/taxi.png" height="200" width="400" title="TuTaxiOnline">
				<h2>BIENVENIDO/A</h2>
			</div><br><br><br>
			<meta name="tipo" content="text/html;" http-equiv="content-type" charset="utf-8">
			<br><br><br><br><br><br><br><br><br><br><br><br>
			<head>
			    <title>TU TAXI ONLINE</title>
				<link rel="icon" href="imagenes/logo.ico">
				<style type="text/css">
			        * {
				        margin:0px;
				        padding:0px;
			        }
			        #header {
				        margin:auto;
				        width:500px;
				        font-family:Arial, Helvetica, sans-serif;
			        }	
			        ul, ol {
				        list-style:none;
			        }	
			        .nav > li {
				        float:left;
			        }	
			        .nav li a {
				        background-color:#000;
				        color:#fff;
				        text-decoration:none;
				        padding:10px 12px;
				        display:block;
			        }		
			        .nav li a:hover {
				        background-color:#434343;
			        }	
			        .nav li ul {
				        display:none;
				        position:absolute;
				        min-width:140px;
			        }	
			        .nav li:hover > ul {
				        display:block;
			        }	
			        .nav li ul li {
				        position:relative;
			        }	
			        .nav li ul li ul {
				        right:-140px;
				        top:0px;
			        }
		        </style>
			</head>
			<div align="right">
				<h3><font face="Arial" color="#008c2e"> PIDE UN TAXI: </font></h3>
				<a href="contacto.php"><img src="imagenes/telefono.jpg" align="right" height="50"
				width="50"></a>
			    <a href="https://www.whatsapp.com/"><img src="imagenes/whatsapp.png" align="right" height"50"
		        width="50"></a>
		        <a href="https://www.instagram.com/accounts/login/?h1-es"><img src="imagenes/instagram.png"
		        align="right" height="50" width="50"></a>
			</div>
			<body>
			    <table>
			    <div id="header">
				    <h3>
					    <ul class="nav">
						    <li><a href="principal.php">INICIO</a></li>
							<li><a href="taxi.php" title="Ingreso de taxis">TAXI</a>
							    <ul>
								    <li><a href="mantenimiento_taxi.php">Modificar Taxi</a></li>
								</ul>
							</li>
							<li><a href="chofer.php" title="Ingreso de choferes">CHOFER</a>
							    <ul>
								    <li><a href="mantenimiento_chofer.php" title="Mantenimiento de 
									Choferes">Modificar Chofer</a></li>
								</ul>
							</li>
							</li>
							<li><a href="cliente.php" title="Ingreso de Login-Clientes">CLIENTES</a>
							    <ul>
								    <li><a href="mantenimiento_cliente.php" title="Mantenimiento de
									Clientes">Modificar Clientes</a></li>
								</ul>
							</li>
							<li><a href="servicio.php" title="Ingreso del servicio a pedir">SERVICIO</a>
								<ul>
								    <li><a href="mantenimiento_servicio.php" title="Mantenimiento de
									Clientes">Modificar Servicio</a></li>
								</ul>
							</li>
							<li>
							    <a href="index.php" title="Salir" id="salir">SALIR</a>
							</li>
							<br>
						</ul>
					</h3>
				</div>
				<link rel="stylesheet" href="css/encabezado.css">
			</body>
			<br><br>
		</html>
	';
?>