<?php
session_start();
require_once '../config/conexion.php';

// solo admin
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE usuario_id = ?");
    $stmt->bind_param("i", $id); //type: "i"nteger
    $stmt->execute();
    header("Location: usuarios.php");
    exit();
}

$usuarios = $conexion->query("SELECT * FROM usuario");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestión Usuarios</title>
</head>

<body>
    <h2>Lista de Usuarios</h2>
    <a href="index.php">← Volver al panel</a>
    <a href="crear_usuario.php">+ Nuevo usuario</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php while ($user = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?= $user['usuario_id'] ?></td>
                <td><?= htmlspecialchars($user['nombres']) ?></td>
                <td><?= htmlspecialchars($user['correo']) ?></td>
                <td><?= $user['tipo_usuario'] ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $user['usuario_id'] ?>">Editar</a> |
                    <a href="?eliminar=<?= $user['usuario_id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>