<?php
session_start(); // Inicia la sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: index.html");
    exit();
}
include 'encabezado1.php';

echo '
    <div id="contenido-principal">
        <section class="quienes-somos">
            <h1>¿Quiénes somos?</h1>
            <p>
                La empresa <strong>"Tu Taxi Online"</strong> es la principal en la ciudad de Córdoba. 
                Iniciando su actividad en 2015, actualmente es una de las páginas más usadas en Córdoba para pedir taxis.
            </p>
            <p>
                Con más de 15,000 clientes satisfechos, hemos logrado consolidarnos como la opción preferida para quienes buscan comodidad y eficiencia a la hora de movilizarse por la ciudad. Nuestra plataforma digital ha revolucionado la manera en que los cordobeses solicitan taxis, facilitando el acceso a un transporte confiable con tan solo unos clics.
            </p>
            <p>
                Contamos con una flota moderna y bien equipada, operada por conductores profesionales que garantizan un viaje seguro y placentero. Además, nuestra atención al cliente está disponible las 24 horas del día, brindando asistencia inmediata ante cualquier necesidad o consulta.
            </p>
            <p>
                En "Tu Taxi Online", seguimos innovando y adaptándonos a las necesidades de nuestros usuarios, con el objetivo de ofrecer un servicio que haga de cada viaje una experiencia cómoda y segura. ¡Gracias por confiar en nosotros para llevarte a tu destino!
            </p>
        </section>
    </div>
';
?>