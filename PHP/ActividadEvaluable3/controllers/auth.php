<?php
/**
 * Verifica credenciales del user del archivo usuarios.txt
 * @param string $username
 * @param string $password
 * @return bool
 */
function verificarCredenciales($username, $password)
{
    $archivo = __DIR__ . '/../data/usuarios.txt';

    if (!file_exists($archivo)) {
        error_log("Archivo usuarios.txt no encontrado");
        return false;
    }

    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {
        // espera usuario:contraseña
        $datos = explode(':', trim($linea));

        if (count($datos) === 2) {
            $user = trim($datos[0]);
            $pass = trim($datos[1]);
            // comparacion 
            if ($user === $username && $pass === $password) {
                return true;
            }
        }
    }

    return false;
}

/**
 * @param string $username
 */
function iniciarSesion($username)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //Inicia sesion para un usuario
    $_SESSION['usuario'] = $username;
    $_SESSION['logged_in'] = true;
    $_SESSION['login_time'] = time();
}

/**
 * @return bool
 */
function estaLogueado()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

/**
 * @return string|null
 */
function getUsuarioActual()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // traemos el nombre del usuario logueado

    return $_SESSION['usuario'] ?? null;
}

function cerrarSesion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = array();
    /*
    // Destruir la cookie de sesion
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-3600, '/');
    }
   */
    session_destroy();
}

// dirige a login si no esta autenticado
function requerirLogin()
{
    if (!estaLogueado()) {
        header('Location: ' . BASE_URL . 'index.php');
        exit();
    }
}

function esAdmin()
{
    return getUsuarioActual() === 'admin';
}

function requerirAdmin()
{
    requerirLogin();
    if (!esAdmin()) {
        header('Location: ' . BASE_URL . 'dashboard.php');
        exit();
    }
}
?>