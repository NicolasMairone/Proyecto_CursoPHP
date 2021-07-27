<?php
    include_once 'encabezado1.php';
	if(isset($_POST['fec_ser'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db($conexion,"bdd_cooperativa_taxis");
		$cod=$_POST['cod_ser'];
		$fec=$_POST['fec_ser'];
		$des=$_POST['des_ser'];
		$kil=$_POST['kil_ser'];
		$pre=$_POST['pre_ser'];
		$cho=$_POST['cho_ser'];
		$tax=$_POST['tax_ser'];
		$cli=$_POST['cli_ser'];
		mysqli_query($conexion,"update servicio set fec_ser='".$fec."' and des_ser='".$des."' and kil_ser='".$kil."' and pre_ser='".$pre."' and cho_ser='".$cho."' and tax_ser='".$tax."' and cli_ser='".$cli."' where cod_ser='".$cod."'") or
		    die("Error al Guardar".mysqli_error($conexion));
		include_once 'mantenimiento_servicio.php';
		while ($fila=mysqli_fetch_array($consulta)){
			echo '<tr>';
			    echo '<td>'.$fila[0].'</td>';
				echo '<td>'.$fila[1].'</td>';
				echo '<td>'.$fila[2].'</td>';
				echo '<td>'.$fila[3].'</td>';
				echo '<td>'.$fila[4].'</td>';
				echo '<td>'.$fila[5].'</td>';
				echo '<td>'.$fila[6].'</td>';
				echo '<td>'.$fila[7].'</td>';
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
		$consulta=mysqli_query($conexion,"Select * from servicio where cod_ser=".$_GET['cod']);
		$fila=mysqli_fetch_array($consulta);
		echo '
		    <body bgcolor="white">
				<h1 class="register-title">EDITAR SERVICIO</h1>
				<form name="servicio" class="register" action="editar_servicio.php" method="post">
				    <center>
					    <table border="0" style="margin: 0 auto;">
						    <tr>
							   <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
								<td> <input type="text name="cod_ser" value="'.$fila[0].'" readonly></td>
							</tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Fecha: </b> </td>
							    <td> <input type="text" name="fec_ser" value="'.$fila[1].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Destino: </b> </td>
							    <td> <input type="text" name="des_ser" value="'.$fila[2].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Kilometros: </b> </td>
							    <td> <input type="text" name="kil_ser" value="'.$fila[3].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Precio: </b> </td>
							    <td> <input type="text" name="pre_ser" value="'.$fila[4].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Chofer: </b> </td>
							    <td> <input type="text" name="cho_ser" value="'.$fila[5].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Taxi: </b> </td>
							    <td> <input type="text" name="tax_ser" value="'.$fila[6].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Cliente: </b> </td>
							    <td> <input type="text" name="cli_ser" value="'.$fila[7].'"></td>
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