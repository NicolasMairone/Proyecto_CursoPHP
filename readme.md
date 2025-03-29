# Proyecto Curso PHP - Sistema de Login y Gestión de Taxis

Este proyecto es un sistema básico de login y gestión de taxis desarrollado en PHP con conexión a una base de datos MySQL.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu computadora:

1. **PHP** (versión 7.4 o superior)
2. **MySQL** o **MariaDB**
3. **Servidor web** como Apache (puedes usar XAMPP, LAMP o el servidor integrado de PHP).
4. **Git** para clonar el repositorio.

## Pasos para ejecutar el proyecto

### 1. Clonar el repositorio

Abre una terminal y ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
```
Reemplaza https://github.com/tu-usuario/tu-repositorio.git con la URL de tu repositorio.

### 2. Configurar la base de datos
1. Accede a tu servidor MySQL desde la terminal o un cliente como phpMyAdmin.
2. Crea la base de datos y las tablas necesarias ejecutando el siguiente comando SQL:

```bash
-- Crear la base de datos
CREATE DATABASE bdd_cooperativa_taxis;

-- Usar la base de datos
USE bdd_cooperativa_taxis;

-- Crear la tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_usu VARCHAR(255) NOT NULL,
    ema_usu VARCHAR(255) NOT NULL UNIQUE,
    pas_usu VARCHAR(255) NOT NULL
);

-- Insertar registros en la tabla usuarios
INSERT INTO usuarios (nom_usu, ema_usu, pas_usu) 
VALUES 
('usuario1', 'usuario1@example.com', 'password1'),
('usuario2', 'usuario2@example.com', 'password2'),
('usuario3', 'usuario3@example.com', 'password3');
```
### 3. Configurar el entorno del servidor
#### Opcion 1: Usar Apache (recomendado)
1. Copia los archivos del proyecto al directorio raíz de tu servidor web
2. Asegurate de que el modulo PHP este habilitido
3. Accede al proyecto desde tu navegador en ´http://localhost´
#### Opcion 2: Usar el servidor integrado de PHP
1. Navega al directorio del proyecto clonado: 
```bash 
cd tu-repositorio
```
2. Inicia el servidor integrado de PHP: ´php -S localhost:8000´

3. Abre tu navegador y accede a ´http://localhost:8000´

### 4. Probar el sistema de login
1. Abre el archivo ´index.html´ en tu navegador desde el servidor
2. Ingresa las credenciales de uno de los usuarios registrados en la base de datos:
- **Usuario:** ´usuario1´
- **Email:** ´usuario1@example.com´
- **Contraseña:** ´password1´
3. Haz clic en "Ingresar". Si las credenciales son correctas, seras redirigiod a la pagina principal

## Notas adicionales
- Si necesitas registrar nuevos usuarios puede hacerlo directamente en la base de datos o implementar un formulario de registro
- Si tiene problemas con la conexion a la base de datos, verifica que las credenciales en el archivo ´conexion.php´ sean correctas:
```bash 
<?php
$conexion = mysqli_connect("localhost", "root", "", "bdd_cooperativa_taxis");
```