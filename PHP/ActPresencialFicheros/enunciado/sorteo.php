<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor-sorteo">
        <header class="cabecera">
            <h1>Tienda Online</h1>
            <nav class="navegacion">
                <a href="verificar.php" class="btn btn-secundario">Menú Principal</a>
                <a href="mostrar.php" class="btn btn-secundario">Ver Pedidos</a>
            </nav>
        </header>
        
        <main class="principal">
            <div class="contenedor-ruleta">
                <div class="info-sorteo">
                    <h2>Sorteo del Mes</h2>
                    <p class="descripcion">
                        ¡Un cliente afortunado recibirá su pedido GRATIS!
                        El sorteo se realiza entre todos los pedidos registrados.
                    </p>
                </div>
                
                <div class="ruleta">
                    <div class="controles-sorteo">
                        <form method="post" action="sorteo.php">
                            <button type="submit" name="realizar_sorteo" class="btn btn-primario btn-grande">
                                Realizar Nuevo Sorteo
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="resultado-sorteo">
                    <h3>Resultado del Sorteo</h3>
                    
                    <?php
                    /*
                    TAREA 1: CONTAR PEDIDOS
                    - Leer archivo pedidos.txt
                    - Contar cuántos pedidos hay
                    - Guardar en variable $numPedidos
                    */
                    
                    /*
                    TAREA 2: REALIZAR SORTEO
                    - Si hay pedidos:
                      * Generar número aleatorio entre 1 y $numPedidos (rand())
                      * Leer el archivo hasta encontrar el pedido correspondiente
                      * Obtener nombre del cliente ganador
                    - Si no hay pedidos:
                      * Mostrar mensaje "No hay pedidos para sortear."
                    */
                    
                    /*
                    TAREA 3: MOSTRAR RESULTADO
                    - Mostrar número total de pedidos
                    - Mostrar número aleatorio generado
                    - Mostrar nombre del ganador
                    */
                    
                    $numPedidos = 0;
                    $nombreGanador = '';
                    $mensaje = '';
                    
                    // Aquí implementar la lógica del sorteo
                    // ...
                    
                    if ($numPedidos > 0) {
                        // Mostrar información del sorteo
                        echo "<p><strong>Número de pedidos:</strong> $numPedidos</p>";
                        echo "<p><strong>Número aleatorio generado:</strong> $ganadorNum</p>";
                        echo "<p><strong>El ganador del sorteo es:</strong> $nombreGanador</p>";
                    } else {
                        echo "<p>No hay pedidos para sortear.</p>";
                    }
                    ?>
                    
                    <div class="tarjeta-ganador">
                        <div class="ganador-info">
                            <div class="avatar-ganador">👑</div>
                            <div class="detalles-ganador">
                                <?php if ($numPedidos > 0): ?>
                                <h4><?php echo htmlspecialchars($nombreGanador); ?></h4>
                                <p class="fecha-sorteo">Sorteado: <?php echo date('d/m/Y H:i'); ?></p>
                                <?php else: ?>
                                <h4>No hay ganador</h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="pie">
            <p>El sorteo es automático y completamente aleatorio.</p>
        </footer>
    </div>
</body>
</html>