<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones</title>
</head>
<body>

<h2>Calculadora</h2>

<!-- envía los datos a datosOperaciones.php 
usando el POST.-->
<form action="datosOperaciones.php" method="post">

    Introduzca el primer número: 
    <input type="number" name="num1" required><br><br>
    Introduzca el segundo número: 
    <input type="number" name="num2" required><br><br>

    <strong>Seleccione la operación:</strong><br>
    <input type="radio" name="operacion" value="suma" required> Suma<br>
    <input type="radio" name="operacion" value="resta"> Resta<br>
    <input type="radio" name="operacion" value="producto"> Producto<br>
    <input type="radio" name="operacion" value="cociente"> Cociente<br><br>

    <input type="submit" value="Enviar datos">

</form>

</body>
</html>