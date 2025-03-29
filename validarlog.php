<?php
    $usuario=$_GET['usuario'];
	$email=$_GET['email'];
	$clave=$_GET['clave'];
	//conecto con la BDD
	include 'conexion.php';
	$consulta="Select * from usuarios where nom_usu='$usuario' and ema_usu='$email' and pas_usu='$clave'";
	$resultado=mysqli_query(mysql: $conexion, query: $consulta);
	$fila=mysqli_num_rows(result: $resultado);
	if($fila>0){
		header(header: "location:principal.php");
	}else{
		echo '
		    <center>
			    <h2>ERROR: AUTENTIFICACION INCORRECTA</h2>
			</center>
		';
	}
	mysqli_free_result(result: $resultado);
	mysqli_close(mysql: $conexion);
?>
