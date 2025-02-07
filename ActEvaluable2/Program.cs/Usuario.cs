public class Usuario{

    public string Correo {get; set;}
    public string Contraseña {get; set;}
private List<Entrenamiento> entrenamientos;

//Constructor
public Usuario(string correo, string contraseña){
    this.Correo = correo;
    this.Contraseña = contraseña;
    entrenamientos = new List<Entrenamiento>();
}

private bool CorreoValido(string correo){
    if (string.IsNullOrWhiteSpace(correo)) {
        return false;
    } else{
        var email = new System.Net.Mail.MailAddress(correo);
        return email.Address == correo;
    }
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