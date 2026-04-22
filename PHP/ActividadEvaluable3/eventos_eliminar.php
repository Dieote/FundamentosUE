<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

requerirLogin();

$usuario = getUsuarioActual();

// Solo admin puede eliminar
if ($usuario !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$id = $_GET['id'] ?? 0;

if ($id) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("DELETE FROM eventos WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['mensaje'] = 'Evento eliminado correctamente.';
    $_SESSION['tipo_mensaje'] = 'danger';
}

header('Location: dashboard.php');
exit();
?>
