<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

requerirLogin();

$usuario = getUsuarioActual();

// Solo admin puede acceder
if ($usuario !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$pdo = getConnection();
$id = $_GET['id'] ?? 0;

// Buscar el evento
$stmt = $pdo->prepare("SELECT * FROM eventos WHERE id = ?");
$stmt->execute([$id]);
$evento = $stmt->fetch();

if (!$evento) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo      = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $fecha       = trim($_POST['fecha']);
    $lugar       = trim($_POST['lugar']);

    if ($titulo === '' || $fecha === '') {
        $error = 'El título y la fecha son obligatorios.';
    } else {
        $stmt = $pdo->prepare("UPDATE eventos SET titulo=?, descripcion=?, fecha=?, lugar=? WHERE id=?");
        $stmt->execute([$titulo, $descripcion, $fecha, $lugar, $id]);

        $_SESSION['mensaje'] = 'Evento actualizado correctamente.';
        $_SESSION['tipo_mensaje'] = 'success';
        header('Location: dashboard.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Editar Evento - Eventos Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="bi bi-laptop"></i>
                <span class="texto-movible">Eventos Tech</span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <h5 class="mb-0"><i class="bi bi-pencil"></i> Editar Evento</h5>
                    </div>
                    <div class="card-body">

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Título *</label>
                                <input type="text" name="titulo" class="form-control"
                                    value="<?php echo htmlspecialchars($_POST['titulo'] ?? $evento['titulo']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="3"><?php echo htmlspecialchars($_POST['descripcion'] ?? $evento['descripcion']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha *</label>
                                <input type="date" name="fecha" class="form-control"
                                    value="<?php echo htmlspecialchars($_POST['fecha'] ?? $evento['fecha']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lugar</label>
                                <input type="text" name="lugar" class="form-control"
                                    value="<?php echo htmlspecialchars($_POST['lugar'] ?? $evento['lugar']); ?>">
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-check-lg"></i> Actualizar
                                </button>
                                <a href="dashboard.php" class="btn btn-secondary">
                                    <i class="bi bi-x-lg"></i> Cancelar
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
