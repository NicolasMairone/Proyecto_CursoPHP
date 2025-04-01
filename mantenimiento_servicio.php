<?php
include_once 'encabezado1.php';
include 'conexion.php';

mysqli_select_db($conexion, "bdd_cooperativa_taxis");

// Consulta para obtener los servicios con datos relacionados
$query = "
    SELECT 
        v.id AS cod_servicio,
        CONCAT(c.nombre, ' ', c.apellido) AS cliente,
        t.placa AS taxi,
        v.destino,
        v.fecha,
        v.tipo_viaje,
        v.descripcion
    FROM viajes v
    INNER JOIN cliente c ON v.usuario_id = c.id
    INNER JOIN taxis t ON v.taxi_id = t.id
";
$result = mysqli_query($conexion, $query);

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Mantenimiento de Servicios</title>
    <style>
        .page-container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            text-align: center;
            color: #00703c;
            margin-bottom: 30px;
            font-size: 2rem;
        }

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

        .action-links a {
            text-decoration: none;
            color: #00703c;
            font-size: 1.2rem;
            margin: 0 10px;
        }

        .action-links a:hover {
            color: #005a2e;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <h1 class="page-title">Mantenimiento de Viajes</h1>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Taxi</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Tipo de Viaje</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
';

while ($fila = mysqli_fetch_assoc($result)) {
    echo '
        <tr>
            <td>' . $fila['cod_servicio'] . '</td>
            <td>' . $fila['cliente'] . '</td>
            <td>' . $fila['taxi'] . '</td>
            <td>' . $fila['destino'] . '</td>
            <td>' . $fila['fecha'] . '</td>
            <td>' . $fila['tipo_viaje'] . '</td>
            <td>' . $fila['descripcion'] . '</td>
            <td class="action-links">
                <a href="editar_servicio.php?id=' . $fila['cod_servicio'] . '" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="eliminar_servicio.php?id=' . $fila['cod_servicio'] . '" title="Eliminar" onclick="return confirm(\'¿Estás seguro de eliminar este viaje?\')">
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