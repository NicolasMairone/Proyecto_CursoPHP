<?php
    include_once 'encabezado1.php';
	include 'conexion.php';
	mysqli_select_db(mysql: $conexion, database: "bdd_cooperativa_taxis");
	$consulta = mysqli_query(mysql: $conexion, query: "SELECT * FROM taxi WHERE cod_tax=" . $_GET['cod']);
	$consultauno = mysqli_query(mysql: $conexion, query: "DELETE FROM taxi WHERE cod_tax=" . $_GET['cod']);
	$fila = mysqli_fetch_array(result: $consulta);
	echo '
	    <body>
		    <h1 class="register-title">SE HA ELIMINADO EL SIGUIENTE TAXI</h1>
			<center>
			    <table border="0" style="margin: 0 auto;">
				    <tr>
						<td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
						<td> &nbsp; '.$fila[0].'</td>
					</tr>
				    <tr>
						<td style="text-align: center;"><b><font color="000000"> Patente: </b> </td>
						<td> &nbsp; '.$fila[1].'</td>
					</tr>
					<tr>
						<td style="text-align: center;"><b><font color="000000"> Marca: </b> </td>
						<td> &nbsp; '.$fila[2].'</td>
					</tr>
					<tr>
				        <td style="text-align: center;"><b><font color="000000"> Modelo: </b> </td>
						<td> &nbsp; '.$fila[3].'</td>
					</tr>
					<tr>
					    <td><a href="principal.php"><br><input type="submit" class="button" name="b_guardar" value="VOLVER"></a></td>
					</tr>
				</table>
			</center>
			<link href="css/ingreso_datos.css" type="text/css" rel="stylesheet" media="all" />
		</body>
	';
?>