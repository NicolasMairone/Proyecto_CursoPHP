<?php
    include_once 'encabezado1.php';
	include 'conexion.php';
	$consulta=mysqli_query(mysql: $conexion,query: "Select * from taxi");
	echo '<center>';
	    echo '<br>'.'<table border=1 bgcolor="white" align="center">';
	        echo '<tr>';
	        echo '<th colspan=9>'.'<b/>'.'TAXIS INGRESADOS'.'</th>';
	        echo '</tr>';
	        echo '<tr>';
	            echo '<th>'.'<b/>'.'CODIGO'.'</th>';
		        echo '<th>'.'<b/>'.'MATRICULA'.'</th>';
				echo '<th>'.'<b/>'.'MARCA'.'</th>';
				echo '<th>'.'<b/>'.'MODELO'.'</th>';
		        echo '<th colspan=2>'.'<b/>'.'ACCION'.'</th>';
	        echo '</tr>';
			
	        while($fila=mysqli_fetch_array(result: $consulta)){
		        echo '<tr>';
		            echo '<td>'.$fila[0].'</td>';
		            echo '<td>'.$fila[1].'</td>';
					echo '<td>'.$fila[2].'</td>';
					echo '<td>'.$fila[3].'</td>';
		            echo '<td><a href="editar_taxi.php?cod='.$fila[0].'"> <img src="imagenes/editar.jpg" height="30"
		            width="30" title="EDITAR TAXI"> </a></td>';
		            echo '<td><a href="eliminar_taxi.php?cod='.$fila[1].'"> <img src="imagenes/eliminar.png"
		            height="30" width="30" title="ELIMINAR TAXI"> </a></td>';
		        echo '</tr>';
	        }
	    echo '</table>';
		echo '<br>';
	echo '</center>';
	echo '
	    <link href="css/mostrar_datos.css" type="text/css" rel="stylesheet" media="all" />
	';
?>