<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Precios - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="contenedor-calcular">
        <header class="cabecera">
            <h1>Tienda Online</h1>
            <nav class="navegacion">
                <a href="verificar.php" class="btn btn-secundario">Menú Principal</a>
                <a href="pedido.php" class="btn btn-secundario">Nuevo Pedido</a>
            </nav>
        </header>

        <main class="principal">
            <div class="contenedor-calculadora">
                <div class="tarjeta-formulario">
                    <h2>Calculadora de Precios</h2>
                    <p class="descripcion">
                        Introduce el nombre del cliente o deja vacío para calcular el total general
                    </p>

                    <?php
                    //TAREA: Definir array de precios
                    $precios = [
                        'iphone' => 1000,
                        'roomba' => 500,
                        'reloj' => 100
                    ];

                    ?>

                    <form method="post" class="formulario">
                        <div class="grupo-formulario">
                            <label for="cliente">Nombre del cliente (opcional)</label>
                            <input type="text" id="cliente" name="cliente"
                                value="<?php echo isset($_POST['cliente']) ? htmlspecialchars($_POST['cliente']) : ''; ?>">
                        </div>

                        <div class="grupo-botones">
                            <button type="submit" class="btn btn-primario">Calcular Total</button>
                        </div>
                    </form>
                </div>

                <?php
                /*
                TAREA 1: PROCESAR FORMULARIO CUANDO SE ENVÍA
                - Verificar si se ha enviado el formulario ($_SERVER['REQUEST_METHOD'] == 'POST')
                - Recuperar nombre del cliente (puede estar vacío)
                */

                /*
                TAREA 2: CALCULAR TOTAL
                - Leer archivo pedidos.txt
                - Para cada pedido:
                  * Si el cliente está vacío O coincide con el nombre buscado:
                    - Multiplicar cantidad por precio del producto
                    - Sumar al total
                - Si se busca un cliente específico y no se encuentra:
                  * Mostrar "Error. No se encuentra el cliente 'nombre'"
                */

                /*
                TAREA 3: MOSTRAR RESULTADO
                - Formatear mensaje según si es total general o de cliente específico
                - Mostrar en div tarjeta-resultado
                */

                $resultado = '';
                $cliente = '';
                $clienteEncontrado = false;


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Recuperar el nombre del cliente (puede estar vacío)
                    $cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : '';

                    $total = 0;

                    // Verificar si existe el archivo
                    if (file_exists("pedidos.txt")) {

                        // Abrir archivo en modo lectura
                        $archivo = fopen("pedidos.txt", "r");

                        if ($archivo) {
                            while (!feof($archivo)) {
                                $linea = fgets($archivo);

                                if (!empty(trim($linea))) {

                                    // Separar datos: nombre|direccion|producto|cantidad|fecha
                                    $datos = explode("|", trim($linea));

                                    if (count($datos) == 5) {
                                        $nombrePedido = $datos[0];
                                        $productoPedido = strtolower($datos[2]); // Convertir a minúsculas
                                        $cantidadPedido = intval($datos[3]);

                                        // Verificar si debemos incluir este pedido en el cálculo
                                        $incluirPedido = false;

                                        if (empty($cliente)) {
                                            // Cliente vacío = calcular TODOS los pedidos
                                            $incluirPedido = true;
                                        } else {
                                            // Cliente especificado = solo sus pedidos
                                            if (strcasecmp($nombrePedido, $cliente) == 0) {
                                                $incluirPedido = true;
                                                $clienteEncontrado = true;
                                            }
                                        }

                                        // Si debemos incluir este pedido, calcular su precio
                                        if ($incluirPedido) {
                                            // Verificar que el producto existe en el array de precios
                                            if (isset($precios[$productoPedido])) {
                                                $precioPedido = $precios[$productoPedido] * $cantidadPedido;
                                                $total += $precioPedido;
                                            }
                                        }
                                    }
                                }
                            }

                            fclose($archivo);
                            if (empty($cliente)) {
                                // Total general
                                $resultado = "Total de todos los pedidos: " . $total . "€";
                            } else {
                                // Cliente específico
                                if ($clienteEncontrado) {
                                    $resultado = "Total de pedidos de " . htmlspecialchars($cliente) . ": " . $total . "€";
                                } else {
                                    // Cliente no encontrado
                                    $resultado = "Error. No se encuentra el cliente '" . htmlspecialchars($cliente) . "'";
                                }
                            }

                        } else {
                            $resultado = "Error al abrir el archivo de pedidos.";
                        }

                    } else {
                        $resultado = "No hay pedidos registrados en el sistema.";
                    }
                }

                if ($resultado != ''):
                    ?>
                    <div class="tarjeta-resultado">
                        <h3>Resultado del Cálculo</h3>
                        <div class="resultado">
                            <div class="resultado-item">
                                <span class="valor destacado"><?php echo $resultado; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tarjeta-precios">
                <h3>Tabla de Precios Oficial</h3>
                <table class="tabla-precios">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>iPhone</td>
                            <td class="precio">1.000€</td>
                        </tr>
                        <tr>
                            <td>Roomba</td>
                            <td class="precio">500€</td>
                        </tr>
                        <tr>
                            <td>Reloj</td>
                            <td class="precio">100€</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>