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
                    /*
                    TAREA: Definir array de precios
                    $precios = [
                        'iphone' => 1000,
                        'roomba' => 500,
                        'reloj' => 100
                    ];
                    */
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
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Aquí procesar el cálculo
                    // ...
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