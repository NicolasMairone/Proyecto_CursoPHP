<?php
    include_once 'encabezado1.php';
	if(isset($_POST['ced_cho'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$cod=$_POST['cod_cho'];
		$ced=$_POST['ced_cho'];
		$nom=$_POST['nom_cho'];
		$ape=$_POST['ape_cho'];
		$dir=$_POST['dir_cho'];
		$tel=$_POST['tel_cho'];
		$lic=$_POST['lic_cho'];
		mysqli_query($conexion,"update chofer set ced_cho='".$ced."' and nom_cho='".$nom."' and ape_cho='".$ape."' and dir_cho='".$dir."' and tel_cho='".$tel."' and lic_cho='".$tel."' where cod_cho='".$cod."'") or
		    die("Error al Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_chofer.php';
		while ($fila=mysqli_fetch_array($consulta)){
			echo '<tr>';
			    echo '<td>'.$fila[0].'</td>';
				echo '<td>'.$fila[1].'</td>';
				echo '<td>'.$fila[2].'</td>';
				echo '<td>'.$fila[3].'</td>';
				echo '<td>'.$fila[4].'</td>';
				echo '<td>'.$fila[5].'</td>';
				echo '<td>'.$fila[6].'</td>';
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
		$consulta=mysqli_query($conexion,"Select * from chofer where cod_cho= ".$_GET['cod']) or die ("Error al seleccionar".mysqli_error($conexion));
		$fila=mysqli_fetch_array($consulta);
		echo '
		    <body bgcolor="white">
				<h1 class="register-title">EDITAR CHOFER</h1>
				<form name="chofer" class="register" action="editar_chofer.php" method="post">
				    <center>
					    <table border="0" style="margin: 0 auto;">
						    <tr>
							   <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
								<td> <input type="text name="cod_cho" value="'.$fila[0].'" readonly></td>
							</tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Cedula: </b> </td>
							    <td> <input type="text" name="ced_cho" value="'.$fila[1].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Nombre: </b> </td>
							    <td> <input type="text" name="nom_cho" value="'.$fila[2].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Apellido: </b> </td>
							    <td> <input type="text" name="ape_cho" value="'.$fila[3].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Direccion: </b> </td>
							    <td> <input type="text" name="dir_cho" value="'.$fila[4].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Telefono: </b> </td>
							    <td> <input type="text" name="tel_cho" value="'.$fila[5].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Licencia: </b> </td>
							    <td> <input type="text" name="lic_cho" value="'.$fila[6].'"></td>
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