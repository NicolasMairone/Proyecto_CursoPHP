<?php
    include_once 'encabezado1.php';
	if(isset($_POST['pla_tax'])==true){
		//guardar en la bdd
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		include 'conexion.php';
		mysqli_select_db(mysql: $conexion,database: "bdd_cooperativa_taxis");
		$cod=$_POST['cod_tax'];
		$pla=$_POST['pla_tax'];
		$mar=$_POST['mar_tax'];
		$mod=$_POST['mod_tax'];
		mysqli_query(mysql: $conexion,query: "update taxi set pla_tax='".$pla."' and mar_tax='".$mar."' and mod_tax='".$mod."' where cod_tax='".$cod."'") or
		    die("Error al Guardar".mysqli_error(mysql: $conexion));
		include_once 'mantenimiento_taxi.php';
		while ($fila=mysqli_fetch_array(result: $consulta)){
			echo '<tr>';
			    echo '<td>'.$fila[0].'</td>';
				echo '<td>'.$fila[1].'</td>';
				echo '<td>'.$fila[2].'</td>';
				echo '<td>'.$fila[3].'</td>';
			echo '</tr>';
		}
		echo '<br>';
	    mysqli_close(mysql: $conexion);
	    echo '<br>';
	    echo '<br>';
	    echo '
	        <link href="css/mostros_datos.css" type="text/css" rel="stylesheet" media="all" />
	    ';
	}else{ //crear el formulario
		include 'conexion.php';
		mysqli_select_db(mysql: $conexion,database: "bdd_cooperativa_taxis");
		$consulta=mysqli_query(mysql: $conexion,query: "Select * from taxi where cod_tax=".$_GET['cod']);
		$fila=mysqli_fetch_array(result: $consulta);
		echo '
		    <body bgcolor="white">
				<h1 class="register-title">EDITAR TAXI</h1>
				<form name="taxi" class="register" action="editar_taxi.php" method="post">
				    <center>
					    <table border="0" style="margin: 0 auto;">
						    <tr>
							   <td style="text-align: center;"><b><font color="000000"> Codigo: </b> </td>
								<td> <input type="text name="cod_tax" value="'.$fila[0].'" readonly></td>
							</tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Patente: </b> </td>
							    <td> <input type="text" name="pla_tax" value="'.$fila[1].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Marca: </b> </td>
							    <td> <input type="text" name="pla_tax" value="'.$fila[2].'"></td>
						    </tr>
							<tr>
							    <td style="text-align: center;"><b><font color="000000"> Modelo: </b> </td>
							    <td> <input type="text" name="pla_tax" value="'.$fila[3].'"></td>
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