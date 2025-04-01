<?php
include_once 'encabezado1.php';

if (isset($_POST['tipo_viaje'])) {
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    // Recoge los datos del formulario
    $usuario_id = $_POST['usuario_id'];
    $taxi_id = $_POST['taxi_id'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo_viaje'];
    $descripcion = $_POST['descripcion'];

    // Inserta los datos en la tabla viajes
    mysqli_query($conexion, "INSERT INTO viajes VALUES (NULL, '$usuario_id', '$taxi_id', '$destino', '$fecha', '$tipo', '$descripcion')") or die("Error al guardar: " . mysqli_error($conexion));

    include_once 'mantenimiento_servicio.php';
    mysqli_close($conexion);
} else {
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    // Obtiene los clientes registrados
    $cliente_query = mysqli_query($conexion, "SELECT id, nombre, apellido FROM cliente");
    $cliente_options = '';
    while ($cliente = mysqli_fetch_assoc($cliente_query)) {
        $cliente_options .= '<option value="' . $cliente['id'] . '">' . $cliente['nombre'] . ' ' . $cliente['apellido'] . '</option>';        
    }

    // Obtiene los taxis registrados
    $taxis_query = mysqli_query($conexion, "SELECT id, placa FROM taxis");
    $taxis_options = '';
    while ($taxi = mysqli_fetch_assoc($taxis_query)) {
        $taxis_options .= '<option value="' . $taxi['id'] . '">' . $taxi['placa'] . '</option>';
    }

    mysqli_close($conexion);

    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <title>Registro de Viajes</title>
        <style>
            .page-container {
                width: 100%;
                max-width: 800px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .form-container {
                display: flex;
                flex-direction: column;
                gap: 15px;
                width: 100%;
                max-width: 700px;
                margin: 0 auto;
            }

            .form-container select, .form-container input, .form-container textarea {
                padding: 10px;
                font-size: 1rem;
                border: 1px solid #ddd;
                border-radius: 5px;
                width: 100%;
                box-sizing: border-box;
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
            <h1 class="page-title">Registro de Viajes</h1>
            <form name="servicios" class="form-container" action="servicio.php" method="post">
                <label for="usuario_id">Cliente:</label>
                <select id="usuario_id" name="usuario_id" required>
                    <option value="" disabled selected>Seleccione un cliente</option>
                    ' . $cliente_options . '
                </select>

                <label for="taxi_id">Taxi:</label>
                <select id="taxi_id" name="taxi_id" required>
                    <option value="" disabled selected>Seleccione un taxi</option>
                    ' . $taxis_options . '
                </select>

                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" placeholder="Ingrese el destino" required>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" placeholder="Ingrese la fecha del viaje" required>

                <label for="tipo_viaje">Tipo de Viaje:</label>
                <select id="tipo_viaje" name="tipo_viaje" required>
                    <option value="" disabled selected>Seleccione el tipo de viaje</option>
                    <option value="Urbano">Urbano</option>
                    <option value="Interurbano">Interurbano</option>
                </select>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" placeholder="Ingrese la descripción del viaje" rows="5" required></textarea>

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