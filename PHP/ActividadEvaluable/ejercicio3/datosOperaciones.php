<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
     <style>
        body {
            text-align: center;
            font-size: 32px;
        }
        input[type="submit"], button {
            font-size: 22px;  
            padding: 10px 25px;
}
    </style>
</head>
<body>

<?php
// recibie los datos del formulario con POST
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operacion = $_POST['operacion'];

$resultado = "";

/*la operación elegida por el user*/
switch($operacion) {
    case "suma":
        $resultado = $num1 + $num2;
        $textoOp = "la suma";
        break;

    case "resta":
        $resultado = $num1 - $num2;
        $textoOp = "la resta";
        break;

    case "producto":
        $resultado = $num1 * $num2;
        $textoOp = "el producto";
        break;

    case "cociente":
        if ($num2 == 0) {
            echo "<p><strong>Error:</strong> No se puede dividir entre 0.</p>";
            exit(); // final del switch
        }
        $resultado = $num1 / $num2;
        $textoOp = "el cociente";
        break;
}

echo "<h2>Resultado:</h2>";
echo "<p>El resultado de realizar <strong>$textoOp</strong> de los números 
<strong>$num1</strong> y <strong>$num2</strong> es <strong>$resultado</strong>.</p>";

?>

<br><br>

<a href="operaciones.php">
    <button>Volver a la calculadora</button>
</a>

</body>
</html>