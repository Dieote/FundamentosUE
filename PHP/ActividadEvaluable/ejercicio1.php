<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rectángulo</title>

    <style>
        body {
            text-align: center;
            font-size: 22px;
        }
    </style>
</head>
<body>
<?php
$alto = rand(5, 15);
$ancho = rand(5, 15);

echo "<h2>Rectángulo de Asteriscos</h2>";
echo "<p><strong>Alto:</strong> $alto</p>";
echo "<p><strong>Ancho:</strong> $ancho</p>";

for ($i = 1; $i <= $alto; $i++) {
    for ($j = 1; $j <= $ancho; $j++) {
        echo "* ";
    }
    echo "<br>";
}
?>

</body>
</html>
