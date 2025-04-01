<?php
// Recibir los datos del formulario
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$clave = $_POST['clave'];

// Conectar con la base de datos
include 'conexion.php';

// Consulta segura para evitar inyección SQL
$consulta = $conexion->prepare("SELECT * FROM usuarios WHERE nom_usu = ? AND ema_usu = ? AND pas_usu = ?");
$consulta->bind_param("sss", $usuario, $email, $clave);
$consulta->execute();
$resultado = $consulta->get_result();

// Verificar si se encontró un usuario
if ($resultado->num_rows > 0) {
    // Iniciar sesión y redirigir al usuario
    session_start();
    $_SESSION['nombre_usuario'] = $usuario; // Guarda el nombre del usuario en la sesión
    header("Location: principal.php");
    exit();
} else {
    // Mostrar mensaje de error
    echo '
        <center>
            <h2>ERROR: AUTENTICACIÓN INCORRECTA</h2>
            <a href="index.html">Volver al login</a>
        </center>
    ';
}

// Liberar recursos y cerrar la conexión
$consulta->close();
$conexion->close();
?>