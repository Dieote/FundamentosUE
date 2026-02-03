<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación - Tienda Online</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor-menu">
        <?php
        /*
        TAREA 1: OBTENER DATOS DEL FORMULARIO
        - Recuperar el usuario y clave enviados por POST
        - Usar $_POST['usuario'] y $_POST['clave']
        - Guardar en variables: $usuario, $clave
        */
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        $login_correcto = false;
        
        /*
        TAREA 2: LEER ARCHIVO DE CLAVES (clave.txt)
        - Abrir el archivo clave.txt en modo lectura
        - Usar fopen(), fgets(), feof(), fclose()
        - Leer línea por línea
        - Cada línea tiene formato: "usuario clave"
        */
        //verificar que se enviaron datos
        if (!empty($usuario) && !empty($clave)) {
            $archivo = fopen("clave.txt", "r");
            
            /*
            TAREA 3: VALIDAR CREDENCIALES
            - Para cada línea del archivo:
            * Dividir la línea en dos partes (usuario y clave)
            * Comparar con los datos del formulario
            * Si coinciden: $login_correcto = true
            */
        if ($archivo) {
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                if(!empty(trim($linea))) {
                    $partes = explode(" ", trim($linea));
                    if (count($partes) == 2) {
                        if ($partes[0] === $usuario && $partes[1] === $clave) {
                            $login_correcto = true;
                            break;
                        }    
                    }
                }
            }
            fclose($archivo);
            }
        }
            
            /*
            TAREA 4: MOSTRAR RESULTADO
            CASO A: Login correcto
            - Mostrar mensaje de bienvenida
            - Mostrar menú con 4 opciones
            
            CASO B: Login incorrecto  
            - Mostrar mensaje "Error"
            - Enlace para volver a login.html
            */

        if ($login_correcto == true) {
            // Mostrar menú principal
            echo "<header class='cabecera'>";
            echo "<h1>Tienda Online</h1>";
            echo "<div class='info-usuario'>";
            echo "<p>Usuario: <strong>" . htmlspecialchars($usuario) . "</strong></p>";
            echo "<a href='login.html' class='btn btn-secundario'>Cerrar Sesión</a>";
            echo "</div>";
            echo "</header>";
            
            echo "<main class='principal'>";
            echo "<div class='bienvenida'>";
            echo "<h2>¡Bienvenido al Sistema de Gestión!</h2>";
            echo "</div>";
            
            echo "<div class='grid-opciones'>";
            // Aquí poner los 4 enlaces del menú
            // Opción 1: Hacer Pedido
            echo "<div class='tarjeta-opcion'>";
            echo "<h3>Hacer Pedido</h3>";
            echo "<p>Registra un nuevo pedido en el sistema</p>";
            echo "<a href='pedido.php' class='btn btn-primario'>Acceder</a>";
            echo "</div>";
            
            // Opción 2: Mostrar Pedidos
            echo "<div class='tarjeta-opcion'>";
            echo "<h3>Mostrar Pedidos</h3>";
            echo "<p>Visualiza todos los pedidos registrados</p>";
            echo "<a href='mostrar.php' class='btn btn-primario'>Acceder</a>";
            echo "</div>";
            
            // Opción 3: Calcular Precios
            echo "<div class='tarjeta-opcion'>";
            echo "<h3>Calcular Precio del Pedido</h3>";
            echo "<p>Calcula el total de pedidos por cliente</p>";
            echo "<a href='calcular.php' class='btn btn-primario'>Acceder</a>";
            echo "</div>";
            
            // Opción 4: Sorteo
            echo "<div class='tarjeta-opcion'>";
            echo "<h3>Sorteo del Pedido</h3>";
            echo "<p>Realiza un sorteo entre los clientes</p>";
            echo "<a href='sorteo.php' class='btn btn-primario'>Acceder</a>";
            echo "</div>";
            
            echo "</div>";
            echo "</main>";
        } else {
            // Mostrar error
            echo "<div class='tarjeta-login'>";
            echo "<h2 style='color: red;'>Error de autenticación</h2>";
            echo "<p>Las credenciales introducidas no son correctas.</p>";
            echo "<a href='login.html' class='btn btn-primario'>Volver al formulario</a>";
            echo "</div>";
        }
        ?>
        
        <footer class="pie">
            <p>Sistema de Gestión de Tienda Online</p>
        </footer>
    </div>
</body>
</html>