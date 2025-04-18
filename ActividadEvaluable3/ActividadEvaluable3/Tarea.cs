public class Tarea
{
    public string Nombre { get; set; }
    public string Descripcion { get; set; }
    public bool Prioridad { get; set; }
    public Tipo Tipo { get; set; }
    public int IdTarea { get; set; }
    private static int contadorId = 1;

    public Tarea(string nombre, string descripcion, Tipo tipo, bool prioridad){
        IdTarea = contadorId++;
        Nombre = nombre;
        Descripcion = descripcion;
        Tipo = tipo;
        Prioridad = prioridad;
    }
    public override string ToString(){
        return ($"**{IdTarea} | Tipo: {Tipo} - Nombre: {Nombre} Prioridad: {Prioridad} Descripcion: {Descripcion}");
    }

    public static void MostrarListadoTareas(List<Tarea> tareas){
        Console.WriteLine($"** Lista tareas **");
        foreach (var tarea in tareas){
            Console.WriteLine($"{tarea.IdTarea} | Nombre {tarea.Nombre} | Descripcion {tarea.Descripcion} $| Prioridad {tarea.Prioridad} | Tipo {tarea.Tipo}");
        }
        Console.WriteLine($"** --- Fin de la lista --- **");
    }

}