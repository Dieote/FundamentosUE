public class Tarea
{
    public string Nombre { get; set; }
    public string Descripcion { get; set; }
    public bool Prioridad { get; set; }
    public TipoTarea TipoTarea { get; set; }

    public Tarea(string nombre, string descripcion, TipoTarea tipoTarea, bool prioridad){
    Nombre = nombre;
    Descripcion = descripcion;
    TipoTarea = tipoTarea;
    Prioridad = prioridad;
}

public void MostrarTarea(){
    Console.WriteLine($"**TAREA | Tipo: {TipoTarea}, Nombre: {Nombre} Prioridad: {Prioridad} Descripcion: {Descripcion}");
}

public static void MostrarListadoTareas(List<Tarea> tareas){
            Console.WriteLine($"** Lista tareas **");
            foreach (var Tarea in tareas){
            Console.WriteLine($"ID | Nombre {Tarea.Nombre} | Descripcion {Tarea.Descripcion} | Prioridad {Tarea.Prioridad} | Tipo {Tarea.TipoTarea}");
    }
    Console.WriteLine($"** --- Fin de la lista --- **");
}
}