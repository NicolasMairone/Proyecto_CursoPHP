<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conexion.php';
include 'encabezado1.php';
if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("Error: No se proporcionó un ID válido.");
}

$cod = $_GET['id'];

// Obtiene los datos del taxi antes de eliminarlo
$query_taxi = "SELECT * FROM taxis WHERE id='$cod'";
$result_taxi = mysqli_query($conexion, $query_taxi);
$fila_taxi = mysqli_fetch_assoc($result_taxi);

if (!$fila_taxi) {
    die("Error: No se encontró el taxi con el ID proporcionado.");
}

// Elimina los registros relacionados en la tabla viajes
$query_viajes = "DELETE FROM viajes WHERE taxi_id='$cod'";
if (!mysqli_query($conexion, $query_viajes)) {
    die("Error al eliminar los viajes relacionados: " . mysqli_error($conexion));
}

// Elimina el taxi
$query_taxi_delete = "DELETE FROM taxis WHERE id='$cod'";
if (!mysqli_query($conexion, $query_taxi_delete)) {
    die("Error al eliminar el taxi: " . mysqli_error($conexion));
}

mysqli_close($conexion);

// Muestra la confirmación de eliminación
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Eliminar Taxi</title>
    <style>
        .page-container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .page-title {
            color: #d9534f;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1.2rem;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #00703c;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-back:hover {
            background-color: #005a2e;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <h1 class="page-title">Taxi Eliminado</h1>
        <table>
            <tr>
                <th>Código</th>
                <td>' . $fila_taxi['id'] . '</td>
            </tr>
            <tr>
                <th>Matrícula</th>
                <td>' . $fila_taxi['placa'] . '</td>
            </tr>
            <tr>
                <th>Marca y Modelo</th>
                <td>' . $fila_taxi['modelo'] . '</td>
            </tr>
            <tr>
                <th>Conductor</th>
                <td>' . $fila_taxi['conductor'] . '</td>
            </tr>
        </table>
        <a href="mantenimiento_taxi.php" class="btn-back">Volver</a>
    </div>
</body>
</html>
';
?>