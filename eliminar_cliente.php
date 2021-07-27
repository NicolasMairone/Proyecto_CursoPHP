<?php
    include_once 'encabezado1.php';
	include 'conexion.php';
	mysqli_select_db($conexion,"bdd_cooperativa_taxis");
	$consulta=mysqli_query($conexion, "Select * from cliente where cod_cli=".$_GET['cod']);
	$consultauno=mysqli_query($conexion, "Delete from cliente where cod_cli=".$_GET['cod']);
	$fila=mysqli_fetch_array($consulta);
	echo '
	    <body>
		    <h1 class="register-title">SE HA ELIMINADO EL SIGUIENTE CLIENTE</h1>
			<center>
			    <table border=0 style="margin: 0 auto;">
				    <tr>
						<td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
						<td> &nbsp; '.$fila[0].'</td>
					</tr>
				    <tr>
						<td style="text-align: center;"><b><font color="000000"> Cedula: </b> </td>
						<td> &nbsp; '.$fila[1].'</td>
					</tr>
					<tr>
						<td style="text-align: center;"><b><font color="000000"> Nombre: </b> </td>
						<td> &nbsp; '.$fila[2].'</td>
					</tr>
					<tr>
				        <td style="text-align: center;"><b><font color="000000"> Apellido: </b> </td>
						<td> &nbsp; '.$fila[3].'</td>
					</tr>
					<tr>
				        <td style="text-align: center;"><b><font color="000000"> Telefono: </b> </td>
						<td> &nbsp; '.$fila[4].'</td>
					</tr>
					<tr>
				        <td style="text-align: center;"><b><font color="000000"> Email: </b> </td>
						<td> &nbsp; '.$fila[5].'</td>
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