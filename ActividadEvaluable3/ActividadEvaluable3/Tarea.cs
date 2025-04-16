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
public void MostrarTarea(){
    Console.WriteLine($"**TAREA {IdTarea} | Tipo: {TipoTarea}, Nombre: {Nombre} Prioridad: {Prioridad} Descripcion: {Descripcion}");
}

public static void MostrarListadoTareas(List<Tarea> tareas){
            Console.WriteLine($"** Lista tareas **");
            foreach (var tarea in tareas){
            Console.WriteLine($"{tarea.IdTarea} | Nombre {tarea.Nombre} | Descripcion {tarea.Descripcion} | Prioridad {tarea.Prioridad} | Tipo {tarea.TipoTarea}");
    }
    Console.WriteLine($"** --- Fin de la lista --- **");
}
}