<?php
include_once 'encabezado1.php';

if (isset($_POST['id'])) {
    // Guardar en la base de datos
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    $cod = $_POST['id'];
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $tel = $_POST['telefono'];
    $lic = $_POST['licencia'];

    $query = "UPDATE chofer 
              SET nombre='$nom', apellido='$ape', telefono='$tel', licencia='$lic' 
              WHERE id='$cod'";

    if (mysqli_query($conexion, $query)) {
        header("Location: mantenimiento_chofer.php");
        exit();    
    } else {
        echo '<p>Error al actualizar: ' . mysqli_error($conexion) . '</p>';
    }

    mysqli_close($conexion);
} else {
    // Mostrar el formulario de edición
    include 'conexion.php';
    mysqli_select_db($conexion, "bdd_cooperativa_taxis");

    $cod = $_GET['id'];
    $query = "SELECT * FROM chofer WHERE id='$cod'";
    $result = mysqli_query($conexion, $query);

    if ($fila = mysqli_fetch_assoc($result)) {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/styles.css">
            <style>
                .page-container {
                    width: 90%;
                    max-width: 900px; /* Aumenta el ancho máximo del formulario */
                    margin: 20px auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .form-container {
                    max-width: 860px; /* Aumenta el ancho máximo del formulario */
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                }

                .form-container input {
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
            <title>Editar Chofer</title>
        </head>
        <body>
            <div class="page-container">
                <h1 class="page-title">Editar Chofer</h1>
                <form name="chofer" class="form-container" action="editar_chofer.php" method="post">
                    <label for="id">Código:</label>
                    <input type="text" id="id" name="id" value="' . $fila['id'] . '" readonly style="background-color: #f0f0f0; border: 1px solid #ccc;">

                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="' . $fila['nombre'] . '" required>

                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="' . $fila['apellido'] . '" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="' . $fila['telefono'] . '" required>

                    <label for="licencia">Licencia:</label>
                    <input type="text" id="licencia" name="licencia" value="' . $fila['licencia'] . '" required>

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
        echo '<p>Error: No se encontró el chofer.</p>';
    }

    mysqli_close($conexion);
}
?>