<?php
include_once 'encabezado1.php';

if (isset($_POST['id'])) {
    // Actualizar los datos del servicio
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $taxi_id = $_POST['taxi_id'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $tipo_viaje = $_POST['tipo_viaje'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE viajes 
              SET usuario_id='$usuario_id', taxi_id='$taxi_id', destino='$destino', fecha='$fecha', tipo_viaje='$tipo_viaje', descripcion='$descripcion' 
              WHERE id='$id'";

    if (mysqli_query($conexion, $query)) {
        header("Location: mantenimiento_servicio.php");
        exit();
    } else {
        echo '<p>Error al actualizar: ' . mysqli_error($conexion) . '</p>';
    }

    mysqli_close($conexion);

} else {
    // Mostrar el formulario de edición
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    $id = $_GET['id'];
    $query = "SELECT * FROM viajes WHERE id='$id'";
    $result = mysqli_query($conexion, $query);

    if ($fila = mysqli_fetch_assoc($result)) {
        // Obtener los clientes registrados
        $cliente_query = mysqli_query($conexion, "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo FROM cliente");
        $cliente_options = '';
        while ($cliente = mysqli_fetch_assoc($cliente_query)) {
            $selected = $cliente['id'] == $fila['usuario_id'] ? 'selected' : '';
            $cliente_options .= '<option value="' . $cliente['id'] . '" ' . $selected . '>' . $cliente['nombre_completo'] . '</option>';
        }

        // Obtener los taxis registrados
        $taxi_query = mysqli_query($conexion, "SELECT id, placa FROM taxis");
        $taxi_options = '';
        while ($taxi = mysqli_fetch_assoc($taxi_query)) {
            $selected = $taxi['id'] == $fila['taxi_id'] ? 'selected' : '';
            $taxi_options .= '<option value="' . $taxi['id'] . '" ' . $selected . '>' . $taxi['placa'] . '</option>';
        }

        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/styles.css">
            <title>Editar Servicio</title>
            <style>
                .page-container {
                    width: 90%;
                    max-width: 900px;
                    margin: 20px auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .form-container {
                    max-width: 860px; 
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
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
                    align-items: center; /* Asegura que los botones estén alineados verticalmente */
                }

                .btn-submit{
                    padding: 10px 20px; /* Asegura que ambos botones tengan el mismo tamaño */
                    font-size: 1rem;
                    color: #ffffff;
                    border: none;
                    border-radius: 5px;
                    width: 48%; /* Ambos botones ocupan el mismo ancho */
                    text-align: center;
                    height: 80px; /* Forza la misma altura para ambos botones */
                }

                .btn-submit {
                    background-color: #00703c;
                }

                .btn-submit:hover {
                    background-color: #005a2e;
                }

                .btn-reset {
					font-size: 1.3rem;
					margin-top: 20px;
					padding: 10px 20px; 
                    color: #ffffff;
                    border: none;
                    border-radius: 5px;
					font-weight: bold;
                    width: 20%; /* Ambos botones ocupan el mismo ancho */
                    text-align: center;
                    height: 80px; /* Forza la misma altura para ambos botones */
                    background-color: #cccccc;
                    cursor: not-allowed; /* Deshabilita el botón */
                }
            </style>
        </head>
        <body>
            <div class="page-container">
                <h1 class="page-title">Editar Servicio</h1>
                <form name="servicio" class="form-container" action="editar_servicio.php" method="post">
                    <label for="id">Código:</label>
                    <input type="text" id="id" name="id" value="' . $fila['id'] . '" readonly style="background-color: #f0f0f0; border: 1px solid #ccc;">

                    <label for="usuario_id">Cliente:</label>
                    <select id="usuario_id" name="usuario_id" required>
                        ' . $cliente_options . '
                    </select>

                    <label for="taxi_id">Taxi:</label>
                    <select id="taxi_id" name="taxi_id" required>
                        ' . $taxi_options . '
                    </select>

                    <label for="destino">Destino:</label>
                    <input type="text" id="destino" name="destino" value="' . $fila['destino'] . '" required>

                    <label for="fecha">Fecha:</label>
                    <input type="datetime-local" id="fecha" name="fecha" value="' . date('Y-m-d\TH:i', strtotime($fila['fecha'])) . '" required>

                    <label for="tipo_viaje">Tipo de Viaje:</label>
                    <select id="tipo_viaje" name="tipo_viaje" required>
                        <option value="Urbano" ' . ($fila['tipo_viaje'] == 'Urbano' ? 'selected' : '') . '>Urbano</option>
                        <option value="Interurbano" ' . ($fila['tipo_viaje'] == 'Interurbano' ? 'selected' : '') . '>Interurbano</option>
                    </select>

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="5" required>' . $fila['descripcion'] . '</textarea>

                    <div class="button-group">
                        <button type="reset" class="btn-reset">Reset</button>
                        <button type="submit" class="btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </body>
        </html>
        ';
    } else {
        echo '<p>Error: No se encontró el servicio.</p>';
    }

    mysqli_close($conexion);
}
?>