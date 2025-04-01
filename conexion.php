<?php
$servidor = "localhost";
$db_usuario = "root"; // Cambia el nombre de la variable para evitar conflictos
$db_password = ""; // Contraseña del usuario de la base de datos
$base_datos = "bdd_cooperativa_taxis";

$conexion = mysqli_connect($servidor, $db_usuario, $db_password, $base_datos);

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}
?>