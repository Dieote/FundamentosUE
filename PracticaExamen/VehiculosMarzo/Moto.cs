class Moto : Vehiculo
{
    public bool manillar;
    public Moto(string marca, string modelo, int anio, bool manillar) : base(marca, modelo, anio)
    {
        this.manillar = manillar;
    }

    public override void MostrarDatos()
    {
        Console.WriteLine("Marca: " + getMarca());
        Console.WriteLine("Modelo: " + getModelo());
        Console.WriteLine("Año: " + getAnio());
        Console.WriteLine("Manillar: " + manillar);
    }
}
