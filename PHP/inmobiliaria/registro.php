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
<html>

<head>
    <title>Registro – Inmobiliaria</title>
</head>

<body>
    <h2>Crear Cuenta</h2>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombres" required></label><br>
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="clave" required></label><br>
        <label>Tipo de usuario:
            <select name="tipo_usuario">
                <option value="comprador">Comprador</option>
                <option value="vendedor">Vendedor</option>
            </select>
        </label><br>
        <button type="submit">Registrarse</button>
        <a href="../index.php">Volver</a>
    </form>
</body>

</html>