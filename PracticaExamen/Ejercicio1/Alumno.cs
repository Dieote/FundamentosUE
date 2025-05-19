public class Alumno{
    private string? nombre;
    private int nota;
    private string? email;

    public Alumno() { }

    public Alumno(string nombre, int nota, string email)
    {
        this.nombre = nombre;
        this.nota = nota;
        this.email = email;
    }

    public int getNota(){
        return this.nota;
    }

    public string getNombre(){
        return this.nombre;
    }
    
    public string getEmail(){
        return this.email;
    }

    public void MostrarDatos()
    {
        Console.WriteLine("Los datos del alumno son: ");
        Console.WriteLine("Nombre: " + nombre + " Nota: " + nota + " Correo: " + email);
    } 

}