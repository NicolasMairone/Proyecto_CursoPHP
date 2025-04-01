<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conexion.php';
include 'encabezado1.php';

// Consulta para obtener los datos de los taxis
$query = "SELECT * FROM taxis";
$result = mysqli_query($conexion, $query);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Mantenimiento de Taxis</title>
    <style>
        /* Contenedor principal */
        .page-container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.2rem;
            text-align: left;
        }

        table thead {
            background-color: #00703c;
            color: white;
        }

        table th, table td {
            padding: 15px 20px;
            border: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Columna de acciones más pequeña */
        table th:last-child, table td:last-child {
            width: 120px; /* Ajusta el ancho de la columna de acciones */
            text-align: center;
        }

        .action-links a {
            text-decoration: none;
            color: #00703c;
            font-size: 1.2rem;
            margin: 0 10px;
        }

        .action-links a:hover {
            color: #005a2e;
        }

        .page-title {
            text-align: center;
            color: #00703c;
            margin-bottom: 30px;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <h1 class="page-title">Mantenimiento de Taxis</h1>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Matrícula</th>
                    <th>Marca y Modelo</th>
                    <th>Conductor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
';

while ($fila = mysqli_fetch_assoc($result)) {
    echo '
        <tr>
            <td>' . $fila['id'] . '</td>
            <td>' . $fila['placa'] . '</td>
            <td>' . $fila['modelo'] . '</td>
            <td>' . $fila['conductor'] . '</td>
            <td class="action-links">
                <a href="editar_taxi.php?id=' . $fila['id'] . '" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="eliminar_taxi.php?id=' . $fila['id'] . '" title="Eliminar" onclick="return confirm(\'¿Estás seguro de eliminar este taxi?\')">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    ';
}

echo '
            </tbody>
        </table>
    </div>
</body>
</html>
';

mysqli_close($conexion);
?>