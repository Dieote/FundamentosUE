<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

cerrarSesion();

// mostrar mensaje
session_start();
$_SESSION['success_logout'] = "Sesión cerrada exitosamente.";

//dirigir al login
header('Location: ' . BASE_URL . 'index.php');
exit();
?>