<?php
    include_once 'encabezado1.php';
	if(isset($_POST['ced_cli'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db(mysql: $conexion,database: "bdd_cooperativa_taxis");
		$ced=$_POST['ced_cli'];
		$nom=$_POST['nom_cli'];
		$ape=$_POST['ape_cli'];
		$tel=$_POST['tel_cli'];
		$ema=$_POST['ema_cli'];
		mysqli_query(mysql: $conexion,query: "insert into cliente values(null,'".$ced."','".$nom."','".$ape."','".$tel."','".$ema."')") or die("Error al
		Guardar".mysqli_error(mysql: $conexion));
		include_once 'mantenimiento_cliente.php';
		mysqli_close(mysql: $conexion);
	}else{ //crear el formulario
		echo'
		    <body>
				<h1 class="register-title">REGISTRO DE CLIENTE</h1>
				<form name="cliente" class="register" action="cliente.php" method="post">
				    <center><table border="0" style="margin: 0 auto;">
					    <tr>
						    <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
							<td> <input tpye="text" name="cod_cli" align="middle" disabled="disabled"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Cedula: </b> </td>
							<td> <input type="text" name="ced_cli"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Nombre: </b> </td>
							<td> <input type="text" name="nom_cli"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Apellido: </b> </td>
							<td> <input type="text" name="ape_cli"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Telefono: </b> </td>
							<td> <input type="text" name="tel_cli"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Email: </b> </td>
							<td> <input type="text" name="ema_cli"></td>
						</tr>
						<tr>
						    <td> <br> <center> <input type="reset" class="button" name="b_nuevo" value="RESET">
							<td> <br> <input type="submit" class="button" name="b_guardar" value="GUARDAR">
							</center> </td> </td>
						</tr>
					</center></table>
				</form>
				<link href="css/ingreso_datos.css" type="text/css" rel="stylesheet" media="all" />
			</body>
			<br>
		';
	}
?>
