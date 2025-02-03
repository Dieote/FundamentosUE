public class Usuario{

    public string Nombre {get; set;}
    public string Correo {get; set;}
    public string Contraseña {get; set;}

//Constructor
public Usuario(string nombre, string correo, string contraseña){
    this.Nombre = nombre;
    this.Correo = correo;
    this.Contraseña = contraseña;
}

private bool CorreoValido(string correo){
    return true;
}

public void MostrarDatos(){
    Console.WriteLine($"Nombre: {Nombre}");
    Console.WriteLine($"Correo: {Correo}");
    Console.WriteLine($"Contraseña: {Contraseña}");
}
}