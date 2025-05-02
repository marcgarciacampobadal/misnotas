<?php
$host = 'localhost'; // dirección del servidor MySQL
$usuario = 'root'; // usuario de MySQL (por defecto es 'root')
$clave = ''; // contraseña de MySQL (por defecto está vacía en XAMPP)
$db = 'notas'; // nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $clave, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
