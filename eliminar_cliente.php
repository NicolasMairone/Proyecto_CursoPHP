<?php
include_once 'encabezado1.php';
include 'conexion.php';

mysqli_select_db($conexion, "bdd_cooperativa_taxis");

// Obtiene los datos del cliente antes de eliminarlo
$id = $_GET['id'];
$consulta = mysqli_query($conexion, "SELECT * FROM cliente WHERE id=$id");
$fila = mysqli_fetch_array($consulta);

// Elimina el cliente
$consultauno = mysqli_query($conexion, "DELETE FROM cliente WHERE id=$id");

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Eliminar Cliente</title>
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
        <h1 class="page-title">Cliente Eliminado</h1>
        <table>
            <tr>
                <th>Código</th>
                <td>' . $fila['id'] . '</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>' . $fila['nombre'] . '</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>' . $fila['apellido'] . '</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>' . $fila['telefono'] . '</td>
            </tr>
            <tr>
                <th>DNI</th>
                <td>' . $fila['dni'] . '</td>
            </tr>
        </table>
        <a href="mantenimiento_cliente.php" class="btn-back">Volver</a>
    </div>
</body>
</html>
';
?>