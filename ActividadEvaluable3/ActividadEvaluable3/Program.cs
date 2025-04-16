
class Program
{

    static void Main(string[] args)  
    {
        List<Tarea> tareas = new List<Tarea>();

        Tarea tarea = new Tarea("Tarea 1", "Descripción de la tarea 1", TipoTarea.Persona, true);
        tarea.MostrarTarea(); 
        Tarea tarea2 = new Tarea("Tarea 2", "Descripción de la tarea 2", TipoTarea.Trabajo, false);
        tarea2.MostrarTarea(); 
        Tarea tarea3 = new Tarea("Tarea 3", "Descripción de la tarea 3", TipoTarea.Ocio, true); 
        tarea3.MostrarTarea();

        tareas.Add(tarea);
        tareas.Add(tarea3);
        Tarea.MostrarListadoTareas(tareas);
    }
   
        /* while (true)
        {
            Console.WriteLine("\n--- Menú Principal ---");
            Console.WriteLine("1. Registrar tareas.");
            Console.WriteLine("2. Buscar tareas por tipo.");
            Console.WriteLine("1. Eliminar tareas.");
            Console.WriteLine("1. Exportar tareas.");
            Console.WriteLine("1. Importar tareas.");
            Console.WriteLine("3. Salir");
            Console.Write("Seleccione una opción: ");
            string opcion = Console.ReadLine()!; //Operador de NULO - ! - que indica que ignore la advertencia del IDE

            switch (opcion)
            {
                case "1":
                    Console.Write("Ingrese el Nombre de la tarea: ");
                    string nombre = Console.ReadLine()!;
                    
                    Console.Write("Seleccione el tipo de Tarea: ");
                    Console.WriteLine("1. Personal");
                    Console.WriteLine("2.Trabajo");
                    Console.WriteLine("3. Ocio");
                    switch (Console.ReadLine()!)
                    {
                        case "1":
                            TipoTarea tipoTarea = TipoTarea.Persona;
                            break;
                        case "2":
                            TipoTarea tipoTarea = TipoTarea.Trabajo;
                            break;
                        case "3":
                            TipoTarea tipoTarea = TipoTarea.Ocio;
                            break;
                        default:
                            Console.WriteLine("Opción no válida.");
                            return;
                    }

                    Console.Write("Ingrese la descripción de la tarea: ");
                    string descripcion = Console.ReadLine()!;
                    Console.Write("¿Es una tarea prioritaria? (S/N): ");
                    string respuesta = Console.ReadLine()!;
                    //bool prioridad = respuesta.ToUpper() == "S" ? true : false;
                    bool prioridad;
                    if (respuesta.ToUpper() == "S"){
                        prioridad = true;
                    }
                    else if (respuesta.ToUpper() == "N"){
                        prioridad = false;
                    }
                    else{
                        Console.WriteLine("Opción no válida.");
                        return; //o probar continue
                    }
                    break;
                    Tarea tarea = new Tarea(nombre, descripcion, tipoTarea, prioridad);
                    Console.WriteLine("Tarea registrada correctamente.");
                case "2":
                    break;

                default:
                        Console.WriteLine("Opción no válida.");
                        break;
            }
        }
    }
 */
   
}
