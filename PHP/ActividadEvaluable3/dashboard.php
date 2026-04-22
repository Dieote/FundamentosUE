<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

requerirLogin();

$usuario = getUsuarioActual();
$esAdmin = ($usuario === 'admin');

// Traer eventos de la base de datos
$pdo = getConnection();
$stmt = $pdo->query("SELECT * FROM eventos ORDER BY fecha ASC");
$eventos = $stmt->fetchAll();

// Mensajes flash
$mensaje = $_SESSION['mensaje'] ?? '';
$tipoMensaje = $_SESSION['tipo_mensaje'] ?? '';
unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Dashboard - Eventos Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- barra -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="bi bi-laptop"></i>
                <span class="texto-movible">Eventos Tech</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">
                            <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($usuario); ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <!-- Mensaje flash -->
        <?php if ($mensaje): ?>
            <div class="alert alert-<?php echo $tipoMensaje; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($mensaje); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Titulo y boton agregar (solo admin) -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4><i class="bi bi-calendar-event"></i> Eventos</h4>
            <?php if ($esAdmin): ?>
                <a href="eventos_nuevo.php" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Agregar Evento
                </a>
            <?php endif; ?>
        </div>

        <!-- Tabla de eventos -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Lugar</th>
                            <?php if ($esAdmin): ?>
                                <th>Acciones</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($eventos) === 0): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay eventos registrados.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($eventos as $e): ?>
                                <tr>
                                    <td><?php echo $e['id']; ?></td>
                                    <td><?php echo htmlspecialchars($e['titulo']); ?></td>
                                    <td><?php echo htmlspecialchars($e['descripcion']); ?></td>
                                    <td><?php echo $e['fecha']; ?></td>
                                    <td><?php echo htmlspecialchars($e['lugar']); ?></td>
                                    <?php if ($esAdmin): ?>
                                        <td>
                                            <a href="eventos_editar.php?id=<?php echo $e['id']; ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="eventos_eliminar.php?id=<?php echo $e['id']; ?>" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Eliminar este evento?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
