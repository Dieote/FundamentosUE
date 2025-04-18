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

    public Tarea(int id, string nombre, string descripcion, Tipo tipo, bool prioridad){  
        //este constructor lo uso en importar, para que no afecte id
    IdTarea = id;
    Nombre = nombre;
    Descripcion = descripcion;
    Tipo = tipo;
    Prioridad = prioridad;
}

    public override string ToString(){
        return ($"{IdTarea} | Tipo: {Tipo} | Nombre: {Nombre} - Prioridad: {Prioridad} | Descripcion: {Descripcion}");
    }

    /* Metodo sin orden de id`s 
    public static void MostrarListadoTareas(List<Tarea> tareas){
        Console.WriteLine($"** --- Lista tareas --- **");
        foreach (var tarea in tareas){
            Console.WriteLine(tarea.ToString());
        }
        Console.WriteLine($"** --- Fin de la lista --- **");
    }
 */
public static void MostrarListadoTareas(List<Tarea> tareas){
    Console.WriteLine($"** --- Lista tareas --- **");
    foreach (var tarea in tareas.OrderBy(t => t.IdTarea)){
        Console.WriteLine(tarea.ToString());
    }
    Console.WriteLine($"** --- Fin de la lista --- **");
}

    public static void ExportarTareas(List<Tarea> tareas){
        using (StreamWriter escribir = new StreamWriter("tareas.txt")){
            foreach (var tarea in tareas){
            escribir.WriteLine($"{tarea.IdTarea};{tarea.Nombre};{tarea.Descripcion};{tarea.Tipo};{tarea.Prioridad}");            
            }
        }
        Console.WriteLine("Tareas exportadas a tareas.txt");
    }

    public static void ImportarTareas(List<Tarea> tareas){
        if(!File.Exists("tareas.txt")){
            Console.WriteLine("No se encontró el archivo tareas.txt para importar.");
            return;
        }

          string[] lineas = File.ReadAllLines("tareas.txt");
    foreach (string linea in lineas){
        string[] partes = linea.Split(';');
        
        if (partes.Length == 5){
            int idTarea = int.Parse(partes[0]);
            string nombre = partes[1];
            string descripcion = partes[2];
            Tipo tipo = (Tipo)Enum.Parse(typeof(Tipo), partes[3]);
            bool prioridad = bool.Parse(partes[4]);

            if (!tareas.Any(t => t.IdTarea == idTarea)){ // Verifica si la tarea ya existe
                Tarea tareaImportada = new Tarea(idTarea, nombre, descripcion, tipo, prioridad);
                tareas.Add(tareaImportada);
                }
            }
    }

        if (tareas.Count > 0){
            int maxId = tareas.Max(t => t.IdTarea);
                typeof(Tarea)                   // obtiene el tipo/clase 
                .GetField("contadorId",        // Busca el campo llamado "contadorId"
                    System.Reflection.BindingFlags.Static |      // campo es estático
                    System.Reflection.BindingFlags.NonPublic)    // campo es privado
                    ?.SetValue(null,maxId + 1);         // Incrementar contadorId
            }
        Console.WriteLine("Tareas importadas desde tareas.txt");
    }
}