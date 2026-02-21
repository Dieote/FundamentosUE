<?php
session_start();
require_once 'config/conexion.php';

$error = "";
$exito = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = trim($_POST['nombres']);
    $correo = trim($_POST['correo']);
    $clave = md5(trim($_POST['clave']));
    $tipo_usuario = $_POST['tipo_usuario'];  // comprador o vendedor

    // verificar correo ya existe
    $check = $conexion->prepare("SELECT usuario_id FROM usuario WHERE correo = ?");
    $check->bind_param("s", $correo); //type: "s"tring
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Este correo ya está registrado.";
    } else {
        $sql = "INSERT INTO usuario (nombres, correo, clave, tipo_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $nombres, $correo, $clave, $tipo_usuario);
        if ($stmt->execute()) {
            $exito = "Registro exitoso. <a href='login.php'>Inicia sesión</a>";
        } else {
            $error = "Error al registrar. Inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro – Inmobiliaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="logo">Inmobiliaria</span>
    <div>
        <a href="index.php">Ver pisos</a>
        <a href="login.php">Iniciar sesión</a>
    </div>
</nav>

<div class="formulario">
    <h2>Crear cuenta</h2>

    <?php if ($error): ?>
            <div class="mensaje-error"><?= $error ?></div>
        <?php endif; ?>
        <?php if ($exito): ?>
            <div class="mensaje-ok"><?= $exito ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombres" required>
            <label>Correo:</label>
            <input type="email" name="correo" required>
            <label>Contraseña:</label>
            <input type="password" name="clave" required>
            <label>Tipo de usuario:</label>
            <select name="tipo_usuario">
                <option value="comprador">Comprador</option>
                <option value="vendedor">Vendedor</option>
            </select>
            <button type="submit" class="btn btn-azul btn-bloque">Registrarse</button>
        </form>

        <p style="margin-top:14px; font-size:13px; text-align:center;">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a><br>
            <a href="index.php">← Volver</a>
        </p>
    </div>
</body>
</html>