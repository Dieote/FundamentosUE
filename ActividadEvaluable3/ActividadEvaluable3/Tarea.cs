public class Tarea
{
    public string Nombre { get; set; }
    public string Descripcion { get; set; }
    public bool Prioridad { get; set; }
    public TipoTarea TipoTarea { get; set; }
    public int IdTarea { get; set; }
    private static int contadorId = 1;

    public Tarea(string nombre, string descripcion, TipoTarea tipoTarea, bool prioridad){
        IdTarea = contadorId++;
        Nombre = nombre;
        Descripcion = descripcion;
        TipoTarea = tipoTarea;
        Prioridad = prioridad;
    }
    public override String ToString(){
        return ($"**{IdTarea} | Tipo: {TipoTarea} - Nombre: {Nombre} Prioridad: {Prioridad} Descripcion: {Descripcion}");
    }

    public static void MostrarListadoTareas(List<Tarea> tareas){
        Console.WriteLine($"** Lista tareas **");
        foreach (var tarea in tareas){
            Console.WriteLine($"{tarea.IdTarea} | Nombre {tarea.Nombre} | Descripcion {tarea.Descripcion} $| Prioridad {tarea.Prioridad} | Tipo {tarea.TipoTarea}");
        }
        Console.WriteLine($"** --- Fin de la lista --- **");
    }

    public static void EliminarTarea(List<Tarea> tareas, int idTarea){
        foreach (var tarea in tareas){
            MostrarListadoTareas(tareas);
            if (tarea.IdTarea == idTarea){
                tareas.Remove(tarea);
                Console.WriteLine($"Tarea {idTarea} eliminada.");
                return;
            }
        }
        Console.WriteLine($"Tarea {idTarea} no encontrada.");
    }

    public void SeleccionarTipoTarea(){
         Console.Write("Seleccione el tipo de Tarea: ");
                    Console.WriteLine("1. Personal");
                    Console.WriteLine("2.Trabajo");
                    Console.WriteLine("3. Ocio");
                    switch (Console.ReadLine()!)
                    {
                        case "1":
                            TipoTarea = TipoTarea.Persona;
                            break;
                        case "2":
                            TipoTarea = TipoTarea.Trabajo;
                            break;
                        case "3":
                            TipoTarea = TipoTarea.Ocio;
                            break;
                        default:
                            Console.WriteLine("Opción no válida.");
                            return;
                    }
    }

    public TipoTarea BuscarPorTipoTarea(){
        
        while (true){
        Console.Write("Busque el tipo de Tarea: ");
        Console.WriteLine("1. Personal");
        Console.WriteLine("2. Trabajo");
        Console.WriteLine("3. Ocio");
        switch (Console.ReadLine()!){
            case "1":
                Console.WriteLine("Tarea de tipo Personal seleccionada.");
                return TipoTarea.Persona;
            case "2":
                Console.WriteLine("Tarea de tipo Trabajo seleccionada.");
                return TipoTarea.Trabajo;
            case "3":
                Console.WriteLine("Tarea de tipo Ocio seleccionada.");
                return TipoTarea.Ocio;
            default:
                Console.WriteLine("Opción no válida.");
                break;
        }
                
        }
    }

}