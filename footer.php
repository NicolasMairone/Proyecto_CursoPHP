<?php
echo '
<footer class="footer">
    <style>
        .footer {
            background-color: #00703c;
            color: white;
            padding: 7px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .footer-text {
            font-size: 1rem;
            margin-left: 20px;
            text-align: left;
            font-weight: bold;
        }

        .footer-links {
            font-size: 1rem;
            margin-right: 20px;
            text-align: right;
        }

        .footer-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #00bcd4;
        }
    </style>
    <div class="footer-text">
        <p>Hecho por Nicolas Mairone</p>
        <p>&copy; 2025 TuTaxiOnline. Licenciado bajo la Licencia MIT.</p>
    </div>
    <div class="footer-links">
        <a href="https://github.com/NicolasMairone/Proyecto_CursoPHP" target="_blank" class="footer-link">GitHub</a>
        |
        <a href="mailto:mairone.nicolas@gmail.com" class="footer-link">Contacto</a>
    </div>
</footer>
';
?>