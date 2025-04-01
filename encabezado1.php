<?php
session_start(); // Inicia la sesión

// Recupera el nombre del usuario desde la sesión
$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Invitado';

if (!in_array(basename($_SERVER['PHP_SELF']), ['logout.php', 'login.php'])) {
    include 'footer.php';
}

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tipo" content="text/html;">
    <title>Agencia de Taxi</title>
    <link rel="icon" href="imagenes/logo.ico">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <img src="imagenes/taxi.png" alt="TuTaxiOnline" class="logo">
        <h2>BIENVENIDO/A, ' . htmlspecialchars($nombre_usuario) . '</h2>
    </header>
    <nav>
        <ul>
            <li><a href="principal.php">INICIO</a></li>
            <li>
                <a href="taxi.php" title="Ingreso de taxis">TAXI</a>
                <ul>
                    <li><a href="mantenimiento_taxi.php">Modificar Taxi</a></li>
                </ul>
            </li>
            <li>
                <a href="chofer.php" title="Ingreso de choferes">CHOFER</a>
                <ul>
                    <li><a href="mantenimiento_chofer.php" title="Mantenimiento de Choferes">Modificar Chofer</a></li>
                </ul>
            </li>
            <li>
                <a href="cliente.php" title="Ingreso de Login-Clientes">CLIENTES</a>
                <ul>
                    <li><a href="mantenimiento_cliente.php" title="Mantenimiento de Clientes">Modificar Clientes</a></li>
                </ul>
            </li>
            <li>
                <a href="servicio.php" title="Ingreso del servicio a pedir">VIAJES</a>
                <ul>
                    <li><a href="mantenimiento_servicio.php" title="Mantenimiento de Viajes">Modificar Viajes</a></li>
                </ul>
            </li>
            <li>
                <a href="contacto.php" title="Contacto">CONTACTO</a>
            </li>
            <li>
                <a href="logout.php" title="Salir" id="salir">SALIR</a>
            </li>
        </ul>
    </nav>
';
include 'footer.php'; 
?>