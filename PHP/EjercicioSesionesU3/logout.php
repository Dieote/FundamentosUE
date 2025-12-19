<?php
// Iniciamos sesión
session_start();

// Eliminamos todas las variables de sesión
session_unset();

// Destruimos la sesión
session_destroy();

// Redirigimos al inicio
header("Location: index.php");
exit;
