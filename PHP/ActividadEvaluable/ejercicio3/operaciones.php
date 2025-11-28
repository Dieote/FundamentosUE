<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones</title>

    <style>
        body {
            text-align: center;
            font-size: 32px;
        }
        .radios{
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .nums{
            font-size: 34px;
            width: 250px;
            text-align: center;
        }
    
    </style>
</head>
<body>

<h2>Calculadora</h2>

<!-- envía los datos a datosOperaciones.php 
usando el POST.-->
<form action="datosOperaciones.php" method="post">

    Introduzca el primer número: 
    <input class="nums" type="number" name="num1" required><br><br>
    Introduzca el segundo número: 
    <input class="nums" type="number" name="num2" required><br><br>

    <strong>Seleccione la operación:</strong><br>
    <div class="radios">
        <label><input type="radio" name="operacion" value="suma" required> Suma</label><br>
        <label><input type="radio" name="operacion" value="resta"> Resta</label><br>
        <label><input type="radio" name="operacion" value="producto"> Producto</label><br>
        <label><input type="radio" name="operacion" value="cociente"> Cociente</label><br><br>
    </div>

    <input type="submit" value="Enviar datos">

</form>

</body>
</html>