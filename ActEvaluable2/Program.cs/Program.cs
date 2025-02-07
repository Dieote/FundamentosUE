class Program
{

    static void Main(string[] args)
    {

        LogIn registro = new LogIn();
        Usuario? usuarioCreado = null;

        while (true)
        {
            Console.WriteLine("\n--- Menú Principal ---");
            Console.WriteLine("1. Registrar usuario");
            Console.WriteLine("2. Iniciar sesión");
            Console.WriteLine("3. Salir");
            Console.Write("Seleccione una opción: ");
            string opcion = Console.ReadLine()!; //Operador de NULO - ! - que indica que ignore la advertencia del IDE

            switch (opcion)
            {
                case "1":
                    Console.Write("Ingrese su correo: ");
                    string correo = Console.ReadLine()!;
                    Console.Write("Ingrese su contraseña: ");
                    string contraseña = Console.ReadLine()!;
                    registro.RegistrarUsuario(correo, contraseña);
                    break;

                case "2":
                    Console.Write("Ingrese su correo: ");
                    correo = Console.ReadLine()!;
                    Console.Write("Ingrese su contraseña: ");
                    contraseña = Console.ReadLine()!;
                    usuarioCreado = registro.IniciarSesion(correo, contraseña);

                    if (usuarioCreado != null)
                    {
                        GestionarUsuario(usuarioCreado);
                    }
                    break;

                case "3":
                    Console.WriteLine("Saliendo del programa...");
                    return;

                default:
                    Console.WriteLine("Opción no válida.");
                    break;
            }
        }
    }

    static void GestionarUsuario( Usuario usuario){
        while (true)
        {
             Console.WriteLine("\n--- Menú de Usuario ---");
            Console.WriteLine("1. Registrar entrenamiento");
            Console.WriteLine("2. Listar entrenamientos");
            Console.WriteLine("3. Vaciar entrenamientos");
            Console.WriteLine("4. Cerrar sesión");
            Console.Write("Seleccione una opción: ");
            string opcion = Console.ReadLine()!;

            switch (opcion)
            {
                case "1":
                    Console.Write("Ingrese la distancia recorrida (km): ");
                    double distancia = double.Parse(Console.ReadLine()!);
                    Console.Write("Ingrese el tiempo empleado (min): ");
                    double tiempo = double.Parse(Console.ReadLine()!);
                    Console.Write("Ingrese el tipo de ejercicio: ");
                    string tipoEjercicio = Console.ReadLine()!;
                    usuario.AgregarEntrenamiento(new Entrenamiento(distancia, tiempo, tipoEjercicio));
                    break;

                case "2":
                    usuario.ListarEntrenamientos();
                    break;

                case "3":
                    usuario.VaciarEntrenamientos();
                    break;

                case "4":
                    Console.WriteLine("Cerrando sesión...");
                    return;

                default:
                    Console.WriteLine("Opción no válida.");
                    break;
            }
        }
    }
}
