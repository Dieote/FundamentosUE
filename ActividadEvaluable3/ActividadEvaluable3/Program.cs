
class Program{

    static void Main(){

        List<Tarea> tareas = new List<Tarea>();
        Tipo tipoTarea;

        while (true){
            Console.WriteLine("\n--- Menú Principal ---");
            Console.WriteLine("1. Registrar tareas.");
            Console.WriteLine("2. Buscar tareas por tipo.");
            Console.WriteLine("3. Eliminar tareas.");
            Console.WriteLine("4. Exportar tareas.");
            Console.WriteLine("5. Importar tareas.");
            Console.WriteLine("6. Salir");
            Console.Write("Seleccione una opción: ");
            string opcion = Console.ReadLine()!;

            switch (opcion){
                case "1":
                    Console.Write("Ingrese el Nombre de la tarea: ");
                    string nombre = Console.ReadLine()!;
                    Console.Write("Ingrese la descripción de la tarea: ");
                    string descripcion = Console.ReadLine()!;
                    tipoTarea = SeleccionarTipoTarea();

                    Console.Write("¿Es una tarea prioritaria? (S/N): ");
                    string respuesta = Console.ReadLine()!;
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
                    Tarea tarea = new Tarea(nombre, descripcion, tipoTarea, prioridad);
                    tareas.Add(tarea);
                    Console.WriteLine("Tarea registrada correctamente.");
                    break;
                case "2":
                    if (tareas.Count == 0){
                        Console.WriteLine("No hay tareas registradas para buscar.");
                    }
                    else{
                        Tarea.MostrarListadoTareas(tareas);
                        break;
                    }
                        break;
                case "3":
                    break;
                case "4":
                    break;
                case "5":
                    break;
                case "6":
                    Console.WriteLine("Saliendo del programa...");
                    return;
                default:
                    Console.WriteLine("Opción no válida.");
                    break;
            }


/*
        Tarea tarea = new Tarea("Tarea 1", "Descripción de la tarea 1", TipoTarea.Persona, true);
        Tarea tarea2 = new Tarea("Tarea 2", "Descripción de la tarea 2", TipoTarea.Trabajo, false);
         Tarea tarea3 = new Tarea("Tarea 3", "Descripción de la tarea 3", TipoTarea.Ocio, true); 

        Console.WriteLine(tarea3);
        Console.WriteLine(tarea);
        Console.WriteLine(tarea2);


        tareas.Add(tarea);
        tareas.Add(tarea3);
        Tarea.MostrarListadoTareas(tareas);
        Tarea.EliminarTarea(tareas, 1);
        Tarea.MostrarListadoTareas(tareas); 
*/
        }
    }  

 public static Tipo SeleccionarTipoTarea(){
         Console.Write("Seleccione el tipo de Tarea: ");
                    Console.WriteLine("1. Personal");
                    Console.WriteLine("2.Trabajo");
                    Console.WriteLine("3. Ocio");
                    switch (Console.ReadLine()!)
                    {
                        case "1":
                            return Tipo.Persona; 
                        case "2":
                            return Tipo.Trabajo; 
                        case "3":
                            return Tipo.Persona; 
                        default:
                            Console.WriteLine("Opción no válida.");
                            return SeleccionarTipoTarea(); 
                    }
    }

        public static void EliminarTarea(List<Tarea> tareas, int idTarea){
        Tarea.MostrarListadoTareas(tareas);
        foreach (var tarea in tareas){
            if (tarea.IdTarea == idTarea){
                tareas.Remove(tarea);
                Console.WriteLine($"Tarea {idTarea} eliminada.");
                return;
            }
        }
        Console.WriteLine($"Tarea {idTarea} no encontrada.");
    }

    public Tipo BuscarPorTipoTarea(List<Tarea> tareas){
        
        while (true){
        Console.Write("Busque el tipo de Tarea: ");
        Console.WriteLine("1. Personal");
        Console.WriteLine("2. Trabajo");
        Console.WriteLine("3. Ocio");
        switch (Console.ReadLine()!){
            case "1":
                Console.WriteLine("Tarea de tipo Personal seleccionada.");
                return Tipo.Persona;
            case "2":
                Console.WriteLine("Tarea de tipo Trabajo seleccionada.");
                return Tipo.Trabajo;
            case "3":
                Console.WriteLine("Tarea de tipo Ocio seleccionada.");
                return Tipo.Ocio;
            default:
                Console.WriteLine("Opción no válida.");
                break;
        }
                
        }
    }
}
