<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/auth.php';

// Iniciar sesion si no esta iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // traemos datos sin espacio
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($username) || empty($password)) {
        $error = "Por favor, complete todos los campos.";
    } else {
        // validar credenciales
        if (verificarCredenciales($username, $password)) {
            // Login exitoso
            iniciarSesion($username);
            header('Location: ' . BASE_URL . 'dashboard.php');
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    }
    
    // Si hay error, guardar en sesion para mostrar en el formulario
    if (!empty($error)) {
        $_SESSION['error_login'] = $error;
        header('Location: ' . BASE_URL . 'index.php');
        exit();
    }
}
?>