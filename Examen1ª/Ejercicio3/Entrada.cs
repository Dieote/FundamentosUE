class Entrada
{
    static void Main(string[] args)
    {
        GestorDiario gestor = new GestorDiario();

        string? opcion;
        do
        {
            Console.WriteLine("Bienvenido al Gestor de TU Diario");
            Console.WriteLine("Ingrese un titulo para su entrada:");
            string? titulo = Console.ReadLine();
            Console.WriteLine("Ingrese el contenido:");
            string? contenido = Console.ReadLine();

            EntradaDiario entradaMensaje = new EntradaDiario(DateTime.Now, titulo, contenido);

            gestor.GuardarEntrada(entradaMensaje);
            Console.WriteLine("Entrada guardada exitosamente.");

            Console.WriteLine("¿Desea agregar otra entrada? (s/n):");
            opcion = Console.ReadLine();
            while (opcion != null && opcion.ToLower() != "s" && opcion.ToLower() != "n")
            {
                Console.WriteLine("Opción no válida. Por favor, ingrese 's' para continuar o 'n' para salir.");
                opcion = Console.ReadLine();
            }
        } while (opcion != null && opcion.ToLower() == "s");

        Console.WriteLine("¿Desea mostrar todas las entradas? (s/n):");
        opcion = Console.ReadLine();
        if (opcion != null && opcion.ToLower() == "s")
        {
            Console.WriteLine("**********************************************");
            foreach (var item in gestor.GetDiarios())
            {
                item.FormatearEntrada();
            }
        }
        Console.WriteLine("Gracias por usar el Gestor de TU Diario. ¡Hasta luego!");
    }
}
