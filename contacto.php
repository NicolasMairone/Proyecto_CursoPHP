<?php
include 'encabezado1.php';
echo ' 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/styles.css">
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
            color: #00703c;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .contact-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-icons a {
            text-decoration: none;
        }

        .contact-icons img {
            width: 80px;
            height: 80px;
            border-radius: 10%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-icons img:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <main>
        <div class="page-container">
            <h2 class="page-title">Información de Contacto</h2>
            <div class="contact-icons">
                <a href="mailto:contacto@ejemplo.com" title="Correo Electrónico">
                    <img src="imagenes/email.svg" alt="Correo">
                </a>
                <a href="tel:+123456789" title="Teléfono">
                    <img src="imagenes/telefono.svg" alt="Teléfono">
                </a>
                <a href="https://wa.me/123456789" title="WhatsApp">
                    <img src="imagenes/whatsapp.svg" alt="WhatsApp">
                </a>
                <a href="https://www.instagram.com/ejemplo" title="Instagram">
                    <img src="imagenes/instagram.svg" alt="Instagram">
                </a>
            </div>
        </div>
    </main>
</body>
</html>
';
?>