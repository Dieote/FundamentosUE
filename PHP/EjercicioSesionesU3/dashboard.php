<?php
    session_start();
    // Verificar inicio de sesion
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true){
        //sino redirige
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
    <h1>Dashboard</h1>
    <p>Bienvenido al área de usuario, <strong><?php echo $_SESSION['usuario']; ?></strong>!</p>
    <p>Solo los usuarios pueden ver este contenido.</p>

    <div>
        <img src="img/img1.png" alt="fotoDash">
    </div>

    <a href="index.php">Volver al inicio</a>
    <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>