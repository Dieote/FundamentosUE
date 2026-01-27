<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Pedidos - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor-pedido">
        <header class="cabecera">
            <h1>Tienda Online</h1>
            <nav class="navegacion">
                <a href="verificar.php" class="btn btn-secundario">Menú Principal</a>
                <a href="pedido.php" class="btn btn-secundario">Nuevo Pedido</a>
            </nav>
        </header>
        
        <main class="principal">
            <div class="tarjeta-pedido">
                <h2>Listado de Pedidos</h2>
                
                <?php
                /*
                TAREA 1: LEER ARCHIVO pedidos.txt
                - Abrir archivo en modo lectura ('r')
                - Usar fopen(), fgets(), feof(), fclose()
                - Contar número de pedidos
                */
                
                /*
                TAREA 2: MOSTRAR PEDIDOS EN TABLA
                - Crear tabla HTML con columnas:
                  Nombre, Dirección, Producto, Cantidad, Fecha
                - Leer línea por línea del archivo
                - Cada línea tiene formato: nombre|direccion|producto|cantidad|fecha
                - Usar explode() para separar los datos
                - Mostrar cada pedido en una fila de la tabla
                */
                
                /*
                TAREA 3: MANEJAR CASO SIN PEDIDOS
                - Si el archivo no existe o está vacío
                - Mostrar mensaje: "No hay pedidos registrados."
                */
                
                // EJEMPLO DE ESTRUCTURA:
                $numPedidos = 0; // Contador de pedidos
                
                // Abrir archivo y leer pedidos
                // ...
                
                if ($numPedidos > 0) {
                    echo "<table class='tabla-precios'>";
                    echo "<thead><tr><th>Nombre</th><th>Dirección</th><th>Producto</th><th>Cantidad</th><th>Fecha</th></tr></thead>";
                    echo "<tbody>";
                    
                    // Aquí mostrar cada pedido con un bucle while
                    // while (!feof($archivo)) { ... }
                    
                    echo "</tbody></table>";
                    echo "<p><strong>Total de pedidos:</strong> $numPedidos</p>";
                } else {
                    echo "<p>No hay pedidos registrados.</p>";
                }
                ?>
                
                <br>
                <a href="verificar.php" class="btn btn-primario">Volver al menú</a>
            </div>
        </main>
    </div>
</body>
</html>