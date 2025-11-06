<!-- //1.- Muestra los números múltiplos de 5 de un bucle de 0 a 100 
 utilizando while. -->
 <?php
$i = 0; // contador inicial
echo "<br>";

while ($i <= 100) {
    if ($i % 5 == 0) { // si es múltiplo de 5
        echo $i . " - "; // lo mostramos
    }
    $i++; // incrementamos
}
?>

<!-- 2.- Muestra los números del 320 al 160, contando de 20 en 20 utilizando 
 un bucle for. -->
<?php
echo "<br>";

for ($i = 320; $i >= 160; $i -= 20) {
    echo $i . " - ";
}
echo "<br>";

for ($s = 160; $s <= 320; $s += 20) {
    echo $s . " - ";
}
?>


<!-- 3.- Muestra la tabla de multiplicar de un número 
generado de manera aletoria entre 1 y 10. 
El resultado en formato <table></table> -->
<?php
$numero = rand(1, 10); // número aleatorio entre 1 y 10
echo "<h2>Tabla de multiplicar del $numero</h2>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Operación</th><th>Resultado</th></tr>";

for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "<tr>";
    echo "<td>$numero × $i</td>";
    echo "<td>$resultado</td>";
    echo "</tr>";
}

echo "</table>";
?>


<!-- 4.- Realiza un programa que nos diga cuántos dígitos tiene un número 
 aletorio entre (0 y 9999).
  Mostrar el número y la cantidad de digitos. -->

<?php
$numero = rand(0, 9999); // número aleatorio
$digitos = strlen((string)$numero); // cantidad de dígitos

echo "<h2>Número aleatorio y cantidad de dígitos</h2>";

echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";
echo "<tr><th>Número</th><th>Cantidad de dígitos</th></tr>";
echo "<tr><td>$numero</td><td>$digitos</td></tr>";
echo "</table>";
?>


<!-- CON ESTILOS -->
  <?php
$numero = rand(0, 9999);
$digitos = strlen((string)$numero);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Dígitos de un número</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        table { border-collapse: collapse; margin: 0 auto; width: 300px; }
        th, td { border: 1px solid #333; padding: 10px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Ejercicio 4 - Dígitos de un número</h2>
    <table>
        <tr>
            <th>Número</th>
            <th>Cantidad de Dígitos</th>
        </tr>
        <tr>
            <td><?php echo $numero; ?></td>
            <td><?php echo $digitos; ?></td>
        </tr>
    </table>
</body>
</html>


<!-- 5.-Escribe un programa que muestre en tres columnas: 
Numero -  cuadrado -  cubo
De 5 numeros aletorios entre 5 y 20. -->

<?php
echo "<h2>Datos de numeros aleatorios (5 a 20)</h2>";

echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";
echo "<tr><th>Número</th><th>Cuadrado</th><th>Cubo</th></tr>";

for ($i = 1; $i <= 5; $i++) {
    $numero = rand(5, 20);
    $cuadrado = $numero * $numero;
    $cubo = $numero * $numero * $numero;

    echo "<tr>";
    echo "<td>$numero</td>";
    echo "<td>$cuadrado</td>";
    echo "<td>$cubo</td>";
    echo "</tr>";
}

echo "</table>";
?>


<!-- 6.- Un programa que genere 2 tiradas de 3 dados(simulando 2 jugadores). 
Muestre las dos tiradas y me diga cual tiene mayor puntuación(sumando las tiradas) -->

<?php
echo "<h2>Juego de Dados: Jugador 1 vs Jugador 2</h2>";

function tirarDados($jugador) {
    $total = 0;
    echo "<h3>$jugador</h3>";
    echo "<div style='display: flex; gap: 10px; margin-bottom: 10px;'>";

    for ($i = 1; $i <= 3; $i++) {
        $dado = rand(1, 6);
        $total += $dado;
        echo "<img src='dados/$dado.jpg' alt='Dado $dado' width='80' height='80'>";
    }

    echo "</div>";
    echo "<p><strong>Total:</strong> $total</p>";
    return $total;
}

// Tiradas de ambos jugadores
$total1 = tirarDados("Jugador 1");
$total2 = tirarDados("Jugador 2");

// Mostrar resultado final
echo "<hr>";
if ($total1 > $total2) {
    echo "<h3>🏆 Gana el Jugador 1 con $total1 puntos frente a $total2.</h3>";
} elseif ($total2 > $total1) {
    echo "<h3>🏆 Gana el Jugador 2 con $total2 puntos frente a $total1.</h3>";
} else {
    echo "<h3>🤝 ¡Empate! Ambos con $total1 puntos.</h3>";
}
?>
