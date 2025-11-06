class Empleado
{
    private string Nombre;
    private int Edad;
    private double Salario;
    public Empleado(string nombre, int edad, double salario)
    {
        this.Nombre = nombre;
        this.Edad = edad;
        this.Salario = salario;
    }

    public string getNombre()
    {
        return Nombre;
    }
    public int getEdad()
    {
        return Edad;
    }
    public double getSalario()
    {
        return Salario;
    }

    public virtual void MostrarInformacion()
    {
        Console.WriteLine($" Empleado {Nombre} | Edad: {Edad} | Salario: {Salario}");
    }
}