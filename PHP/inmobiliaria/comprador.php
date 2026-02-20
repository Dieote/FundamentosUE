<?php
session_start();
require_once 'config/conexion.php';

// Solo para compradores logueados
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /inmobiliaria/login.php");
    exit();
}
if ($_SESSION['tipo_usuario'] !== 'comprador') {
    header("Location: /inmobiliaria/index.php");
    exit();
}

$mensaje = "";

if (isset($_GET['codigo_piso'])) {
    $codigo_piso = (int) $_GET['codigo_piso'];
    $usuario_comprador = $_SESSION['usuario_id'];

    // obtener precio del piso
    $stmt = $conexion->prepare("SELECT precio, disponible FROM pisos WHERE Codigo_piso = ?");
    $stmt->bind_param("i", $codigo_piso);
    $stmt->execute();
    $piso = $stmt->get_result()->fetch_assoc();

    if ($piso && $piso['disponible'] == 1) {
        // Registrar compra
        $ins = $conexion->prepare("INSERT INTO comprados (usuario_comprador, Codigo_piso, Precio_final) VALUES (?,?,?)");
        $ins->bind_param("iid", $usuario_comprador, $codigo_piso, $piso['precio']);
        $ins->execute();

        $mensaje = "<p style='color:green'>Piso comprado correctamente por " . number_format($piso['precio'], 2) . " €</p>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Panel Comprador</title>
</head>

<body>
    <h2>Hola, <?= htmlspecialchars($_SESSION['nombres']) ?>!!!</h2>
    <a href="index.php">← Ver pisos disponibles</a> |
    <a href="logout.php">Cerrar sesión</a>

    <?= $mensaje ?>

    <h3>Mis compras</h3>
</body>

</html>