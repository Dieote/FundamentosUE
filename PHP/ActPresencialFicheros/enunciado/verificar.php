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
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $login_correcto = false;
        
        /*
        TAREA 2: LEER ARCHIVO DE CLAVES (clave.txt)
        - Abrir el archivo clave.txt en modo lectura
        - Usar fopen(), fgets(), feof(), fclose()
        - Leer línea por línea
        - Cada línea tiene formato: "usuario clave"
        */
        $archivo = fopen("clave.txt", "r");
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
            }
            /*
            TAREA 3: VALIDAR CREDENCIALES
            - Para cada línea del archivo:
            * Dividir la línea en dos partes (usuario y clave)
            * Comparar con los datos del formulario
            * Si coinciden: $login_correcto = true
            */
            
            /*
            TAREA 4: MOSTRAR RESULTADO
            CASO A: Login correcto
            - Mostrar mensaje de bienvenida
            - Mostrar menú con 4 opciones
            
            CASO B: Login incorrecto  
            - Mostrar mensaje "Error"
            - Enlace para volver a login.html
            */
            fclose($archivo);

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