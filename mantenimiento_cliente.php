<?php
    include_once 'encabezado1.php';
	include 'conexion.php';
	$consulta=mysqli_query(mysql: $conexion,query: "Select * from cliente");
	echo '<center>';
	    echo '<br>'.'<table border=1 bgcolor="white" align="center">';
	        echo '<tr>';
	        echo '<th colspan=9>'.'<b/>'.'CLIENTES INGRESADOS'.'</th>';
	        echo '</tr>';
	        echo '<tr>';
	            echo '<th>'.'<b/>'.'CODIGO'.'</th>';
		        echo '<th>'.'<b/>'.'CEDULA'.'</th>';
				echo '<th>'.'<b/>'.'NOMBRE'.'</th>';
				echo '<th>'.'<b/>'.'APELLIDO'.'</th>';
				echo '<th>'.'<b/>'.'TELEFONO'.'</th>';
				echo '<th>'.'<b/>'.'EMAIL'.'</th>';
		        echo '<th colspan=2>'.'<b/>'.'ACCION'.'</th>';
	        echo '</tr>';
			
	        while($fila=mysqli_fetch_array(result: $consulta)){
		        echo '<tr>';
		            echo '<td>'.$fila[0].'</td>';
		            echo '<td>'.$fila[1].'</td>';
					echo '<td>'.$fila[2].'</td>';
					echo '<td>'.$fila[3].'</td>';
					echo '<td>'.$fila[4].'</td>';
					echo '<td>'.$fila[5].'</td>';
		            echo '<td><a href="editar_cliente.php?cod='.$fila[0].'"> <img src="imagenes/editar.jpg" height="30"
		            width="30" title="EDITAR CLIENTE"> </a></td>';
		            echo '<td><a href="eliminar_cliente.php?cod='.$fila[1].'"> <img src="imagenes/eliminar.png"
		            height="30" width="30" title="ELIMINAR CLIENTE"> </a></td>';
		        echo '</tr>';
	        }
	    echo '</table>';
		echo '<br>';
	echo '</center>';
	echo '
	    <link href="css/mostrar_datos.css" type="text/css" rel="stylesheet" media="all" />
	';
?>