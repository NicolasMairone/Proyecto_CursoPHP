<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conexion.php';
include 'encabezado1.php';

if (isset($_POST['id'])) {

    // Procesar la actualización del taxi
    $cod = $_POST['id'];
    $pla = $_POST['placa'];
    $mar = $_POST['modelo'];
    $cond = $_POST['conductor'];

    $query = "UPDATE taxis 
              SET placa='$pla', modelo='$mar', conductor='$cond' 
              WHERE id='$cod'";

	if (mysqli_query($conexion, $query)) {
		// Redirige a mantenimiento_taxi.php después de guardar
		header("Location: mantenimiento_taxi.php");
		exit();
	} else {
		echo '<p>Error al actualizar: ' . mysqli_error($conexion) . '</p>';
	}

    mysqli_close($conexion);
} else {
    // Mostrar el formulario de edición
    if (!isset($_GET['id'])) {
        die("Error: No se proporcionó un ID válido.");
    }

    $cod = $_GET['id'];
    $query = "SELECT * FROM taxis WHERE id='$cod'";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if ($fila = mysqli_fetch_assoc($result)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/styles.css">
            <title>Editar Taxi</title>
            <style>
                .page-container {
                    width: 90%;
                    max-width: 800px;
                    margin: 20px auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    overflow: hidden; /* Evita que el contenido se desborde */
                }

                .form-container {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                    margin-right: 20px; /* Agrega margen a la derecha del formulario */
                }

                .form-container label {
                    font-weight: bold;
                }

                .form-container input {
                    padding: 10px;
                    font-size: 1rem;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                }

                .form-container input[readonly] {
                    background-color: #f9f9f9; /* Fondo gris claro para campos de solo lectura */
                    cursor: not-allowed; /* Cambia el cursor para indicar que no es editable */
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
                <h1 class="page-title">Editar Taxi</h1>
                <form name="taxi" class="form-container" action="editar_taxi.php" method="post">
                    <label for="id">Código:</label>
                    <input type="text" id="id" name="id" value="<?php echo $fila['id']; ?>" readonly>

                    <label for="placa">Matrícula:</label>
                    <input type="text" id="placa" name="placa" value="<?php echo $fila['placa']; ?>" required>

                    <label for="modelo">Marca y Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="<?php echo $fila['modelo']; ?>" required>

                    <label for="conductor">Conductor:</label>
                    <input type="text" id="conductor" name="conductor" value="<?php echo $fila['conductor']; ?>" required>

                    <div class="button-group">
                        <button type="button" class="btn-reset" disabled>Reset</button>
                        <button type="submit" class="btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo '<p>Error: No se encontró el taxi.</p>';
    }

    mysqli_close($conexion);
}
?>