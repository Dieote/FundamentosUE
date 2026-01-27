<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pedido - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor-pedido">
        <header class="cabecera">
            <h1>Tienda Online</h1>
            <nav class="navegacion">
                <a href="verificar.php" class="btn btn-secundario">Menú Principal</a>
                <a href="mostrar.php" class="btn btn-secundario">Ver Pedidos</a>
            </nav>
        </header>
        
        <main class="principal">
            <div class="tarjeta-pedido">
                <h2>Realizar Nuevo Pedido</h2>
                <p class="descripcion">Complete el formulario para registrar un nuevo pedido</p>
                
                <!-- 
                TAREA: Este formulario debe enviar los datos a guardar_pedido.php
                Campos obligatorios:
                  - nombre (texto)
                  - direccion (textarea)
                  - producto (select: iphone, roomba, reloj)
                  - cantidad (number, mínimo 1)
                -->
                <form action="guardar_pedido.php" method="post" class="formulario">
                    <fieldset class="grupo-campos">
                        <legend>Datos del Cliente</legend>
                        
                        <div class="grupo-formulario">
                            <label for="nombre">Nombre completo *</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        
                        <div class="grupo-formulario">
                            <label for="direccion">Dirección de envío *</label>
                            <textarea id="direccion" name="direccion" rows="3" required></textarea>
                        </div>
                    </fieldset>
                    
                    <fieldset class="grupo-campos">
                        <legend>Producto a Pedir</legend>
                        
                        <div class="grupo-formulario">
                            <label for="producto">Seleccione producto *</label>
                            <select id="producto" name="producto" required>
                                <option value="">-- Elija un producto --</option>
                                <option value="iphone">iPhone - 1.000€</option>
                                <option value="roomba">Roomba - 500€</option>
                                <option value="reloj">Reloj Inteligente - 100€</option>
                            </select>
                        </div>
                        
                        <div class="grupo-formulario">
                            <label for="cantidad">Cantidad *</label>
                            <input type="number" id="cantidad" name="cantidad" min="1" value="1" required>
                        </div>
                    </fieldset>
                    
                    <div class="grupo-botones">
                        <button type="submit" class="btn btn-primario">Confirmar Pedido</button>
                        <button type="reset" class="btn btn-secundario">Limpiar Formulario</button>
                    </div>
                </form>
            </div>
        </main>
        
        <footer class="pie">
            <p>Complete todos los campos marcados con * para registrar el pedido</p>
        </footer>
    </div>
</body>
</html>