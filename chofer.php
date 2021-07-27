<?php
    include_once 'encabezado1.php';
	if(isset($_POST['ced_cho'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$ced=$_POST['ced_cho'];
		$nom=$_POST['nom_cho'];
		$ape=$_POST['ape_cho'];
		$dir=$_POST['dir_cho'];
		$tel=$_POST['tel_cho'];
		$lic=$_POST['lic_cho'];
		mysqli_query($conexion,"insert into chofer values(null,'".$ced."','".$nom."','".$ape."','".$dir."','".$tel."','".$lic."')") or die("Error al
		Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_chofer.php';
		mysqli_close($conexion);
	}else{ //crear el formulario
		echo'
		    <body>
				<h1 class="register-title">REGISTRO DE CHOFER</h1>
				<form name="chofer" class="register" action="chofer.php" method="post">
				    <center><table border="0" style="margin: 0 auto;">
					    <tr>
						    <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
							<td> <input tpye="text" name="cod_cho" align="middle" disabled="disabled"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Cedula: </b> </td>
							<td> <input type="text" name="ced_cho"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Nombre: </b> </td>
							<td> <input type="text" name="nom_cho"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Apellido: </b> </td>
							<td> <input type="text" name="ape_cho"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Direccion: </b> </td>
							<td> <input type="text" name="dir_cho"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Telefono: </b> </td>
							<td> <input type="text" name="tel_cho"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Licencia: </b> </td>
							<td> <input type="text" name="lic_cho"></td>
						</tr>
						<tr>
						    <td> <br> <center> <input type="reset" class="button" name="b_nuevo" value="RESET">
							<td> <br> <input type="submit" class="button" name="b_guardar" value="GUARDAR"></td>
							</center> </td>
						</tr>
					</center></table>
				</form>
				<link href="css/ingreso_datos.css" type="text/css" rel="stylesheet" media="all" />
			</body>
			<br>
		';
	}
?>