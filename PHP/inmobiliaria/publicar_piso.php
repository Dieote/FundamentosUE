<?php
session_start();
require_once 'config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /inmobiliaria/login.php");
    exit();
}
if ($_SESSION['tipo_usuario'] !== 'vendedor') {
    header("Location: /inmobiliaria/index.php");
    exit();
}

$exito = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombre_archivo = time() . "_" . basename($_FILES['imagen']['name']);
        $destino = "imagenes/" . $nombre_archivo;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $destino)) {
            $imagen = $nombre_archivo;
        }
    }

    if ($imagen == "") {
        $error = "Debes subir una imagen del piso.";
    } else {
        $calle = trim($_POST['calle']);
        $numero = (int) $_POST['numero'];
        $piso_num = (int) $_POST['piso'];
        $puerta = trim($_POST['puerta']);
        $cp = (int) $_POST['cp'];
        $metros = (int) $_POST['metros'];
        $zona = trim($_POST['zona']);
        $precio = (float) $_POST['precio'];
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("siiiisdssi", $calle, $numero, $piso_num, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuario_id);

        if ($stmt->execute()) {
            $exito = "Piso publicado correctamente. <a href='index.php'>Ver en la web</a>";
        } else {
            $error = "Error al guardar: " . $conexion->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Publicar piso – Inmobiliaria</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <span class="logo">Inmobiliaria</span>
        <div>
            <a href="index.php">Ver pisos</a>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </nav>

    <div class="formulario" style="max-width:500px;">
        <h2>Publicar nuevo piso</h2>

        <?php if ($error): ?>
            <div class="mensaje-error"><?= $error ?></div>
        <?php endif; ?>
        <?php if ($exito): ?>
            <div class="mensaje-ok"><?= $exito ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <label>Calle:</label>
            <input type="text" name="calle" required>
            <label>Número:</label>
            <input type="number" name="numero" required>
            <label>Piso:</label>
            <input type="number" name="piso" required>
            <label>Puerta:</label>
            <input type="text" name="puerta" required>
            <label>Código Postal:</label>
            <input type="number" name="cp" required>
            <label>Metros m²:</label>
            <input type="number" name="metros" required>
            <label>Zona:</label>
            <input type="text" name="zona">
            <label>Precio (€):</label>
            <input type="number" step="0.01" name="precio" required>
            <label>Imagen del piso:</label>
            <input type="file" name="imagen" accept="image/*" required>
            <br>
            <button type="submit" class="btn btn-azul btn-bloque">Publicar piso</button>
        </form>

        <p style="margin-top:14px; font-size:13px; text-align:center;">
            <a href="index.php">← Volver</a>
        </p>
    </div>

    <footer>
        <p>Inmobiliaria © <?= date('Y') ?></p>
    </footer>

</body>

</html>