<?php
session_start();
require_once 'config/conexion.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $clave = md5(trim($_POST['clave']));  // Mismo hash que al guardar

    $sql = "SELECT * FROM usuario WHERE correo = ? AND clave = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $correo, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        // Guardar datos en sesión
        $_SESSION['usuario_id'] = $usuario['usuario_id'];
        $_SESSION['nombres'] = $usuario['nombres'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        // redirigir según tipo
        if ($usuario['tipo_usuario'] == 'administrador') {
            header("Location: /inmobiliaria/index.php");
        } else {
            header("Location: /inmobiliaria/index.php");
        }
        exit();
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login – Inmobiliaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="logo">Inmobiliaria</span>
    <div>
        <a href="index.php">Ver pisos</a>
        <a href="registro.php">Registrarse</a>
    </div>
</nav>

<div class="formulario">
    <h2>Iniciar sesión</h2>

    <?php if ($error): ?>
        <div class="mensaje-error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Correo:</label>
        <input type="email" name="correo" required>

        <label>Contraseña:</label>
        <input type="password" name="clave" required>

        <button type="submit" class="btn btn-azul btn-bloque">Entrar</button>
    </form>

    <p style="margin-top:14px; font-size:13px; text-align:center;">
        ¿No tienes cuenta? <a href="registro.php">Regístrate</a><br>
        <a href="index.php">← Volver</a>
    </p>
    <h5>vendedor@test.com - vendedor123 </h5>
    <h5>elena@gmail.com - 12345 </h5>
    <h5>admin@inmobiliaria.com - admin123</h5>
</div>

</body>
</html>