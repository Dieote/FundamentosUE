<?php
require_once 'config/db.php';
require_once 'controllers/auth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (estaLogueado()) {
    header('Location: ' . BASE_URL . 'dashboard.php');
    exit();
}

//mensaje de error si hsy
$error = $_SESSION['error_login'] ?? '';
unset($_SESSION['error_login']);

//mensaje de cerrasesion si hsy
$success = $_SESSION['success_logout'] ?? '';
unset($_SESSION['success_logout']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Login - Eventos Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">
                <!-- Card Login -->
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <i class="bi bi-calendar-event fs-1"></i>
                        <h3 class="fw-bold mb-0 mt-2">Eventos Tech</h3>
                        <p class="mb-0 small">Sistema de Gestión de Eventos</p>
                    </div>

                    <div class="card-body p-4">
                        <!-- mensajes de error -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Mensajes de exito (salida -->
                        <?php if (!empty($success)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <?php echo htmlspecialchars($success); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <h5 class="mb-3">Iniciar Sesión</h5>

                        <!-- Form Login -->
                        <form method="POST" action="controllers/login_process.php" id="loginForm">

                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    <i class="bi bi-person-fill"></i> Usuario
                                </label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Ingrese su usuario" required autocomplete="username">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock-fill"></i> Contraseña
                                </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Ingrese su contraseña" required autocomplete="current-password">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                                </button>
                            </div>

                        </form>

                    </div>

                    <div class="card-footer bg-light text-center py-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i>
                            <p>Usuarios de prueba:</p>
                            <p>admin:admin123 - pepe:12345</p>
                            <p>juan:54321 - maria:000111</p>

                        </small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>