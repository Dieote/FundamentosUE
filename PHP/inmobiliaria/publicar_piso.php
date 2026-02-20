<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'vendedor') {
    header("Location: ../login.php");
    exit();
}

$exito = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Subir imagen
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
        $piso = (int) $_POST['piso'];
        $puerta = trim($_POST['puerta']);
        $cp = (int) $_POST['cp'];
        $metros = (int) $_POST['metros'];
        $zona = trim($_POST['zona']);
        $precio = (float) $_POST['precio'];
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("siiisisdsi", $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuario_id);
    //type: "i"nteger, "s"tring, "d"ouble
        if ($stmt->execute()) {
            $exito = "Piso publicado correctamente.";
        } else {
            $error = "Error al guardar el piso.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Publicar Piso</title>
</head>

<body>
    <h2>Publicar nuevo piso</h2>

    <form method="POST" enctype="multipart/form-data">
        Calle: <input type="text" name="calle" required><br>
        Número: <input type="number" name="numero" required><br>
        Piso: <input type="number" name="piso" required><br>
        Puerta: <input type="text" name="puerta" required><br>
        CP: <input type="number" name="cp" required><br>
        Metros: <input type="number" name="metros" required><br>
        Zona: <input type="text" name="zona"><br>
        Precio (€): <input type="number" step="0.01" name="precio" required><br>
        Imagen: <input type="file" name="imagen" accept="image/*" required><br>
        <button type="submit">Publicar piso</button>
    </form>
</body>

</html>