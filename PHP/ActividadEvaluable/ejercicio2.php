<?php
function tirarDados($cantidad){
    $dados = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $dados[] = rand(1, 6);
    }
    return $dados;
}

function mostrarDados($dados){
    echo "<div style='display:flex; gap:10px;'>";
    foreach ($dados as $dado) {
        echo "<img src='dados/$dado.jpg' width='60' height='60'>";
    }
    echo "</div>";
}

function sumarDados($dados){
    return array_sum($dados);
}

function jugarRonda($ronda){
    echo "<h2>Ronda $ronda</h2>";

    echo "<h3>Jugador 1:</h3>";
    $jugador1 = tirarDados(5);
    mostrarDados($jugador1);
    $total1 = sumarDados($jugador1);
    echo "<p>Total: $total1</p>";

    echo "<h3>Jugador 2:</h3>";
    $jugador2 = tirarDados(5);
    mostrarDados($jugador2);
    $total2 = sumarDados($jugador2);
    echo "<p>Total: $total2</p>";

    if ($total1 > $total2) {
        echo "<h3>Jugador 1 gana la ronda $ronda!</h3>";
        return 1;
    } elseif ($total2 > $total1) {
        echo "<h3>Jugador 2 gana la ronda $ronda!</h3>";
        return 2;
    } else {
        echo "<h3>La ronda $ronda es un empate!</h3>";
        return 0;
    }
}

$rondas = 3; // cantidad rondas
$ganadas1 = 0;
$ganadas2 = 0;

for ($i = 1; $i <= $rondas; $i++) {
    $resultado = jugarRonda($i);

    if ($resultado == 1) $ganadas1++;
    elseif ($resultado == 2) $ganadas2++;

    echo "<hr>";
}

// Resultado final
echo "<h2>Resultado Final</h2>";
echo "<p>Jugador 1 ganó $ganadas1 ronda(s)</p>";
echo "<p>Jugador 2 ganó $ganadas2 ronda(s)</p>";

if ($ganadas1 > $ganadas2) {
    echo "<h3>🏆 El ganador final es el Jugador 1</h3>";
} elseif ($ganadas2 > $ganadas1) {
    echo "<h3>🏆 El ganador final es el Jugador 2</h3>";
} else {
    echo "<h3>🤝 El juego termina en empate</h3>";
}
?>