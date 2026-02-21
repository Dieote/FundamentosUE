<?php
session_start();
require_once 'config/conexion.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    header("Location: /inmobiliaria/login.php");
    exit();
}

if (isset($_GET['eliminar_usuario'])) {
    $id = (int) $_GET['eliminar_usuario'];
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE usuario_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin.php");
    exit();
}

if (isset($_GET['eliminar_piso'])) {
    $id = (int) $_GET['eliminar_piso'];
    $stmt = $conexion->prepare("DELETE FROM pisos WHERE Codigo_piso = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin.php");
    exit();
}

$usuarios = $conexion->query("SELECT * FROM usuario ORDER BY tipo_usuario");
$pisos = $conexion->query("SELECT p.*, u.nombres AS vendedor FROM pisos p LEFT JOIN usuario u ON p.usuario_id = u.usuario_id");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin – Inmobiliaria</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <span class="logo">Inmobiliaria – Admin</span>
        <div>
            <a href="index.php">Ver web</a>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </nav>

    <div class="contenedor">
        <h1>Panel de administración</h1>

        <h2>Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($u = $usuarios->fetch_assoc()): ?>
                    <tr>
                        <td><?= $u['usuario_id'] ?></td>
                        <td><?= htmlspecialchars($u['nombres']) ?></td>
                        <td><?= htmlspecialchars($u['correo']) ?></td>
                        <td><?= $u['tipo_usuario'] ?></td>
                        <td>
                            <?php if ($u['usuario_id'] != $_SESSION['usuario_id']): ?>
                                <a href="?eliminar_usuario=<?= $u['usuario_id'] ?>" class="btn btn-rojo"
                                    onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                            <?php else: ?>
                                <em style="font-size:12px; color:#888">Tu cuenta</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2 style="margin-top:35px;">Pisos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Zona</th>
                    <th>Metros</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Vendedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($p = $pisos->fetch_assoc()): ?>
                    <tr>
                        <td><?= $p['Codigo_piso'] ?></td>
                        <td><?= htmlspecialchars($p['calle']) ?>, <?= $p['numero'] ?> –
                            <?= $p['piso'] ?>º<?= htmlspecialchars($p['puerta']) ?></td>
                        <td><?= htmlspecialchars($p['zona'] ?? '-') ?></td>
                        <td><?= $p['metros'] ?> m²</td>
                        <td><?= number_format($p['precio'], 0, ',', '.') ?> €</td>
                        <td><?= $p['disponible'] ? 'Disponible' : 'Vendido' ?></td>
                        <td><?= htmlspecialchars($p['vendedor'] ?? '-') ?></td>
                        <td>
                            <a href="?eliminar_piso=<?= $p['Codigo_piso'] ?>" class="btn btn-rojo"
                                onclick="return confirm('¿Eliminar piso?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>Inmobiliaria © <?= date('Y') ?></p>
    </footer>

</body>

</html>