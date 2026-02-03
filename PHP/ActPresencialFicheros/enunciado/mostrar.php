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
                $numPedidos = 0;

                // Verificar si existe el archivo
                if (file_exists("pedidos.txt")) {
                    $archivo = fopen("pedidos.txt", "r");

                    if ($archivo) {

                        /*
                        TAREA 2: MOSTRAR PEDIDOS EN TABLA
                        - Crear tabla HTML con columnas:
                          Nombre, Dirección, Producto, Cantidad, Fecha
                        - Leer línea por línea del archivo
                        - Cada línea tiene formato: nombre|direccion|producto|cantidad|fecha
                        - Usar explode() para separar los datos
                        - Mostrar cada pedido en una fila de la tabla
                        */
                        // Iniciar la tabla HTML
                        echo "<table class='tabla-precios'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Nº</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Dirección</th>";
                        echo "<th>Producto</th>";
                        echo "<th>Cantidad</th>";
                        echo "<th>Fecha</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        // Leer línea por línea
                        while (!feof($archivo)) {
                            $linea = fgets($archivo);

                            // Ignorar líneas vacías
                            if (!empty(trim($linea))) {
                                // Incrementar contador de pedidos
                                $numPedidos++;

                                // Separar los datos usando explode()
                                // Formato: nombre|direccion|producto|cantidad|fecha
                                $datos = explode("|", trim($linea));

                                // Verificar que tengamos los 5 campos
                                if (count($datos) == 5) {
                                    $nombre = $datos[0];
                                    $direccion = $datos[1];
                                    $producto = $datos[2];
                                    $cantidad = $datos[3];
                                    $fecha = $datos[4];

                                    // Mostrar fila de la tabla
                                    echo "<tr>";
                                    echo "<td>" . $numPedidos . "</td>";
                                    echo "<td>" . htmlspecialchars($nombre) . "</td>";
                                    echo "<td>" . htmlspecialchars($direccion) . "</td>";
                                    echo "<td>" . htmlspecialchars($producto) . "</td>";
                                    echo "<td>" . htmlspecialchars($cantidad) . "</td>";
                                    echo "<td>" . htmlspecialchars($fecha) . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        echo "</tbody>";
                        echo "</table>";
                        fclose($archivo);

                    } else {
                        // Error al abrir el archivo
                        echo "<p>Error al abrir el archivo de pedidos.</p>";
                    }

                } else {

                    /*
                    TAREA 3: MANEJAR CASO SIN PEDIDOS
                    - Si el archivo no existe o está vacío
                    - Mostrar mensaje: "No hay pedidos registrados."
                    */
                    echo "<p>No hay pedidos registrados.</p>";
                    echo "<p>Comienza haciendo tu primer pedido desde el menú principal.</p>";
                }

                // Si el archivo existe pero está vacío
                if (file_exists("pedidos.txt") && $numPedidos == 0) {
                    echo "<p>No hay pedidos registrados.</p>";
                }
                
                    echo "</tbody></table>";
                    echo "<p><strong>Total de pedidos:</strong> $numPedidos</p>";
                ?>

                <br>
                <div class="grupo-botones">
                    <a href="verificar.php" class="btn btn-primario">Volver al menú</a>
                    <a href="pedido.php" class="btn btn-secundario">Hacer nuevo pedido</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>