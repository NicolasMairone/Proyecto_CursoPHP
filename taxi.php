<?php
include_once 'encabezado1.php';

if (isset($_POST['placa'])) {
    // Guardar en la base de datos
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
    include 'conexion.php';

    // Verifica la conexión a la base de datos
    if (!$conexion) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    // Recoge los datos del formulario
    $pla = $_POST['placa'];
    $mar = $_POST['modelo'];
    $mod = $_POST['conductor'];

    // Inserta los datos en la tabla taxis
    $query = "INSERT INTO taxis (id, placa, modelo, conductor) VALUES (NULL, '$pla', '$mar', '$mod')";
    if (mysqli_query($conexion, $query)) {
        // Redirige a mantenimiento_taxi.php después de guardar
        header("Location: mantenimiento_taxi.php");
        exit();
    } else {
        echo '<p>Error al guardar el taxi: ' . mysqli_error($conexion) . '</p>';
    }

    mysqli_close($conexion);
} else {
    // Crear el formulario
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tipo" content="text/html;">
        <link rel="stylesheet" href="css/styles.css">
        <style>
            .page-container {
                width: 100%;
                max-width: 800px; /* Limita el ancho máximo del contenedor */
                margin: 20px auto; /* Centra el contenedor */
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden; /* Evita que el contenido se desborde */
            }

            .form-container {
                display: flex;
                flex-direction: column;
                gap: 15px; /* Espaciado entre los elementos del formulario */
                width: 100%; /* Asegura que el formulario ocupe todo el ancho disponible */
                max-width: 700px; /* Limita el ancho máximo del formulario */
                margin: 0 auto; /* Centra el formulario dentro del contenedor */
            }

            .form-container input {
                padding: 10px;
                font-size: 1rem;
                border: 1px solid #ddd;
                border-radius: 5px;
                width: 100%; /* Asegura que los campos ocupen todo el ancho del formulario */
                box-sizing: border-box; /* Incluye el padding y el borde en el ancho total */
            }

            .button-group {
                display: flex;
                justify-content: space-between;
            }

            .btn-submit {
                padding: 10px 20px;
                font-size: 1rem;
                color: #ffffff;
                background-color: #00703c;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-submit:hover {
                background-color: #005a2e;
            }
        </style>
        <title>Registro de Taxis</title>
    </head>
    <body>
        <div class="page-container">
            <h1 class="page-title">Registro de Taxis</h1>
            <form name="taxis" class="form-container" action="taxi.php" method="post">
                <label for="id">Código:</label>
                <input type="text" id="id" name="id" placeholder="Código automático" disabled>

                <label for="placa">Matrícula:</label>
                <input type="text" id="placa" name="placa" placeholder="Ingrese la matrícula" required>

                <label for="modelo">Marca y Modelo:</label>
                <input type="text" id="modelo" name="modelo" placeholder="Ingrese la marca y modelo" required>

                <label for="conductor">Conductor:</label>
                <input type="text" id="conductor" name="conductor" placeholder="Ingrese el Conductor" required>

                <div class="button-group">
                    <button type="reset" class="btn-submit">Reset</button>
                    <button type="submit" class="btn-submit">Guardar</button>
                </div>
            </form>
        </div>
    </body>
    </html>
    ';
}
?>