<?php
include_once 'encabezado1.php';
include 'conexion.php';

mysqli_select_db($conexion, "bdd_cooperativa_taxis");

if (isset($_GET['id'])) {
    $cod = $_GET['id'];

    // Obtiene los datos del servicio antes de eliminarlo
    $consulta = mysqli_query($conexion, "
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
        WHERE v.id = '$cod'
    ") or die("Error al seleccionar: " . mysqli_error($conexion));

    $fila = mysqli_fetch_assoc($consulta);

    // Verifica si se encontraron datos
    if ($fila) {
        // Elimina el servicio
        $consulta_eliminar = mysqli_query($conexion, "DELETE FROM viajes WHERE id = '$cod'") or die("Error al eliminar: " . mysqli_error($conexion));

        mysqli_close($conexion);

        // Muestra los datos del servicio eliminado
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/styles.css">
            <title>Eliminar Servicio</title>
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
                <h1 class="page-title">Servicio Eliminado</h1>
                <table>
                    <tr>
                        <th>Código</th>
                        <td>' . $fila['cod_servicio'] . '</td>
                    </tr>
                    <tr>
                        <th>Cliente</th>
                        <td>' . $fila['cliente'] . '</td>
                    </tr>
                    <tr>
                        <th>Taxi</th>
                        <td>' . $fila['taxi'] . '</td>
                    </tr>
                    <tr>
                        <th>Destino</th>
                        <td>' . $fila['destino'] . '</td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>' . $fila['fecha'] . '</td>
                    </tr>
                    <tr>
                        <th>Tipo de Viaje</th>
                        <td>' . $fila['tipo_viaje'] . '</td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td>' . $fila['descripcion'] . '</td>
                    </tr>
                </table>
                <a href="mantenimiento_servicio.php" class="btn-back">Volver</a>
            </div>
        </body>
        </html>
        ';
    } else {
        echo '<p>Error: No se encontró el servicio con el código proporcionado.</p>';
    }
} else {
    echo '<p>Error: No se proporcionó un código de servicio válido.</p>';
}
?>