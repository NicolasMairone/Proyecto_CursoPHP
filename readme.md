# Proyecto Curso PHP - Sistema de Login y Gestión de Taxis

Este proyecto es un sistema básico de login y gestión de taxis desarrollado en PHP con conexión a una base de datos MySQL.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu computadora:

1. **PHP** (versión 7.4 o superior).
2. **MySQL** o **MariaDB**.
3. **Servidor web** como Apache (puedes usar XAMPP, LAMP o el servidor integrado de PHP).
4. **Git** para clonar el repositorio.

## Pasos para ejecutar el proyecto

### 1. Clonar el repositorio

Abre una terminal y ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
```

Reemplaza `https://github.com/tu-usuario/tu-repositorio.git` con la URL de tu repositorio.

### 2. Configurar la base de datos

1. Accede a tu servidor MySQL desde la terminal o un cliente como phpMyAdmin.
2. Importa la base de datos ejecutando el archivo [`datos.sql`](database/datos.sql) con el siguiente comando:

```bash
mysql -u root -p bdd_cooperativa_taxis < database/datos.sql
```

### 3. Configurar el entorno del servidor

#### Opción 1: Usar Apache (recomendado)
1. Copia los archivos del proyecto al directorio raíz de tu servidor web (por ejemplo, `/opt/lampp/htdocs` en XAMPP o LAMP).
2. Asegúrate de que el módulo PHP esté habilitado.
3. Accede al proyecto desde tu navegador en `http://localhost/Proyecto_CursoPHP`.

#### Opción 2: Usar el servidor integrado de PHP
1. Navega al directorio del proyecto clonado:
   ```bash
   cd tu-repositorio
   ```
2. Inicia el servidor integrado de PHP:
   ```bash
   php -S localhost:8000
   ```
3. Abre tu navegador y accede a `http://localhost:8000`.

### 4. Probar el sistema de login

1. Abre el archivo `index.html` en tu navegador desde el servidor.
2. Ingresa las credenciales de uno de los usuarios registrados en la base de datos:
   - **Usuario:** `usuario1`
   - **Email:** `usuario1@example.com`
   - **Contraseña:** `password1`
3. Haz clic en "Ingresar". Si las credenciales son correctas, serás redirigido a la página principal.

## Notas adicionales

- Si necesitas registrar nuevos usuarios, puedes hacerlo directamente en la base de datos o implementar un formulario de registro.
- Si tienes problemas con la conexión a la base de datos, verifica que las credenciales en el archivo `conexion.php` sean correctas:
   ```php
   <?php
   $conexion = mysqli_connect("localhost", "root", "", "bdd_cooperativa_taxis");
   ```
- Asegúrate de que los permisos de las carpetas y archivos sean correctos para que el servidor web pueda acceder a ellos.


## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
