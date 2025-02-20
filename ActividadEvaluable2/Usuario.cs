ublic class Usuario{

    public string Correo {get; set;}
    public string Contraseña {get; set;}
private List<Entrenamiento> entrenamientos;

//Constructor
public Usuario(string correo, string contraseña){
    Correo = correo;
    Contraseña = contraseña;
    entrenamientos = new List<Entrenamiento>();
}

public void MostrarDatos(){
    Console.WriteLine($"Correo: {Correo}");
    Console.WriteLine($"Contraseña: {Contraseña}");
}

public void AgregarEntrenamiento(Entrenamiento entrenamiento){
    entrenamientos.Add(entrenamiento);
    Console.WriteLine("Entrenamiento registrado correctamente.");
}

public void ListarEntrenamientos(){
    if (entrenamientos.Count == 0)
    {
        Console.WriteLine("No hay entrenamientos para mostrar.");
        return;
    }
    foreach (var entrenamiento in entrenamientos)
    {
        entrenamiento.MostrarEntrenamiento();
    }
}

public void VaciarEntrenamientos(){
    entrenamientos.Clear();
    Console.WriteLine("Entrenamientos eliminados correctamente.");
}
}