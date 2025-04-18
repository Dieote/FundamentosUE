
class Program{

    static void Main(){

        List<Tarea> tareas = new List<Tarea>();
        Tipo tipoDeTarea;

        Tarea newTarea0 = new Tarea("FISIO", "Tarea para realizar actividad de recuperacion", Tipo.Persona , true);
        Tarea newTarea1 = new Tarea("ESTUDIAR", "Tarae para realiazar actividad de estudio", Tipo.Trabajo, false);
        Tarea newTarea2 = new Tarea("VIDEOJUEGOS", "Tarea para realizar actividad de recreacion", Tipo.Ocio, true); 

        tareas.Add(newTarea1);
        tareas.Add(newTarea0);
        tareas.Add(newTarea2);

        while (true){
            Console.WriteLine("\n--- Menú Principal ---");
            Console.WriteLine("1. Registrar tareas.");
            Console.WriteLine("2. Listar tareas.");
            Console.WriteLine("3. Buscar tareas por tipo.");
            Console.WriteLine("4. Eliminar tareas.");
            Console.WriteLine("5. Exportar tareas.");
            Console.WriteLine("6. Importar tareas.");
            Console.WriteLine("7. Salir");
            Console.Write("Seleccione una opción: ");
            string opcion = Console.ReadLine()!;

            switch (opcion){
                case "1":
                    Console.Write("Ingrese el Nombre de la tarea: ");
                    string nombre = Console.ReadLine()!;
                    Console.Write("Ingrese la descripción de la tarea: ");
                    string descripcion = Console.ReadLine()!;
                    tipoDeTarea = SeleccionarTipoTarea();

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
                    Tarea tarea = new Tarea(nombre, descripcion, tipoDeTarea, prioridad);
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
                    BuscarPorTipoTarea(tareas);
                    break;
                case "4":
                    if (tareas.Count == 0){
                        Console.WriteLine("No hay tareas registradas para eliminar.");
                    }
                    else{
                        Tarea.MostrarListadoTareas(tareas);
                        Console.Write("Ingrese el ID de la tarea a eliminar: ");
                        int idTarea = int.Parse(Console.ReadLine()!);
                        EliminarTarea(tareas, idTarea);
                    }   
                    break;
                case "5":
                    if (tareas.Count == 0){
                        Console.WriteLine("No hay tareas registradas para exportar.");
                    }
                    else{
                        Tarea.ExportarTareas(tareas);
                    }
                    break;
                case "6":
                        Tarea.ImportarTareas(tareas);
                    break;
                case "7":
                    Console.WriteLine("Saliendo del programa...");
                    return;
                default:
                    Console.WriteLine("Opción no válida.");
                    break;
            }


/*
        
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
                    Console.WriteLine("\n1. Persona");
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

    public static Tipo BuscarPorTipoTarea(List<Tarea> tareas){
        
        while (true){
        Console.Write("Busque el tipo de Tarea: ");
        Console.WriteLine("\n1. Persona");
        Console.WriteLine("2. Trabajo");
        Console.WriteLine("3. Ocio");
        switch (Console.ReadLine()!){
            case "1":
                Console.WriteLine("Tarea de tipo Persona seleccionada.");
                if (tareas.Any(t => t.Tipo == Tipo.Persona)){
                        foreach (var tareaTipo in tareas){
                            if (tareaTipo.Tipo == Tipo.Persona){
                                Console.WriteLine(tareaTipo.ToString());
                            }
                        }
                    }
                    else{
                        Console.WriteLine($"No hay tareas de tipo {Tipo.Persona} registradas.");
                    }
                return Tipo.Persona;
            case "2":
                Console.WriteLine("Tarea de tipo Trabajo seleccionada.");
                if (tareas.Any(t => t.Tipo == Tipo.Trabajo)){
                        foreach (var tareaTipo in tareas){
                            if (tareaTipo.Tipo == Tipo.Trabajo){
                                Console.WriteLine(tareaTipo.ToString());
                            }
                        }
                    }
                    else{
                        Console.WriteLine($"No hay tareas de tipo {Tipo.Trabajo} registradas.");
                    }
                return Tipo.Trabajo;
            case "3":
                Console.WriteLine("Tarea de tipo Ocio seleccionada.");
                if (tareas.Any(t => t.Tipo == Tipo.Ocio)){
                        foreach (var tareaTipo in tareas){
                            if (tareaTipo.Tipo == Tipo.Ocio){
                                Console.WriteLine(tareaTipo.ToString());
                            }
                        }
                    }
                    else{
                        Console.WriteLine($"No hay tareas de tipo {Tipo.Ocio} registradas.");
                    }
                return Tipo.Ocio;
            default:
                Console.WriteLine("Opción no válida.");
                break;
        }
                
        }
    }
}
