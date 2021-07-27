<?php
    $usuario=$_POST['usuario'];
	$email=$_POST['email'];
	$clave=$_POST['clave'];
	//conecto con la BDD
	include 'conexion.php';
	$consulta="Select * from usuarios where nom_usu='$usuario' and ema_usu='$email' and pas_usu='$clave'";
	$resultado=mysqli_query($conexion, $consulta);
	$fila=mysqli_num_rows($resultado);
	if($fila>0){
		header("location:principal.php");
	}else{
		echo '
		    <center>
			    <h2>ERROR: AUTENTIFICACION INCORRECTA</h2>
			</center>
		';
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>