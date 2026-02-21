<?php
session_start();
require_once 'config/conexion.php';

$resultado = $conexion->query("SELECT * FROM pisos WHERE disponible = 1 ORDER BY precio ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <span class="logo">Inmobiliaria</span>
    <div>
        <?php if (isset($_SESSION['usuario_id'])): ?>
            Hola, <?= htmlspecialchars($_SESSION['nombres']) ?> |
            <?php if ($_SESSION['tipo_usuario'] === 'administrador'): ?>
                <a href="admin.php">Panel admin</a>
            <?php elseif ($_SESSION['tipo_usuario'] === 'vendedor'): ?>
                <a href="publicar_piso.php">Publicar piso</a>
            <?php elseif ($_SESSION['tipo_usuario'] === 'comprador'): ?>
                <a href="comprador.php">Mis compras</a>
            <?php endif; ?>
            <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar sesión</a>
            <a href="registro.php">Registrarse</a>
        <?php endif; ?>
    </div>
</nav>

<div class="contenedor">
    <h1>Pisos disponibles</h1>

    <?php if ($resultado->num_rows === 0): ?>
        <p>No hay pisos disponibles en este momento.</p>
    <?php else: ?>
    <div class="pisos-grid">
        <?php while ($piso = $resultado->fetch_assoc()): ?>
            <div class="piso-card">
                <img src="imagenes/<?= htmlspecialchars($piso['imagen']) ?>" alt="Foto piso">
                <div class="piso-card-info">
                    <h3><?= htmlspecialchars($piso['calle']) ?>, <?= $piso['numero'] ?> - <?= $piso['piso'] ?>º<?= htmlspecialchars($piso['puerta']) ?></h3>
                    <p>Zona: <?= htmlspecialchars($piso['zona'] ?? '-') ?></p>
                    <p>Metros: <?= $piso['metros'] ?> m²</p>
                    <p>CP: <?= $piso['cp'] ?></p>
                    <div class="piso-precio"><?= number_format($piso['precio'], 0, ',', '.') ?> €</div>
                    <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'comprador'): ?>
                        <a href="comprador.php?codigo_piso=<?= $piso['Codigo_piso'] ?>"
                           class="btn btn-azul"
                           onclick="return confirm('¿Confirmar compra?')">Comprar</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

<footer>
    <p>Inmobiliaria © <?= date('Y') ?></p>
</footer>

</body>
</html>