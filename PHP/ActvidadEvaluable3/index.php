<?php
require_once 'config/db.php';

echo "<h1>Test de Conexión</h1>";

try {
    $pdo = getConnection();

    // verifica archivo de usuarios
    if (file_exists('data/usuarios.txt')) {
        echo "<pre>";
        echo htmlspecialchars(file_get_contents('data/usuarios.txt'));
        echo "</pre>";
    } else {
        echo "<p> Archivo usuarios.txt no encontrado!</p>";
    }

} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>