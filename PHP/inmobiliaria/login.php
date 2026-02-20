<?php
session_start();
require_once 'config/conexion.php';

?>

<!DOCTYPE html>
<html>
<head><title>Login – Inmobiliaria</title></head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="clave" required></label><br>
        <button type="submit">Entrar</button>
    </form>
    <a href="registro.php">Regístrate aqui</a>
</body>
</html>