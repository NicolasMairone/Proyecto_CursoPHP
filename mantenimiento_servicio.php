<?php
    include_once 'encabezado1.php';
	include 'conexion.php';
	$consulta=mysqli_query($conexion,"Select * from servicio");
	echo '<center>';
	    echo '<br>'.'<table border=1 bgcolor="white" align="center">';
	        echo '<tr>';
	        echo '<th colspan=10>'.'<b/>'.'SERVICIOS INGRESADOS'.'</th>';
	        echo '</tr>';
	        echo '<tr>';
	            echo '<th>'.'<b/>'.'CODIGO'.'</th>';
		        echo '<th>'.'<b/>'.'FECHA'.'</th>';
				echo '<th>'.'<b/>'.'DESTINO'.'</th>';
				echo '<th>'.'<b/>'.'KILOMETROS'.'</th>';
				echo '<th>'.'<b/>'.'PRECIO'.'</th>';
				echo '<th>'.'<b/>'.'CHOFER'.'</th>';
				echo '<th>'.'<b/>'.'TAXI'.'</th>';
				echo '<th>'.'<b/>'.'CLIENTE'.'</th>';
		        echo '<th colspan=2>'.'<b/>'.'ACCION'.'</th>';
	        echo '</tr>';
			
	        while($fila=mysqli_fetch_array($consulta)){
		        echo '<tr>';
		            echo '<td>'.$fila[0].'</td>';
		            echo '<td>'.$fila[1].'</td>';
					echo '<td>'.$fila[2].'</td>';
					echo '<td>'.$fila[3].'</td>';
					echo '<td>'.$fila[4].'</td>';
					echo '<td>'.$fila[5].'</td>';
					echo '<td>'.$fila[6].'</td>';
					echo '<td>'.$fila[7].'</td>';
		            echo '<td><a href="editar_servicio.php?cod='.$fila[0].'"> <img src="imagenes/editar.jpg" height="30"
		            width="30" title="EDITAR SERVICIO"> </a></td>';
		            echo '<td><a href="eliminar_servicio.php?cod='.$fila[1].'"> <img src="imagenes/eliminar.png"
		            height="30" width="30" title="ELIMINAR SERVICIO"> </a></td>';
		        echo '</tr>';
	        }
	    echo '</table>';
		echo '<br>';
	echo '</center>';
	echo '
	    <link href="css/mostrar_datos.css" type="text/css" rel="stylesheet" media="all" />
	';
?>