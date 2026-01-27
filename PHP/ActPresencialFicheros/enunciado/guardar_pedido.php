<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Pedido - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor-pedido">
        <header class="cabecera">
            <h1>Tienda Online</h1>
        </header>
        
        <main class="principal">
            <div class="tarjeta-pedido">
                <?php
                /*
                TAREA 1: RECIBIR DATOS DEL FORMULARIO
                - Recuperar: nombre, direccion, producto, cantidad
                - Usar $_POST para cada campo
                - Validar que todos los campos tengan datos
                */
                
                /*
                TAREA 2: OBTENER FECHA ACTUAL
                - Usar date('Y-m-d H:i:s') para obtener fecha y hora
                - Guardar en variable $fecha
                */
                
                /*
                TAREA 3: FORMATEAR LÍNEA PARA EL ARCHIVO
                - Crear una línea con formato: nombre|direccion|producto|cantidad|fecha
                - Ejemplo: Juan Pérez|Calle Mayor 1|iphone|2|2024-01-11 10:30:00
                - Añadir salto de línea al final (\n)
                */
                
                /*
                TAREA 4: GUARDAR EN ARCHIVO pedidos.txt
                - Abrir archivo en modo append ('a')
                - Usar fopen(), fputs(), fclose()
                - Si se guarda correctamente, mostrar mensaje de éxito
                - Si hay error, mostrar mensaje de error
                */
                
                /*
                TAREA 5: MOSTRAR RESULTADO AL USUARIO
                - Mostrar mensaje de confirmación o error
                - Mostrar resumen del pedido
                - Mostrar botones para:
                    * Hacer otro pedido (enlace a pedido.php)
                    * Volver al menú (enlace a verificar.php)
                */
                
                // EJEMPLO DE ESTRUCTURA:
                $mensaje = ""; // Aquí poner mensaje de éxito o error
                $nombre = "";  // Aquí poner el nombre del cliente
                $producto = ""; // Aquí poner el producto
                $cantidad = ""; // Aquí poner la cantidad
                $fecha = "";   // Aquí poner la fecha
                
                ?>
                
                <h2>Pedido Procesado</h2>
                <p><?php echo $mensaje; ?></p>
                
                <?php if ($mensaje == "Pedido guardado correctamente."): ?>
                <div class="resumen-pedido">
                    <h3>Resumen del Pedido</h3>
                    <div class="detalle-resumen">
                        <p><strong>Cliente:</strong> <?php echo htmlspecialchars($nombre); ?></p>
                        <p><strong>Producto:</strong> <?php echo htmlspecialchars($producto); ?></p>
                        <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($cantidad); ?></p>
                        <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="grupo-botones">
                    <a href="pedido.php" class="btn btn-primario">Hacer otro pedido</a>
                    <a href="verificar.php" class="btn btn-secundario">Volver al menú</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>