<?php
    include_once 'encabezado1.php';
	if(isset($_POST['pla_tax'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$pla=$_POST['pla_tax'];
		$mar=$_POST['mar_tax'];
		$mod=$_POST['mod_tax'];
		mysqli_query($conexion,"insert into taxi values(null,'".$pla."','".$mar."','".$mod."')") or die("Error al
		Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_taxi.php';
		mysqli_close($conexion);
	}else{ //crear el formulario
		echo'
		    <body>
				<h1 class="register-title">REGISTRO DE TAXIS</h1>
				<form name="taxis" class="register" action="taxi.php" method="post">
				    <center><table border="0" style="margin: 0 auto;">
					    <tr>
						    <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
							<td> <input tpye="text" name="cod_tax" align="middle" disabled="disabled"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Matricula: </b> </td>
							<td> <input type="text" name="pla_tax"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Marca: </b> </td>
							<td> <input type="text" name="mar_tax"></td>
						</tr>
						<tr>
						    <td style="text-align: center;"> <b><font color="000000"> Modelo: </b> </td>
							<td> <input type="text" name="mod_tax"></td>
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