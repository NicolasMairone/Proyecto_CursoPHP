<?php
    include_once 'encabezado1.php';
	if(isset($_POST['fec_ser'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$fec=$_POST['fec_ser'];
		$des=$_POST['des_ser'];
		$kil=$_POST['kil_ser'];
		$pre=$_POST['pre_ser'];
		$cho=$_POST['cho_ser'];
		$tax=$_POST['tax_ser'];
		$cli=$_POST['cli_ser'];
		mysqli_query($conexion,"insert into servicio values(null,'".$fec."','".$des."','".$kil."','".$pre."','".$cho."','".$tax."','".$cli."')") or die("Error al
		Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_servicio.php';
		mysqli_close($conexion);
	}else{ //crear el formulario
		echo'
		    <body>
				<h1 class="register-title">REGISTRO DE SERVICIO</h1>
				<form name="servicio" class="register" action="servicio.php" method="post">
				    <center><table border="0" style="margin: 0 auto;">
					    <tr>
						    <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
							<td> <input tpye="text" name="cod_ser" align="middle" disabled="disabled"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Fecha: </b> </td>
							<td> <input type="text" name="fec_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Destino: </b> </td>
							<td> <input type="text" name="des_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Kilometros: </b> </td>
							<td> <input type="text" name="kil_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Precio: </b> </td>
							<td> <input type="text" name="pre_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Chofer: </b> </td>
							<td> <input type="text" name="cho_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Taxi: </b> </td>
							<td> <input type="text" name="tax_ser"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Cliente: </b> </td>
							<td> <input type="text" name="cli_ser"></td>
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