<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <h2>Página Principal</h2>

<?php
//validar inicio sesion
if(isset($_SESSION['logeado']) && $_SESSION['logeado'] === true) {
    echo "<p>Bienvenido, <strong>" .($_SESSION['usuario']) . "</strong>!</p>";
    echo '<a href="dashboard.php">Ir al Dashboard</a><br>';
    echo '<a href="logout.php">Cerrar Sesión</a>';
} else { //si no hay sesion
    echo '<p>No has iniciado sesión.</p>';
    echo '<a href="login.php">Iniciar Sesión</a>';
}
?>

</body>
</html>