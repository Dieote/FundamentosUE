<?php
define('BASE_URL', '/inmobiliaria/');

// datos para conexión
define('BD_HOST', 'localhost');
define('BD_USER', 'root');
define('BD_PASS', '');          // En XAMPP por defecto está vacía
define('BD_NAME', 'inmobiliaria');

// conexión con mysqli
$conexion = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);

//si hay error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>