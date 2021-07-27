<?php
    include_once 'encabezado1.php';
	if(isset($_POST['ced_cli'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$cod=$_POST['cod_cli'];
		$ced=$_POST['ced_cli'];
		$nom=$_POST['nom_cli'];
		$ape=$_POST['ape_cli'];
		$tel=$_POST['tel_cli'];
		$ema=$_POST['ema_cli'];
		mysqli_query($conexion,"update cliente set ced_cli='".$ced."',nom_cli='".$nom."',ape_cli='".$ape."',tel_cli='".$tel."',ema_cli='".$ema."' where cod_cli='".$cod."'") or
		    die("Error al Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_cliente.php';
		while ($fila=mysqli_fetch_array($consulta)){
			echo '<tr>';
			    echo '<td>'.$fila[0].'</td>';
				echo '<td>'.$fila[1].'</td>';
				echo '<td>'.$fila[2].'</td>';
				echo '<td>'.$fila[3].'</td>';
				echo '<td>'.$fila[4].'</td>';
				echo '<td>'.$fila[5].'</td>';
			echo '</tr>';
		}
		echo '<br>';
	    mysqli_close($conexion);
	    echo '<br>';
	    echo '<br>';
	    echo '
	        <link href="css/mostros_datos.css" type="text/css" rel="stylesheet" media="all" />
	    ';
	}else{ //crear el formulario
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$consulta=mysqli_query($conexion,"Select * from cliente where cod_cli=".$_GET['cod']);
		$fila=mysqli_fetch_array($consulta);
		echo '
		    <body bgcolor="white">
				<h1 class="register-title">EDITAR CLIENTE</h1>
				<form name="cliente" class="register" action="editar_cliente.php" method="post">
				    <center>
					    <table border="0" style="margin: 0 auto;">
						    <tr>
							   <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
								<td> <input type="text name="cod_cli" value="'.$fila[0].'" readonly></td>
							</tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Cedula: </b> </td>
							    <td> <input type="text" name="ced_cli" value="'.$fila[1].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Nombre: </b> </td>
							    <td> <input type="text" name="nom_cli" value="'.$fila[2].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Apellido: </b> </td>
							    <td> <input type="text" name="ape_cli" value="'.$fila[3].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Telefono: </b> </td>
							    <td> <input type="text" name="tel_cli" value="'.$fila[4].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Email: </b> </td>
							    <td> <input type="text" name="ema_cli" value="'.$fila[5].'"></td>
						    </tr>
							<tr>
							    <td>
								</td>
								<td><input type="submit" class="button" name="b_guardar" value="GUARDAR"></td>
							</tr>
						</table>
					</center>
				</form>
			    <link href="css/ingreso_datos.css" type="text/css" rel="stylesheet" media="all" />
			</body>
			<br>
		';
	}
?>