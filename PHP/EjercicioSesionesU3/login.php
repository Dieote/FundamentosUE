<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ya ha iniciado sesión
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//se guardan los datos del form
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // validar las credenciales del usuario
    if($usuario  === 'admin' && $password === '1234'){
        // Credenciales válidas
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Credenciales inválidas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form method="POST" action="#">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <a href="index.php">Volver al inicio</a>
</body>
</html>