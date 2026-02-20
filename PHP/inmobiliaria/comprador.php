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

        // marcar piso como no disponible
        $upd = $conexion->prepare("UPDATE pisos SET disponible = 0 WHERE Codigo_piso = ?");
        $upd->bind_param("i", $codigo_piso);
        $upd->execute();

        $mensaje = "<p style='color:green'>Piso comprado correctamente por " . number_format($piso['precio'], 2) . " €</p>";
    } else {
        $mensaje = "<p style='color:red'>Este piso no está disponible.</p>";
    }
}

// Mostrar historial de compras del usuario
$historial = $conexion->prepare("
    SELECT p.calle, p.numero, p.piso, p.puerta, p.zona, c.Precio_final, c.fecha_compra
    FROM comprados c
    JOIN pisos p ON c.Codigo_piso = p.Codigo_piso
    WHERE c.usuario_comprador = ?
    ORDER BY c.fecha_compra DESC
");
$historial->bind_param("i", $_SESSION['usuario_id']);
$historial->execute();
$compras = $historial->get_result();
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
    <?php if ($compras->num_rows == 0): ?>
        <p>Aún no has comprado ningún piso.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Dirección</th>
                <th>Zona</th>
                <th>Precio pagado</th>
                <th>Fecha</th>
            </tr>
            <?php while ($c = $compras->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($c['calle']) ?>, <?= $c['numero'] ?> -
                        <?= $c['piso'] ?>º<?= htmlspecialchars($c['puerta']) ?></td>
                    <td><?= htmlspecialchars($c['zona']) ?></td>
                    <td><?= number_format($c['Precio_final'], 2) ?> €</td>
                    <td><?= $c['fecha_compra'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>

</html>