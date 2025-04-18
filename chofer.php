<?php
include_once 'encabezado1.php';

if (isset($_POST['nombre'])) {
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $licencia = $_POST['licencia'];

    // Inserta los datos en la tabla chofer
    $query = "INSERT INTO chofer VALUES (NULL, '$nombre', '$apellido', '$telefono', '$licencia')";
    mysqli_query($conexion, $query) or die("Error al guardar: " . mysqli_error($conexion));

    include_once 'mantenimiento_chofer.php';
    mysqli_close($conexion);
} else {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <title>Registro de Choferes</title>
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
    </head>
    <body>
        <div class="page-container">
            <h1 class="page-title">Registro de Choferes</h1>
            <form name="choferes" class="form-container" action="chofer.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del chofer" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido del chofer" required>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Ingrese el teléfono del chofer" required>

                <label for="licencia">Licencia:</label>
                <input type="text" id="licencia" name="licencia" placeholder="Ingrese la licencia del chofer" required>

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