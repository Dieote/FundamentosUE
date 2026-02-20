<?php
session_start();
require_once 'config/conexion.php';

$resultado = $conexion->query("SELECT * FROM pisos WHERE disponible = 1 ORDER BY precio ASC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pisos disponibles – Inmobiliaria</title>
</head>

<body>
    <h1>Pisos disponibles</h1>

    <?php if (isset($_SESSION['usuario_id'])): ?>
        Hola, <strong><?= htmlspecialchars($_SESSION['nombres']) ?></strong>
        (<?= $_SESSION['tipo_usuario'] ?>) |
        <?php if ($_SESSION['tipo_usuario'] === 'administrador'): ?>
            <a href="admin.php">Panel Admin</a> |
        <?php elseif ($_SESSION['tipo_usuario'] === 'vendedor'): ?>
            <a href="publicar_piso.php">Publicar piso</a> |
        <?php elseif ($_SESSION['tipo_usuario'] === 'comprador'): ?>
            <a href="comprador.php">Mis compras</a> |
        <?php endif; ?>
        <a href="logout.php">Cerrar sesión</a>
    <?php else: ?>
        <a href="login.php">Login</a> | <a href="registro.php">Registro</a>
    <?php endif; ?>

    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;">
        <?php while ($piso = $resultado->fetch_assoc()): ?>
            <div style="border:1px solid #ccc; padding:15px; width:250px;">
                <img src="imagenes/<?= htmlspecialchars($piso['imagen']) ?>" width="230" height="150"
                    style="object-fit:cover"><br>
                <strong><?= htmlspecialchars($piso['calle']) ?>, <?= $piso['numero'] ?> –
                    <?= $piso['piso'] ?>º<?= htmlspecialchars($piso['puerta']) ?></strong><br>
                Zona: <?= htmlspecialchars($piso['zona']) ?><br>
                Metros: <?= $piso['metros'] ?> m²<br>
                <strong>Precio: <?= number_format($piso['precio'], 2) ?> €</strong><br>
                <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'comprador'): ?>
                    <a href="comprador.php?codigo_piso=<?= $piso['Codigo_piso'] ?>"
                        onclick="return confirm('¿Confirmar compra por <?= number_format($piso['precio'], 2) ?> €?')">
                        Comprar
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>