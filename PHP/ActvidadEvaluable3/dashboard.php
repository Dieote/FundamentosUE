<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

requerirLogin();

$usuario = getUsuarioActual();

$pdo = getConnection();
$stmt = $pdo->query("SELECT id, titulo, descripcion, fecha, lugar FROM eventos ORDER BY fecha ASC");
$eventos = $stmt->fetchAll();
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="bi bi-calendar-event"></i> Eventos Programados</h4>
        </div>

        <?php if (empty($eventos)): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No hay eventos registrados.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="bi bi-tag"></i> Nombre del Evento</th>
                            <th><i class="bi bi-text-paragraph"></i> Descripción</th>
                            <th><i class="bi bi-calendar-date"></i> Fecha</th>
                            <th><i class="bi bi-geo-alt"></i> Lugar / Sala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventos as $evento): ?>
                            <tr>
                                <td class="fw-semibold"><?php echo htmlspecialchars($evento['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($evento['descripcion']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($evento['fecha'])); ?></td>
                                <td><span class="badge bg-secondary"><?php echo htmlspecialchars($evento['lugar']); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>