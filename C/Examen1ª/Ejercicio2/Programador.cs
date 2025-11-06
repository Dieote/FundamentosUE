class Programador : Empleado
{
    private string lenguajeFavorito;

    public Programador(string nombre, int edad, double salario, string lenguajeFavorito)
            : base(nombre, edad, salario)
    {
        this.lenguajeFavorito = lenguajeFavorito;
    }

    public string getLenguajeFavorito()
    {
        return lenguajeFavorito;
    }
    
    public override void MostrarInformacion()
    {
        Console.WriteLine("Programador:");
        base.MostrarInformacion();
        Console.WriteLine($" - Lenguaje favorito: {lenguajeFavorito}");
    }
}